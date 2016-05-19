<?php
  include_once($BASE_DIR .'database/images.php');
 
  function getArticleVote($articleId, $contributorId) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM article_up_vote 
                            WHERE article_id = ? AND voted_by = ?");
    $stmt->execute(array($articleId, $contributorId));
    if($stmt->fetch()){
      return 'up';
    }
    
    $stmt = $conn->prepare("SELECT * 
                            FROM article_down_vote 
                            WHERE article_id = ? AND voted_by = ?");
    $stmt->execute(array($articleId, $contributorId));
    
    if($stmt->fetch()){
      return 'down';
    }
    
    return 'none';    
  }
  
  function upvoteArticle($articleId, $contributorId) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO article_up_vote(article_id, voted_by)  
                            VALUES(?,?)");
    $stmt->execute(array($articleId, $contributorId));
    return getArticleScore($articleId);
  }
  
  function downvoteArticle($articleId, $contributorId) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO article_down_vote(article_id, voted_by)  
                            VALUES(?,?)");
    $stmt->execute(array($articleId, $contributorId));
    return getArticleScore($articleId);
  }
 
  function getArticleCategories(){
    global $conn;
    
    $stmt = $conn->prepare("SELECT * 
                            FROM category 
                            ORDER BY name ASC");
    $stmt->execute();
    return $stmt->fetchAll();    
  }
  
  function getArticlesByCategory($id){
    global $conn;
    
    $stmt = $conn->prepare("SELECT article.*, category_id, to_char(publication_date, 'DD-MM-YYYY, HH24:MI') AS publication_date
                            FROM article INNER JOIN 
                            category_article ON article.id= category_article.article_id 
                            WHERE category_id = ? 
                            ORDER BY publication_date DESC");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  } 
    
  function getArticleById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT article.*, contributor.*, to_char(publication_date, 'DD-MM-YYYY, HH24:MI') AS publication_date
                            FROM article INNER JOIN 
                            contributor ON article.author = contributor.id  
                            WHERE article.id = ?");
    $stmt->execute(array($id));
    
    return $stmt->fetch();
  }
  
  function deleteArticle($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM article  
                            WHERE id = ?");
    $stmt->execute(array($id));
  }
  
  function getArticlesByAuthor($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT contributor.*, article.*, to_char(publication_date, 'DD-MM-YYYY, HH24:MI') AS publication_date
                            FROM article INNER JOIN
                            contributor ON artcile.author = contributor.id 
                            WHERE contributor.id = ? 
                            ORDER BY publication_date DESC");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }
  
  function getArticleCategory($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM category_article  
                            WHERE article_id = ?");
    $stmt->execute(array($id));
    return $stmt->fetch();
  }
  
  function createArticle($author, $title, $category, $summary, $content, $imageTypes) {
    global $conn;
        
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL REPEATABLE READ");
    $stmt->execute();
    
    $stmt = $conn->prepare("INSERT INTO article(author, title, summary, content) 
                            VALUES (?, ?, ?, ?) RETURNING id");
    $stmt->execute(array($author, $title, $summary, $content));
    $articleId = $stmt->fetch()['id'];
    
    $stmt = $conn->prepare("INSERT INTO category_article(category_id, article_id) 
                            VALUES (?, ?)");
    $stmt->execute(array($category, $articleId));
    
    $sql = "INSERT INTO article_image(image_id,article_id) VALUES ";
                            
    for($i = 0; $i < count($imageTypes); $i++){
      $imageId = createImage('images/articles/article_'. $articleId . '-' . $i . '.' . $imageTypes[$i]);
       
      if($i!=0){
       $sql .= ',';
      }
       
      $sql .= '(' . $imageId . ',' . $articleId . ')';
    }
                            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn->commit();
    
    return $articleId;
  }
  
  function updateArticle($id, $title, $category, $summary, $content, $imageTypes) {
    global $conn;
    $conn->beginTransaction();
    $stmt = $conn->prepare("SET TRANSACTION ISOLATION LEVEL REPEATABLE READ");
    $stmt->execute();
    
    $stmt = $conn->prepare("UPDATE article SET title = ?, summary = ?, content = ? 
                            WHERE id = ?");
    $stmt->execute(array($title, $summary, $content, $id));
    
    $stmt = $conn->prepare("DELETE FROM category_article  
                            WHERE article_id = ?");
    $stmt->execute(array($id));
    
    $stmt = $conn->prepare("INSERT INTO category_article(category_id, article_id) 
                            VALUES (?, ?)");
    $stmt->execute(array($category, $id));
     
    $stmt = $conn->prepare("SELECT MAX(image_id) AS last_image_id
                          FROM article_image 
                          WHERE article_id = ?");
    $stmt->execute(array($id));
    $lastImagePath = getImagePath($stmt->fetch()['last_image_id']);
      
    $nextImageId = 0;
   
    if($lastImagePath){
      preg_match_all('/(?<=-)[1-9]+/', $lastImagePath, $matches);
      $nextImageId = $matches[0][0] + 1;
    }       
        
    if(count($imageTypes)){
      $sql = "INSERT INTO article_image(image_id,article_id) VALUES ";
                              
      for($i = 0; $i < count($imageTypes); $i++){
        $imageId = createImage('images/articles/article_'. $id . '-' . ($nextImageId + $i) . '.' . $imageTypes[$i]);
        
        if($i!=0){
          $sql .= ',';
        }
        
        $sql .= '(' . $imageId . ',' . $id . ')';
      }
                              
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    }
    $conn->commit();
    
    return $nextImageId;
  }

  function getArticleImages($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT id, path
                            FROM image INNER JOIN 
                            article_image ON id=image_id  
                            WHERE article_id = ?");
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }
  
  function getArticleScore($id){
    global $conn;
    $stmt = $conn->prepare("SELECT score 
                            FROM article 
                            WHERE id = ?");
    $stmt->execute(array($id));
    return $stmt->fetch()['score'];    
  }

  function searchArticle($keyword, $offset, $limit, $category){
    global $conn;
    $categoryString = "";
    $keywordString = "";
    $argumentArray = array();

    if($category != NULL && isset($category) && $category != "") {
      $categoryString =  " AND lbaw.category.name LIKE ?";
      array_push($argumentArray, $category);
    }

    if($keyword != NULL && isset($keyword) && $keyword != "") {
      $keywordString = " WHERE a_search.fts_article @@ plainto_tsquery('portuguese', ?)";
      array_push($argumentArray, $keyword);
    }

    if($offset == NULL || !isset($offset) || $offset == ""){
      $offset = 0;
    }

    if(!isset($limit) || $limit == ""){
      $limit = NULL;
    }


    $stmt = $conn->prepare("SELECT * FROM (SELECT article.id AS id, author, to_char(publication_date, 'DD-MM-YYYY, HH24:MI') AS date, publication_date, title, summary, content, score, fts_article, first_name, last_name,
                                          CASE WHEN score >= 0 AND score < 1 THEN 1 ELSE score END AS log_content,
                                          CASE WHEN score >= 0 THEN 1 ELSE -1 END AS signal
                                          FROM lbaw.article INNER JOIN lbaw.contributor ON contributor.id = article.author
                                          GROUP BY article.id, contributor.first_name, contributor.last_name) a_search INNER JOIN
                                          (SELECT article_id, image.path FROM
                                                            (SELECT article_id, MIN(image_id) AS first FROM article_image GROUP BY article_id) foo INNER JOIN
                                                            image ON (first = image.id))
                                                  single_image
                                          ON single_image.article_id = a_search.id
                                INNER JOIN lbaw.category_article ON lbaw.category_article.article_id = a_search.id
                                INNER JOIN lbaw.category ON (lbaw.category.id = lbaw.category_article.category_id" . $categoryString . ")
                           " . $keywordString . " ORDER BY (log(abs(a_search.log_content)) + EXTRACT(EPOCH FROM age(a_search.publication_date, timestamp '2005-12-08 7:46:43'))*a_search.signal/45000) DESC
                           LIMIT ?  OFFSET ?");

    array_push($argumentArray, $limit, $offset);

    $stmt->execute($argumentArray);

    return $stmt->fetchAll();
  }

?>