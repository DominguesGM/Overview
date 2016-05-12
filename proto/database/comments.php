  <?php
  function upvoteComment($commentId, $contributorId) {
    global $conn;
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL REPEATABLE READ");
    $stmt->execute();
    
    $stmt = $conn->prepare("INSERT INTO comment_up_vote(comment_id, voted_by)  
                            VALUES(?,?)");
    $stmt->execute(array($commentId, $contributorId));
    $conn->commit();
    
    return getCommentScore($commentId);
  }
  
  function downvoteComment($commentId, $contributorId) {
    global $conn;
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL REPEATABLE READ");
    $stmt->execute();
    
    $stmt = $conn->prepare("INSERT INTO down_up_vote(comment_id, voted_by)  
                            VALUES(?,?)");
    $stmt->execute(array($commentId, $contributorId));
    $conn->commit();
    
    return getCommentScore($commentId);
  }
  
  function deleteComment($id) {
    global $conn;
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED");
    $stmt->execute();
    
    $stmt = $conn->prepare("DELETE FROM comment  
                            WHERE id = ?");
    $stmt->execute(array($id));
    $conn->commit();
  }
  
  function getArticleComments($id, $limit = 'ALL', $offset = 0) {
    global $conn;
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED READ ONLY");
    $stmt->execute();
      
    $stmt = $conn->prepare("SELECT comment.id, content, comment_date, score, posted_by, first_name, last_name, path 
                           FROM comment, contributor, image
                           WHERE article_id = ? 
                           AND comment.posted_by = contributor.id
                           AND picture = image.id
                           ORDER BY comment_date DESC
                           LIMIT ? OFFSET ?");
    $stmt->execute(array($id, $limit, $offset));
    $conn->commit();
    
    return $stmt->fetchAll();
  }
  
  function getArticleCommentsCount($id) {
    global $conn;
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED READ ONLY");
    $stmt->execute();
      
    $stmt = $conn->prepare("SELECT COUNT(*) AS comment_count
                           FROM comment
                           WHERE article_id = ?");
    $stmt->execute(array($id));
    $conn->commit();
    
    return $stmt->fetch()['comment_count'];
  }
 
  function createComment($author, $articleId, $content) {
    global $conn;
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED");
    $stmt->execute();
    
    $stmt = $conn->prepare("INSERT INTO comment(posted_by, article_id, content) 
                            VALUES (?, ?, ?) RETURNING id, comment_date");
    $stmt->execute(array($author, $articleId, $content));
    $conn->commit();
    
    return $stmt->fetch();
  }
  
  function getCommentScore($id){
    global $conn;
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED READ ONLY");
    $stmt->execute();

    $stmt = $conn->prepare("SELECT score 
                            FROM comment 
                            WHERE id = ?");
    $stmt->execute(array($id));
    $conn->commit();
    
    return $stmt->fetch()['score'];    
  }
?>