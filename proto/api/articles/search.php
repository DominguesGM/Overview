<?php
include_once("../../config/init.php");
include_once($BASE_DIR . "database/articles.php");

$articles = searchArticle($_GET['keyword'], $_GET['offset'], $_GET['limit'], $_GET['category']);

echo json_encode(array('count' => sizeof($articles), 'articles' => $articles));
?>