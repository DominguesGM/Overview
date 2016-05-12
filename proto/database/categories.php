  <?php
  
  function createCategory($name) {
    global $conn;
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED");
    $stmt->execute();
    
    $stmt = $conn->prepare("INSERT INTO category(name) 
                            VALUES (?) RETURNING id");
    $stmt->execute(array($name));
    $conn->commit();
    
    return $stmt->fetch()['id'];
  }
  
  function updateCategory($id, $name) {
    global $conn;
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL READ COMMITTED");
    $stmt->execute();
    
    $stmt = $conn->prepare("UPDATE category SET name = ?  
                            WHERE id = ?");
    $stmt->execute(array($name, $id));
    $conn->commit();
  }
  
?>