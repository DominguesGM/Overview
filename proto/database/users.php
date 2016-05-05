<?php
  include_once($BASE_DIR .'database/images.php');
  
  function createUser($firstName, $lastName, $email, $password, $about, $extension) {
    global $conn;
    
    $validation_code = generateValidationCode();
    
    $stmt = $conn->prepare("INSERT INTO 
              contributor(email, first_name, last_name, password, validation_code, about) 
              VALUES(?,?,?,?,?,?) RETURNING id");
              
    $stmt->execute(array($email, $firstName, $lastName, hash('sha256', $validation_code . $password), $validation_code, $about));
    $userId = $stmt->fetch()['id'];
    
    $photoId = createImage("images/users/profile_$userId.$extension");
    
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
    
    $stmt = $conn->prepare("SELECT *
                            FROM contributor 
                            WHERE email = ?");
    $stmt->execute(array($email)); 
    $user = $stmt->fetch();
    
    $user['picture'] = getImagePath($user['picture']);
    
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
  
   function validateEmail($email, $validationCode) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT validation_code FROM 
              contributor WHERE id = ?");
              
    $stmt->execute(array($email));
    $validationCodeCheck = $stmt->fetch()['validation_code'];
    
    return $validationCode === substr($validationCodeCheck, 0, 16);  ;
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
   
   function getContributors($exceptId) {
    global $conn;
    
    try {
    
    $stmt = $conn->prepare("SELECT id, email, picture, first_name, last_name, about
                            FROM contributor
                            WHERE id != ?");
    $stmt->execute(array($exceptId)); 
    return $stmt->fetchAll();
      }catch (PDOException $e) {
      print $e->getMessage();
      return false;
    }
   }
  
  function getFollowers($id) {
    global $conn;
    
    try {
    
    $stmt = $conn->prepare("SELECT id, email, picture, first_name, last_name, about
                            FROM contributor INNER JOIN follows
                            WHERE followee = ?");
    $stmt->execute(array($id)); 
    return $stmt->fetchAll();
    }catch (PDOException $e) {
      print $e->getMessage();
      return false;
    }
  }
  
  function getFollowing($id) {
    global $conn;
    
    try {
    
    $stmt = $conn->prepare("SELECT id, email, picture, first_name, last_name, about
                            FROM contributor INNER JOIN follows
                            WHERE follower = ?");
    $stmt->execute(array($id)); 
    return $stmt->fetchAll();
    }catch (PDOException $e) {
      print $e->getMessage();
      return false;
    }
  }
  
?>