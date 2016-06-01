  <?php
  
  function getNotifications($userId, $read, $limit, $offset) {
    global $conn;
    
    $sql = "SELECT notification.id, is_read, message, to_char(sent_date, 'DD-MM-YYYY, HH24:MI') AS sent_date, 
       sender, contributor.first_name AS sender_first_name, contributor.last_name AS sender_last_name, image.path AS sender_picture
       FROM notification INNER JOIN contributor ON notification.sender = contributor.id INNER JOIN image ON contributor.picture = image.id
       WHERE receiver = ?";
       
       if($read!==NULL){
         $sql .= " AND is_read = ?";
         $sql .= " ORDER BY sent_date LIMIT ? OFFSET ?";
         $stmt = $conn->prepare($sql);
         $stmt->execute(array($userId, var_export($read, true), $limit, $offset));
       }else{
         $sql .= " ORDER BY sent_date LIMIT ? OFFSET ?";
         $stmt = $conn->prepare($sql);
         $stmt->execute(array($userId, $limit, $offset));
       }
       
    return $stmt->fetchAll();
  }
  
  function getNotificationCount($userId) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT COUNT(*) AS n_notifications 
                           FROM notification
                           WHERE receiver = ? AND is_read = FALSE");
                           
    $stmt->execute(array($userId));
    return $stmt->fetch()['n_notifications'];
  }
  
  function createNotification($senderId, $userId, $message) {
    global $conn;
    
    $stmt = $conn->prepare("INSERT INTO notification(sender, receiver, message) 
                            VALUES (?, ?, ?) RETURNING id");
    $stmt->execute(array($senderId, $userId, $message));
    return $stmt->fetch()['id'];
  }
  
  function setNotificationRead($id) {
    global $conn;
    
    $stmt = $conn->prepare("UPDATE notification SET is_read = true WHERE id = ?");
    $stmt->execute(array($id));
  }
  
  function deleteNotification($id) {
    global $conn;
    
    $stmt = $conn->prepare("DELETE FROM notification WHERE id = ?");
    $stmt->execute(array($id));
  }
?>