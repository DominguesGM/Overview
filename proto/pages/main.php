<?php
    include_once('../config/init.php');
    include_once($BASE_DIR .'database/articles.php');



    $categories = getArticleCategories();

    $articles = array();
    $articles_per_line = array();

    for($i = 0; $i < $categories.length; $i++){
        $articles_per_category = searchArticle("",0, 3, $categories[$i]['name']);
        array_push($articles_per_line, $articles_per_category);
        if(($i % 3 == 2) || ($i+1 == $categories.length)){
            array_push($articles, $articles_per_line);
            $articles_per_line = array();
        }
    }

    $smarty->assign('categories', $categories);

    $smarty->assign('categoriesByLine', $articles);

    $smarty->display('main.tpl');
?>