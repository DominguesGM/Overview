  <?php
  
  function getReports($filterBy, $limit, $offset) {
    global $conn;
    
    $sql = "SELECT report.id, description, to_char(report_date, 'DD-MM-YYYY, HH24:MI') AS report_date, article_id, comment_id, reported_by, first_name, last_name, path" +
                           "FROM report INNER JOIN contributor ON  report.reported_by = contributor.id" +
                           "INNER JOIN image ON picture = image.id";
    
    if(filterBy=='articles'){
      $sql+= " AND comment_id IS NULL";                   
    }else if(filterBy=='comments'){
      $sql+= " AND comment_id IS NOT NULL";                       
    }
    
    $sql+= " ORDER BY report_date DESC LIMIT ? OFFSET ?";                       
        
    $stmt = $conn->prepare($sql);          
    $stmt->execute(array($limit, $offset));
    return $stmt->fetchAll();
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
?>