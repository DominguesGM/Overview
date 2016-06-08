<?php
     
  function createImage($path) {
    global $conn;
    
    $stmt = $conn->prepare("INSERT INTO image(path) 
                            VALUES (?) RETURNING id");
    $stmt->execute(array($path));
    return $stmt->fetch()['id'];
  }
  
  function setImagePath($id, $path) {
    global $conn;
    
    $stmt = $conn->prepare("UPDATE image 
                            SET path = ?  
                            WHERE id = ?");
    $stmt->execute(array($path, $id));
  }
  
  function getImagePath($id) {
   global $conn;
   
   $stmt = $conn->prepare("SELECT path
                            FROM image 
                            WHERE id = ?");
    $stmt->execute(array($id)); 
    return $stmt->fetch()['path'];
  }
  
  function deleteImage($id) {
   global $conn;
   
   $stmt = $conn->prepare("DELETE FROM image 
                            WHERE id = ? RETURNING path");
    $stmt->execute(array($id)); 
    return $stmt->fetch()['path'];
  }
?>