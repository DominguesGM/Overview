<?php
  include_once($BASE_DIR .'database/images.php');
  
  /**
  * Registration
  */
  
  function createUser($firstName, $lastName, $email, $password, $about, $extension) {
    global $conn;
    
    $validation_code = generateValidationCode();
    
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL REPEATABLE READ");
    $stmt->execute();
    
    $stmt = $conn->prepare("INSERT INTO 
              contributor(email, first_name, last_name, password, validation_code, about) 
              VALUES(?,?,?,?,?,?) RETURNING id");
              
    $stmt->execute(array($email, $firstName, $lastName, hash('sha256', $validation_code . $password), $validation_code, $about));
    $userId = $stmt->fetch()['id'];
    
    $photoId = createImage("images/users/profile_$userId.$extension");
    
    // TODO add support for email verification step
    $stmt = $conn->prepare("UPDATE contributor 
      SET picture = ?, status = ?  WHERE id = ?");      
    $stmt->execute(array($photoId, 'Active', $userId));
    
    $conn->commit();
    
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
                            WHERE email = ? AND status != 'Inactive'");
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
  
  function updateUserInfo($id, $firstName, $lastName, $password, $about) {
    global $conn;
    
    $validation_code = generateValidationCode();
      
    $stmt = $conn->prepare("UPDATE contributor 
    SET first_name = ?, last_name = ?, password = ?, 
    validation_code = ?, about = ?  
    WHERE id = ?");
                
    $stmt->execute(array($firstName, $lastName, hash('sha256', $validation_code . $password), 
                            $validation_code, $about, $id));
      
    return true;
  }
  
  function updateUserType($id, $type) {
    global $conn;
    
    try{
      $stmt = $conn->prepare("UPDATE contributor 
      SET type = ?
      WHERE id = ?");
                
      $stmt->execute(array($type, $id));
      
    }catch (PDOException $e) {
      print $e->getMessage();
      return false;
    }
    
    return true;
  }
  
  function updateUserStatus($id, $status) {
    global $conn;
   
    $stmt = $conn->prepare("UPDATE contributor SET
    status = ?
    WHERE id = ?");
                
    $stmt->execute(array($status, $id));
  }
   
  function getUserStatus($id) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT status FROM contributor WHERE id = ?");
    $stmt->execute(array($id));
    return $stmt->fetch()['status'];
  }
  
  function getUserType($id) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT type FROM contributor WHERE id = ?");
    $stmt->execute(array($id));
    return $stmt->fetch()['type'];
   }
  
  /**
  * Following
  */
    
  function getFollowers($id) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT id, email, first_name, last_name, about
                            FROM contributor INNER JOIN follows ON follower = id
                            WHERE followee = ?");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }
  
  function getFollowing($id) {
    global $conn;
    
    try {
    $stmt = $conn->prepare("SELECT id, first_name, last_name, about
                            FROM contributor INNER JOIN follows ON followee = id
                            WHERE follower = ?");
    $stmt->execute(array($id));
     
    return $stmt->fetchAll();
    }catch (PDOException $e) {
      print $e->getMessage();
      return false;
    }
  }
  
  function getFollowingCount($id) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT COUNT(*) AS n_following FROM follows WHERE follower = ?");
    $stmt->execute(array($id));
    return $stmt->fetch()['n_following'];
  }
  
  function getFollowersCount($id) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT COUNT(*) AS n_followers FROM follows WHERE followee = ?");
    $stmt->execute(array($id));
    return $stmt->fetch()['n_followers'];
  }
  
  function getFollowStatus($follower, $followee) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT COUNT(*) AS n_followers FROM follows WHERE follower = ? AND followee = ?");
    $stmt->execute(array($follower, $followee));
    return $stmt->fetch()['n_followers'] > 0;
  }
  
  function follow($follower, $followee) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO follows(follower, followee) VALUES(?, ?)");
    $stmt->execute(array($follower, $followee));
  }
  
  function unfollow($follower, $followee) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM follows WHERE follower = ? AND followee = ?");
    $stmt->execute(array($follower, $followee));
  }
  
  function getUsersByType($type, $limit, $offset){
    global $conn;
    $stmt = $conn->prepare("SELECT contributor.id, contributor.first_name, contributor.last_name,
                                      contributor.status, contributor.type, contributor.about, image.path
                              FROM contributor INNER JOIN image ON (contributor.picture = image.id)
                              WHERE contributor.type = ? AND contributor.status NOT IN ('Unverified', 'Inactive') ORDER BY contributor.first_name
                              LIMIT ? OFFSET ?");

      $stmt->execute(array($type, $limit, $offset));

      return $stmt->fetchAll();
  }
  
  function getUserById($id){
    global $conn;
    $stmt = $conn->prepare("SELECT contributor.id, contributor.email , contributor.first_name, contributor.last_name,
                                      contributor.status, contributor.type, contributor.about, picture, image.path
                              FROM contributor INNER JOIN image ON (contributor.picture = image.id)
                              WHERE contributor.id = ? AND contributor.status NOT IN ('Unverified', 'Inactive')");

      $stmt->execute(array($id));

      return $stmt->fetchAll()[0];
  }

  function searchUser($keyword, $limit, $offset){
    global $conn;

    $keyword = '%' . $keyword . '%';

    if($offset == NULL || !isset($offset) || $offset == ""){
      $offset = 0;
    }

    if(!isset($limit) || $limit == ""){
      $limit = NULL;
    }

    try{
      $stmt = $conn->prepare("SELECT contributor.id, contributor.first_name, contributor.last_name,
                                      contributor.type, contributor.about, image.path
                              FROM contributor INNER JOIN image ON (contributor.picture = image.id)
                              WHERE lower(contributor.first_name || ' ' || contributor.last_name) LIKE ?
                              AND contributor.status NOT IN ('Unverified', 'Inactive')
                              LIMIT ? OFFSET ?");

      $stmt->execute(array($keyword, $limit, $offset));

      return $stmt->fetchAll();
    } catch (PDOException $e){
        print $e->getMessage();
        return null;
    }
  }
  
?>