  <?php
  
  function getArticleReports($resolved, $limit, $offset) {
    global $conn;
    
    $sql = "SELECT report.id, report.description, to_char(report_date, 'DD-MM-YYYY, HH24:MI') AS report_date, 
       report.article_id, report.reported_by,
       contributor.first_name AS reporter_first_name, contributor.last_name AS reporter_last_name, image.path AS reporter_picture
       FROM report INNER JOIN contributor ON report.reported_by = contributor.id INNER JOIN image ON contributor.picture = image.id
       WHERE comment_id IS NULL
       AND is_resolved = ? ORDER BY report_date LIMIT ? OFFSET ?";
       
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(var_export($resolved, true), $limit, $offset));
       
    return $stmt->fetchAll();
  }
  
  function getCommentReports($resolved, $limit, $offset) {
     global $conn;
    
    $sql = "SELECT report.id, report.description, to_char(report_date, 'DD-MM-YYYY, HH24:MI') AS report_date, 
       comment.article_id, report.comment_id, report.reported_by,
       contributor.first_name AS reporter_first_name, contributor.last_name AS reporter_last_name, image.path AS reporter_picture
       FROM report INNER JOIN comment ON comment_id = comment.id 
       INNER JOIN contributor ON report.reported_by = contributor.id 
       INNER JOIN image ON contributor.picture = image.id
       WHERE comment_id IS NOT NULL    
       AND is_resolved = ? ORDER BY report_date LIMIT ? OFFSET ?";
       
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(var_export($resolved, true), $limit, $offset));
       
    return $stmt->fetchAll();
  }
 
  function getReportCount() {
    global $conn;
    
    $stmt = $conn->prepare("SELECT COUNT(*) AS n_reports FROM report
                           WHERE is_resolved = FALSE");
                           
    $stmt->execute();
    return $stmt->fetch()['n_reports'];
  }
  
  function getReport($id) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT description,  to_char(report_date, 'DD-MM-YYYY, HH24:MI') AS report_date, article_id, comment_id, reported_by, first_name, last_name, path 
                           FROM report, contributor, image
                           WHERE report_id = ? 
                           AND report.reported_by = contributor.id
                           AND picture = image.id");
                           
    $stmt->execute(array($id));
    return $stmt->fetch();
  }
  
  function createReport($reportedBy, $articleId, $commentId, $description) {
    global $conn;
    
    $stmt = $conn->prepare("INSERT INTO report(reported_by, article_id, comment_id, description) 
                            VALUES (?, ?, ?, ?) RETURNING id");
    $stmt->execute(array($reportedBy, $articleId, $commentId, $description));
    return $stmt->fetch()['id'];
  }
  
  function setReportReviewed($id) {
    global $conn;
    
    $stmt = $conn->prepare("UPDATE report SET is_resolved = true WHERE id = ?");
    $stmt->execute(array($id));
  }
  
  function deleteReport($id) {
    global $conn;
    
    $stmt = $conn->prepare("DELETE FROM report WHERE id = ?");
    $stmt->execute(array($id));
  }
?>