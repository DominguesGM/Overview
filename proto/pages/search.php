<?php
include_once('../config/init.php');
include_once($BASE_DIR .'database/users.php');

/*
if(($_GET['type'] != "article" && $_GET['type'] != "user") || !isset($_GET['query'])){
    $smarty->display('invalid_search.tpl');
    return;
}*/

$smarty->assign('SEARCH_TYPE', $_GET['type']);
$smarty->assign('SEARCH_QUERY', $_GET['query']);
$smarty->assign('SEARCH_CATEGORY', $_GET['category']);
$smarty->display('search.tpl');
?>