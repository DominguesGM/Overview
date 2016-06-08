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
    return $stmt->execute(array($name, $id));
  }

  function checkCategoryExists($name){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM category WHERE name LIKE ? ");
    $stmt->execute(array($name));
  
    if(count($stmt->fetchAll()) == 0)
      return false;
    return true;
  }
?>