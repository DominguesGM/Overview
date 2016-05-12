  <?php
  
  function getReports($filterBy, $limit, $offset) {
    global $conn;
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED READ ONLY");
    $stmt->execute();
    
    $sql = "SELECT report.id, description, report_date, article_id, comment_id, reported_by, first_name, last_name, path 
                           FROM report, contributor, image
                           WHERE report.reported_by = contributor.id
                           AND picture = image.id";
    
    if(filterBy=='articles'){
      $sql+= " AND comment_id IS NULL"                       
    }else if(filterBy=='comments'){
      $sql+= " AND comment_id IS NOT NULL"                       
    }
    
    $sql+= " ORDER BY report_date DESC LIMIT ? OFFSET ?";                       
        
    $stmt = $conn->prepare($sql);
                           
    $stmt->execute(array($limit, $offset));
    $conn->commit();
    
    return $stmt->fetchAll();
  }
  
  function getReport($id) {
    global $conn;
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED READ ONLY");
    $stmt->execute();
      
    $stmt = $conn->prepare("SELECT description, report_date, article_id, comment_id, reported_by, first_name, last_name, path 
                           FROM report, contributor, image
                           WHERE report_id = ? 
                           AND report.reported_by = contributor.id
                           AND picture = image.id");
                           
    $stmt->execute(array($id));
    $conn->commit();
    
    return $stmt->fetchAll();
  }
  
  function createReport($reportedBy, $articleId, $commentId, $description) {
    global $conn;
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED");
    $stmt->execute();
    
    $stmt = $conn->prepare("INSERT INTO report(reported_by, article_id, comment_id, description) 
                            VALUES (?, ?, ?, ?) RETURNING id");
    $stmt->execute(array($reportedBy, $articleId, $commentId, $description));
    $conn->commit();
    
    return $stmt->fetch()['id'];
  }
  
  function setReportReviewed($id) {
    global $conn;
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED");
    $stmt->execute();
    
    $stmt = $conn->prepare("UPDATE report SET is_resolved = true WHERE id = ?");
    $stmt->execute(array($id));
    $conn->commit();
  }
?>