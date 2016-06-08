<?php
include_once("../../config/init.php");
include_once($BASE_DIR . "database/articles.php");

if(!isset($_SESSION['id'])){
    $articles = array();
} else {
    $articles = getFolloweeArticles($_SESSION['id'], $_GET['offset'], $_GET['limit']);
}

echo json_encode(array('count' => sizeof($articles), 'articles' => $articles));
?>