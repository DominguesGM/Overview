<?php
  
  function createUser($firstName, $lastName, $email, $password, $about, $extension) {
    global $conn;
    
    $validation_code = generateValidationCode();
    
    $stmt = $conn->prepare("INSERT INTO 
              contributor(email, first_name, last_name, password, validation_code, about) 
              VALUES(?,?,?,?,?,?) RETURNING id");
              
    $stmt->execute(array($email, $firstName, $lastName, hash('sha256', $validation_code . $password), $validation_code, $about));
    $userId = $stmt->fetch()['id'];
    
    $stmt = $conn->prepare("INSERT INTO 
              image(path) 
              VALUES(?) RETURNING id");
    $stmt->execute(array("images/users/$userId.$extension"));
    $photoId = $stmt->fetch()['id'];
    
    $stmt = $conn->prepare("UPDATE contributor 
      SET picture = ?  WHERE id = ?");      
    $stmt->execute(array($photoId, $userId));
    
    return array($userId, $validation_code);
  }
  
  function generateValidationCode() {
    global $conn;
    $validationCode = -1;
    
    do{
      $validationCode = bin2hex(openssl_random_pseudo_bytes(32));
      
      try{
      $stmt = $conn->prepare("SELECT * 
                              FROM contributor 
                              WHERE validation_code = ?");
      $stmt->execute(array($validationCode));
  
      }catch (PDOException $e) {
        print $e->getMessage();
      }
       
    }while($stmt->fetch() == true);
    
    return $validationCode;
  }
  
  function checkLogin($email, $password) {
    global $conn;
    
    try {
    
    $stmt = $conn->prepare("SELECT validation_code, password, type, status, first_name, last_name, id
                            FROM contributor 
                            WHERE email = ?");
    $stmt->execute(array($email)); 
    $user = $stmt->fetch();
    
    if(hash('sha256', $user['validation_code'] . $password) === $user['password']){
       return $user;
    }else{
      return false;
    }  
    
    }catch (PDOException $e) {
     print $e->getMessage();
     return false;
   }
  }
  
  function updateUserInfo($id, $firstName, $lastName, $email, $password, $picture, $about) {
    global $conn;
    
    $validation_code = generateValidationCode();
    
    try{
      $stmt = $conn->prepare("UPDATE contributor 
      SET first_name = ?, last_name = ?, email = ?, password = ?, 
      validation_code = ?, picture = ?, about = ?  
      WHERE id = ?");
                
      $stmt->execute(array($firstName, $lastName, $email, hash('sha256', $validation_code . $password), 
                            $validation_code, $picture, $about, $id));
      
    }catch (PDOException $e) {
      print $e->getMessage();
      return false;
    }
    
    return true;
  }
  
  function updateUserAccess($id, $type, $status) {
    global $conn;
    
    try{
      $stmt = $conn->prepare("UPDATE contributor 
      SET type = ?, status = ?
      WHERE id = ?");
                
      $stmt->execute(array($id, $type, $status));
      
    }catch (PDOException $e) {
      print $e->getMessage();
      return false;
    }
    
    return true;
  }
  
  function checkUserAccess($id) {
    global $conn;
    
    try{
      $stmt = $conn->prepare("SELECT type, status FROM contributor 
      WHERE id = ?");
                
      $stmt->execute(array($id));
      
      return $stmt->fetch();
    }catch (PDOException $e) {
      print $e->getMessage();
      return null;
    }
  }
  
?>