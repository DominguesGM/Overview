<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/articles.php');
include_once($BASE_DIR .'api/users/check_access.php');

if(!administrator_access()) {
    $_SESSION['error_messages'][] = 'Acesso negado.';
    header("Location: $BASE_URL");
    exit;
}

$smarty->assign('categories', getArticleCategories());
$smarty->assign('administratorAccess', administrator_access());

$smarty->display('moderation/categories.tpl');
?>