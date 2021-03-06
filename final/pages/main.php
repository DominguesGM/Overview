<?php
    include_once('../config/init.php');
    include_once($BASE_DIR .'database/articles.php');



    $categories = getArticleCategories();


    $articles = array();
    $articles_per_line = array();

    if(isset($_SESSION['id'])){
        $followee_articles = getFolloweeArticles($_SESSION['id'], 0, 2);
        if(isset($followee_articles)){
            $i = 1;
            array_push($articles_per_line, $followee_articles);
            array_unshift($categories, array('id' => -1, 'name' => "Following"));
        }
    } else {
        $i = 0;
    }

    for(; $i < count($categories); $i++){
        $articles_per_category = searchArticle("",0, 2, $categories[$i]['name']);
        array_push($articles_per_line, $articles_per_category);
        if(($i % 3 == 2) || ($i+1 == count($categories))){
            array_push($articles, $articles_per_line);
            $articles_per_line = array();
        }
    }

    $smarty->assign('categories', $categories);

    $smarty->assign('categoriesByLine', $articles);

    $smarty->display('main.tpl');
?>