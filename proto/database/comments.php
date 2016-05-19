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
    $stmt = $conn->prepare("INSERT INTO down_up_vote(comment_id, voted_by)  
                            VALUES(?,?)");
    $stmt->execute(array($commentId, $contributorId));
    return getCommentScore($commentId);
  }
  
  function deleteComment($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM comment  
                            WHERE id = ?");
    $stmt->execute(array($id));
  }
  
  function getArticleComments($id, $limit = 'ALL', $offset = 0) {
    global $conn;
    $stmt = $conn->prepare("SELECT comment.id, content, to_char(comment_date, 'DD-MM-YYYY, HH24:MI') AS comment_date, score, posted_by, first_name, last_name, path 
                           FROM comment INNER JOIN contributor ON comment.posted_by = contributor.id
                           INNER JOIN image ON picture = image.id
                           WHERE article_id = ?
                           ORDER BY comment_date DESC
                           LIMIT ? OFFSET ?");
    $stmt->execute(array($id, $limit, $offset));
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