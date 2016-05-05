<?php
  
  function deleteComment($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM comment  
                            WHERE id = ?");
    $stmt->execute(array($id));
  }
  
  function getArticleComments($id, $limit = 'ALL', $offset = 0) {
    global $conn;
      
    $stmt = $conn->prepare("SELECT comment.id, content, comment_date, score, posted_by, first_name, last_name, path 
                           FROM comment, contributor, image
                           WHERE article_id = ? 
                           AND comment.id = contributor.id
                           AND picture = image.id
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
                            VALUES (?, ?, ?) RETURNING id");
    $stmt->execute(array($author, $articleId, $content));
    return $stmt->fetch()['id'];
  }
  
?>