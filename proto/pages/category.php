<?php
    include_once('../config/init.php');
    include_once($BASE_DIR .'database/articles.php');
    include_once($BASE_DIR .'database/categories.php');

    $category = 'Categoria inexistente.';

    if(isset($_GET['category'])){
        if(checkCategoryExists($_GET['category']) || $_GET['category'] == "Following"){
            $category = $_GET['category'];
        }
    }

    $smarty->assign('category', $category);

    $smarty->display('category.tpl');

?>