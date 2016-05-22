DROP TRIGGER IF EXISTS new_article ON article;
DROP TRIGGER IF EXISTS up_vote_new_article ON article;
DROP TRIGGER IF EXISTS new_comment ON comment;
DROP TRIGGER IF EXISTS delete_article ON article;
DROP TRIGGER IF EXISTS delete_comment ON comment;
DROP TRIGGER IF EXISTS comment_up_vote ON comment_up_vote;
DROP TRIGGER IF EXISTS comment_down_vote ON comment_down_vote;
DROP TRIGGER IF EXISTS article_up_vote ON article_up_vote;
DROP TRIGGER IF EXISTS article_down_vote ON article_down_vote;
DROP TRIGGER IF EXISTS new_notification ON notification;
DROP TRIGGER IF EXISTS single_admin ON contributor;
DROP TRIGGER IF EXISTS generate_fts_article ON article;
DROP TRIGGER IF EXISTS generate_fts_name ON contributor;
DROP INDEX IF EXISTS email_idx;
DROP INDEX IF EXISTS article_date_idx;
DROP INDEX IF EXISTS articles_reported_at_idx;
DROP INDEX IF EXISTS comments_reported_at_idx;
DROP INDEX IF EXISTS article_title CASCADE;
DROP INDEX IF EXISTS article_summary CASCADE;
DROP INDEX IF EXISTS article_content CASCADE;
DROP INDEX IF EXISTS contributor_name CASCADE;
DROP INDEX IF EXISTS article_fts_idx CASCADE;
DROP INDEX IF EXISTS contributor_name_idx CASCADE;
DROP TYPE IF EXISTS contributor_type CASCADE;
DROP TYPE IF EXISTS contributor_status CASCADE;
DROP TABLE IF EXISTS contributor CASCADE;
DROP TABLE IF EXISTS notification CASCADE;
DROP TABLE IF EXISTS follows CASCADE;
DROP TABLE IF EXISTS image CASCADE;
DROP TABLE IF EXISTS article CASCADE;
DROP TABLE IF EXISTS article_image CASCADE;
DROP TABLE IF EXISTS category CASCADE;
DROP TABLE IF EXISTS category_article CASCADE;
DROP TABLE IF EXISTS comment CASCADE;
DROP TABLE IF EXISTS comment_up_vote CASCADE;
DROP TABLE IF EXISTS comment_down_vote CASCADE;
DROP TABLE IF EXISTS report CASCADE;
DROP TABLE IF EXISTS article_up_vote CASCADE;
DROP TABLE IF EXISTS article_down_vote CASCADE;

DROP SCHEMA IF EXISTS lbaw CASCADE; 
CREATE SCHEMA lbaw; 
SET search_path TO lbaw;


/**********************
 ** tables and types **
 **********************/

CREATE TABLE image(
  id serial PRIMARY KEY,
  path text NOT NULL
);

CREATE TYPE contributor_type AS ENUM ('Contributor', 'Moderator', 'Administrator');
CREATE TYPE contributor_status AS ENUM ('Unverified', 'Active', 'Warned', 'Blocked', 'Inactive');

CREATE TABLE contributor(
  id serial PRIMARY KEY,
  email varchar(256) UNIQUE NOT NULL,
  password varchar(256) NOT NULL,
  first_name varchar(64) NOT NULL,
  last_name varchar(64) NOT NULL,
  about text NOT NULL,
  picture integer REFERENCES Image(id) DEFAULT 1,
  type contributor_type NOT NULL DEFAULT 'Contributor',
  status contributor_status NOT NULL DEFAULT 'Unverified',
  validation_code varchar(64) UNIQUE NOT NULL,
  fts_name tsvector
);

CREATE TABLE notification(
  id serial PRIMARY KEY,
  is_read boolean NOT NULL DEFAULT false,
  sent_date timestamp NOT NULL DEFAULT current_timestamp,
  sender serial REFERENCES Contributor(id) NOT NULL,
  receiver serial REFERENCES Contributor(id) NOT NULL,
  message text NOT NULL,
  CONSTRAINT ck_sender_receiver CHECK (sender != receiver)
);

CREATE TABLE follows(
  follower serial REFERENCES Contributor(id) NOT NULL,
  followee serial REFERENCES Contributor(id) NOT NULL,
  PRIMARY KEY(follower, followee),
  CONSTRAINT ck_follower_followee CHECK (follower != followee)
);

CREATE TABLE article(
  id serial PRIMARY KEY,
  publication_date timestamp NOT NULL DEFAULT current_timestamp,
  author serial REFERENCES Contributor(id) NOT NULL,
  title varchar(200) NOT NULL,
  summary varchar(500) NOT NULL,
  content text NOT NULL,
  score integer NOT NULL DEFAULT 0,
  fts_article tsvector
);

CREATE TABLE article_image(
  article_id serial REFERENCES Article(id) ON DELETE CASCADE NOT NULL ,
  image_id serial REFERENCES Image(id) ON DELETE CASCADE NOT NULL,
  PRIMARY KEY(article_id, image_id)
);

CREATE TABLE category(
  id serial PRIMARY KEY,
  name varchar(32) UNIQUE NOT NULL
);

CREATE TABLE category_article(
  category_id serial REFERENCES Category(id) NOT NULL,
  article_id serial REFERENCES Article(id) ON DELETE CASCADE NOT NULL,
  PRIMARY KEY(category_id, article_id)
);

CREATE TABLE article_up_vote(
  article_id serial REFERENCES Article(id) ON DELETE CASCADE NOT NULL,
  voted_by serial REFERENCES Contributor(id) NOT NULL,
  PRIMARY KEY(article_id, voted_by)
);

CREATE TABLE article_down_vote(
  article_id serial REFERENCES Article(id) ON DELETE CASCADE NOT NULL,
  voted_by serial REFERENCES Contributor(id) NOT NULL,
  PRIMARY KEY(article_id, voted_by)
);

CREATE TABLE comment(
  id serial PRIMARY KEY,
  comment_date timestamp NOT NULL DEFAULT current_timestamp,
  posted_by serial REFERENCES Contributor(id) NOT NULL,
  content text NOT NULL,
  article_id serial REFERENCES Article(id) ON DELETE CASCADE NOT NULL,
  score integer NOT NULL DEFAULT 0
);

CREATE TABLE comment_up_vote(
  comment_id serial REFERENCES Comment(id) ON DELETE CASCADE NOT NULL,
  voted_by serial REFERENCES Contributor(id) NOT NULL,
  PRIMARY KEY(comment_id, voted_by)
);

CREATE TABLE comment_down_vote(
  comment_id serial REFERENCES Comment(id) ON DELETE CASCADE NOT NULL ,
  voted_by serial REFERENCES Contributor(id) NOT NULL,
  PRIMARY KEY(comment_id, voted_by)
);

CREATE TABLE report(
  id serial PRIMARY KEY,
  is_resolved boolean NOT NULL DEFAULT false,
  report_date timestamp NOT NULL DEFAULT current_timestamp,
  reported_by serial REFERENCES Contributor(id) NOT NULL,
  article_id integer REFERENCES Article(id),
  comment_id integer REFERENCES Comment(id),
  description text NOT NULL,
  CONSTRAINT ck_report_unique UNIQUE (reported_by, article_id, comment_id),
  CONSTRAINT ck_report_type CHECK 
  (is_resolved IS TRUE
  OR (article_id IS NULL AND comment_id IS NOT NULL)
  OR (article_id IS NOT NULL AND comment_id IS NULL))
);

/*************
 ** indexes **
 *************/

CREATE INDEX email_idx ON contributor USING hash(email);

CREATE INDEX article_date_idx ON article(publication_date);

CREATE INDEX articles_reported_at_idx ON report(report_date)
WHERE is_resolved IS FALSE AND comment_id = NULL;

CREATE INDEX comments_reported_at_idx ON report(report_date)
WHERE is_resolved IS FALSE AND article_id = NULL;

CREATE INDEX article_title ON article USING gin(fts_article);
 
CREATE INDEX contributor_name ON contributor USING gin(fts_name);

/*********************************
 ** triggers and user functions **
 *********************************/

CREATE OR REPLACE FUNCTION new_article() RETURNS TRIGGER AS $$
  BEGIN
    IF ((SELECT status FROM contributor WHERE id = NEW.author) IN ('Blocked', 'Inactive'))
      THEN
        RAISE EXCEPTION 'status does not allow publishing articles';
        RETURN NULL;
    END IF;
    RETURN NEW;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER new_article
BEFORE INSERT ON article
FOR EACH ROW EXECUTE PROCEDURE new_article();

CREATE OR REPLACE FUNCTION up_vote_new_article() RETURNS TRIGGER AS $$
  BEGIN
    INSERT INTO article_up_vote(article_id, voted_by) VALUES(NEW.id, NEW.author);
    RETURN NEW;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER up_vote_new_article
AFTER INSERT ON article
FOR EACH ROW EXECUTE PROCEDURE up_vote_new_article();

CREATE OR REPLACE FUNCTION new_comment() RETURNS TRIGGER AS $$
  BEGIN
    IF ((SELECT status FROM contributor WHERE id = NEW.posted_by) IN ('Blocked', 'Inactive'))
      THEN
        RAISE EXCEPTION 'status does not allow posting comments';
        RETURN NULL;
    END IF;
    IF ((SELECT publication_date FROM article WHERE id = NEW.article_id) > NEW.comment_date)
      THEN
        RAISE EXCEPTION 'comment and article dates are inconsistent';
        RETURN NULL;
    END IF;
    RETURN NEW;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER new_comment
BEFORE INSERT ON comment
FOR EACH ROW EXECUTE PROCEDURE new_comment();

CREATE OR REPLACE FUNCTION delete_article() RETURNS TRIGGER AS $$
  BEGIN
    DELETE FROM report WHERE is_resolved = FALSE AND article_id=OLD.id;
    RETURN OLD;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER delete_article
AFTER DELETE ON article
FOR EACH ROW EXECUTE PROCEDURE delete_article();

CREATE OR REPLACE FUNCTION delete_comment() RETURNS TRIGGER AS $$
  BEGIN
    DELETE FROM report WHERE is_resolved = FALSE AND comment_id=OLD.id;
    RETURN OLD;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER delete_comment
AFTER DELETE ON comment
FOR EACH ROW EXECUTE PROCEDURE delete_comment();


CREATE OR REPLACE FUNCTION comment_up_vote() RETURNS TRIGGER AS $$
  BEGIN
    IF TG_OP = 'DELETE'
    THEN
      UPDATE comment SET score = score - 1 WHERE id = OLD.comment_id;
      RETURN OLD;
    END IF;
    IF TG_OP = 'INSERT'
    THEN
      DELETE FROM comment_down_vote WHERE comment_id=NEW.comment_id AND voted_by=NEW.voted_by;
      UPDATE comment SET score = score + 1 WHERE id = NEW.comment_id;
      RETURN NEW;
    END IF;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER comment_up_vote
BEFORE INSERT OR DELETE ON comment_up_vote
FOR EACH ROW EXECUTE PROCEDURE comment_up_vote();


CREATE OR REPLACE FUNCTION comment_down_vote() RETURNS TRIGGER AS $$
  BEGIN
    IF TG_OP = 'DELETE'
    THEN
      UPDATE comment SET score = score + 1 WHERE id = OLD.comment_id;
      RETURN OLD;
    END IF;
    IF TG_OP = 'INSERT'
    THEN
      DELETE FROM comment_up_vote WHERE comment_id=NEW.comment_id AND voted_by=NEW.voted_by;
      UPDATE comment SET score = score - 1 WHERE id = NEW.comment_id;
      RETURN NEW;
    END IF;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER comment_down_vote
BEFORE INSERT OR DELETE ON comment_down_vote
FOR EACH ROW EXECUTE PROCEDURE comment_down_vote();


CREATE OR REPLACE FUNCTION article_down_vote() RETURNS TRIGGER AS $$
  BEGIN
    IF TG_OP = 'DELETE'
    THEN
      UPDATE article SET score = score + 1 WHERE id = OLD.article_id;
      RETURN OLD;
    END IF;
    IF TG_OP = 'INSERT'
    THEN
      DELETE FROM article_up_vote WHERE article_id=NEW.article_id AND voted_by=NEW.voted_by;
      UPDATE article SET score = score - 1 WHERE id = NEW.article_id;
      RETURN NEW;
    END IF;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER article_down_vote
BEFORE INSERT OR DELETE ON article_down_vote
FOR EACH ROW EXECUTE PROCEDURE article_down_vote();


CREATE OR REPLACE FUNCTION article_up_vote() RETURNS TRIGGER AS $$
  BEGIN
    IF TG_OP = 'DELETE'
    THEN
      UPDATE article SET score = score - 1 WHERE id = OLD.article_id;
      RETURN OLD;
    END IF;
    IF TG_OP = 'INSERT'
    THEN
      DELETE FROM article_down_vote WHERE article_id=NEW.article_id AND voted_by=NEW.voted_by;
      UPDATE article SET score = score + 1 WHERE id = NEW.article_id;
      RETURN NEW;
    END IF;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER article_up_vote
BEFORE INSERT OR DELETE ON article_up_vote
FOR EACH ROW EXECUTE PROCEDURE article_up_vote();


CREATE OR REPLACE FUNCTION new_notification() RETURNS TRIGGER AS $$
  BEGIN
    IF (SELECT type FROM contributor WHERE id = NEW.sender) NOT IN ('Moderator', 'Administrator')
    THEN
      RAISE EXCEPTION 'only a Moderator or Administrator can send a notification';
      RETURN NULL;
    END IF;
    RETURN NEW;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER new_notification
BEFORE INSERT ON notification
FOR EACH ROW EXECUTE PROCEDURE new_notification();

CREATE OR REPLACE FUNCTION new_report() RETURNS TRIGGER AS $$
  BEGIN
    IF EXISTS (SELECT id FROM report 
               WHERE reported_by = NEW.reported_by
               AND is_resolved = FALSE
               AND article_id = NEW.article_id
               AND comment_id = NEW.comment_id)
    THEN
      RAISE EXCEPTION 'item already reported and pending revision';
      RETURN NULL;
    END IF;
    RETURN NEW;
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER new_report
BEFORE INSERT ON report
FOR EACH ROW EXECUTE PROCEDURE new_report();

CREATE OR REPLACE FUNCTION single_admin() RETURNS TRIGGER AS $$
  BEGIN
    IF (TG_OP = 'DELETE') 
    THEN
      IF(OLD.type='Administrator')
      THEN
        RAISE EXCEPTION 'the system must have a single administrator';
        RETURN NULL;
      ELSE RETURN OLD;
      END IF;
    END IF;
    
    IF (TG_OP = 'INSERT' AND
      NEW.type='Administrator'
      AND 1=(SELECT COUNT(*) FROM contributor WHERE type = 'Administrator'))
      THEN
        RAISE EXCEPTION 'the system must have a single administrator';
        RETURN NULL;
      END IF;
    
      IF (TG_OP != 'UPDATE' AND
        NEW.type='Administrator'
        AND NEW.id IN (SELECT id FROM contributor WHERE type = 'Administrator'))
        THEN
          RAISE EXCEPTION 'the system must have a single administrator';
          RETURN NULL;
      END IF;
      
      RETURN NEW;
    
  END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER single_admin
BEFORE INSERT OR UPDATE OR DELETE ON contributor
FOR EACH ROW EXECUTE PROCEDURE single_admin();

CREATE OR REPLACE FUNCTION generate_fts_article() RETURNS TRIGGER AS $$ 
  BEGIN
    NEW.fts_article = to_tsvector('portuguese', NEW.title || ' ' || NEW.summary || ' ' || NEW.content);
    RETURN NEW;
  END;
$$ LANGUAGE plpgsql;
 
CREATE TRIGGER generate_fts_article
BEFORE INSERT OR UPDATE ON article
FOR EACH ROW EXECUTE PROCEDURE generate_fts_article(); 
 
CREATE OR REPLACE FUNCTION generate_fts_name() RETURNS TRIGGER AS $$ 
  BEGIN
    NEW.fts_name = to_tsvector('portuguese', NEW.first_name || ' ' || NEW.last_name);
    RETURN NEW;
  END;
$$ LANGUAGE plpgsql;
 
CREATE TRIGGER generate_fts_name
BEFORE INSERT OR UPDATE ON contributor
FOR EACH ROW EXECUTE PROCEDURE generate_fts_name();

END;