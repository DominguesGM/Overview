<?php
  function getFolloweesArticles($userId){
    global $conn;

    $stmt = $conn->prepare("SELECT *
                            FROM (SELECT article.*, first_name, last_name, contributor.id AS author_id, image.path AS author_picture, article.id AS article_id, to_char(publication_date, 'DD-MM-YYYY, HH24:MI') AS date, CASE WHEN score >= 0 AND score < 1 THEN 1 ELSE score END AS log_content,
                                          CASE WHEN score >= 0 THEN 1 ELSE -1 END AS signal FROM article INNER JOIN follows
                                        ON follows.followee = article.author INNER JOIN contributor ON contributor.id = article.author INNER JOIN image ON contributor.picture = image.id
                                        WHERE follows.follower = ?) AS subquery
                            INNER JOIN category_article ON category_article.article_id = subquery.article_id
                            INNER JOIN category ON category.id = category_article.category_id
                            INNER JOIN (SELECT article_id, image.path FROM
                                                         (SELECT article_id, MIN(image_id) AS first FROM article_image GROUP BY article_id) foo INNER JOIN
                                                         image ON (first = image.id)) AS single_image
                                        ON single_image.article_id = subquery.article_id
                            ORDER BY (log(abs(subquery.log_content)) + EXTRACT(EPOCH FROM age(subquery.publication_date, timestamp '2005-12-08 7:46:43'))*subquery.signal/45000) DESC
                            ");

    $params = array($userId);
    $stmt->execute($params);
    return $stmt->fetchAll();
  }

 function getUserArticles($userId, $userInfo){
    global $conn;

    $stmt = $conn->prepare("SELECT article.*,article.id AS article_id, to_char(publication_date, 'DD-MM-YYYY, HH24:MI') AS date, image_article AS path
                            FROM article INNER JOIN 
                            (SELECT article_id, image.path AS image_article FROM
                            (SELECT article_id, MIN(image_id) AS first FROM article_image GROUP BY article_id) foo INNER JOIN
                            image ON (first = image.id)) single_image 
                            ON single_image.article_id = article.id
                            WHERE article.author = ?
                            ORDER BY article.publication_date DESC");

    $params = array($userId);
    $stmt->execute($params);
    $results = $stmt->fetchAll();
    
    for($i=0; $i<count($results); $i++){
      $results[$i]['author_id'] = $userId;
      $results[$i]['author_picture'] = $userInfo['path'];
      $results[$i]['first_name'] = $userInfo['first_name'];
      $results[$i]['last_name'] = $userInfo['last_name'];
    }
    
    return $results;
  }

?>