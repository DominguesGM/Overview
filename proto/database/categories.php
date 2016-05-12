  <?php
  
  function createCategory($name) {
    global $conn;
    
    $stmt = $conn->prepare("INSERT INTO category(name) 
                            VALUES (?) RETURNING id");
    $stmt->execute(array($name));
    
    return $stmt->fetch()['id'];
  }
  
  function updateCategory($id, $name) {
    global $conn;
    $stmt = $conn->prepare("UPDATE category SET name = ?  
                            WHERE id = ?");
    $stmt->execute(array($name, $id));
  }
  
?>