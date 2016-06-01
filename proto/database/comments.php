  <?php
  function upvoteComment($commentId, $contributorId) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO comment_up_vote(comment_id, voted_by)
                            VALUES(?,?)");
    $stmt->execute(array($commentId, $contributorId));
    return getCommentScore($commentId);
  }

  function downvoteComment($commentId, $contributorId) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO comment_down_vote(comment_id, voted_by)
                            VALUES(?,?)");
    $stmt->execute(array($commentId, $contributorId));
    return getCommentScore($commentId);
  }

  function deleteUpvoteComment($commentId, $contributorId) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM comment_up_vote WHERE comment_id = ? AND voted_by = ?");
    $stmt->execute(array($commentId, $contributorId));

    return getCommentScore($commentId);
  }

  function deleteDownvoteComment($commentId, $contributorId) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM comment_down_vote WHERE comment_id = ? AND voted_by = ?");
    $stmt->execute(array($commentId, $contributorId));

    return getCommentScore($commentId);
  }

  function deleteComment($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM comment
                            WHERE id = ?");
    $stmt->execute(array($id));
  }

  function getArticleComments($articleId, $limit, $offset, $userId) {
    global $conn;

    if($userId){
    $sql = "SELECT comment.id, content, to_char(comment_date, 'DD-MM-YYYY, HH24:MI') AS comment_date, score, posted_by, first_name, last_name, path,
   (CASE
    WHEN comment_vote.up_vote IS NOT NULL THEN 'up'
    WHEN comment_vote.down_vote IS NOT NULL THEN 'down'
    ELSE 'none'
   END) AS vote,
   (CASE
    WHEN comment_report.comment_id IS NOT NULL THEN comment_report.comment_id
      ELSE NULL
   END) AS report
   FROM
   ((comment LEFT OUTER JOIN
   (SELECT comment_up_vote.comment_id AS comment_id, comment_up_vote.comment_id AS up_vote, NULL AS down_vote
    FROM comment_up_vote
    WHERE comment_up_vote.voted_by = ?
    UNION
    SELECT comment_down_vote.comment_id AS comment_id, NULL AS up_vote, comment_down_vote.comment_id AS down_vote
    FROM comment_down_vote
    WHERE comment_down_vote.voted_by = ?
   ) comment_vote  ON comment_vote.comment_id = comment.id)
   LEFT OUTER JOIN
   (SELECT report.comment_id AS comment_id
    FROM report WHERE is_resolved = FALSE AND reported_by = ?
   ) comment_report ON comment_report.comment_id = comment.id)
   INNER JOIN contributor ON comment.posted_by = contributor.id
   INNER JOIN image ON picture = image.id
   WHERE article_id = ?
   ORDER BY comment.comment_date DESC";

    if($limit==='ALL'){
        $sql .= " OFFSET ?";
        $stmt =  $conn->prepare($sql);
        $stmt->execute(array($userId, $userId, $userId, $articleId, $offset));
      }else{
        $sql .= " LIMIT ? OFFSET ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($userId, $userId, $userId, $articleId, $limit, $offset));
      }
    }else{
       $sql = "SELECT comment.id, content, to_char(comment_date, 'DD-MM-YYYY, HH24:MI') AS comment_date, score, posted_by, first_name, last_name, path
   FROM comment
   INNER JOIN contributor ON comment.posted_by = contributor.id
   INNER JOIN image ON picture = image.id
   WHERE article_id = ?
   ORDER BY comment.comment_date DESC";

      if($limit==='ALL'){
        $sql .= " OFFSET ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($articleId, $offset));
      }else{
        $sql .= " LIMIT ? OFFSET ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($articleId, $limit, $offset));
      }
    }

    return $stmt->fetchAll();
  }

  function getArticleCommentsCount($id) {
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) AS comment_count
                           FROM comment
                           WHERE article_id = ?");
    $stmt->execute(array($id));
    return $stmt->fetch()['comment_count'];
  }

  function createComment($author, $articleId, $content) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO comment(posted_by, article_id, content)
                            VALUES (?, ?, ?) RETURNING id, to_char(comment_date, 'DD-MM-YYYY, HH24:MI') AS comment_date");
    $stmt->execute(array($author, $articleId, $content));
    return $stmt->fetch();
  }

  function getCommentScore($id){
    global $conn;

    $stmt = $conn->prepare("SELECT score
                            FROM comment
                            WHERE id = ?");
    $stmt->execute(array($id));
    return $stmt->fetch()['score'];
  }
?>