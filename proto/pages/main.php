<?php
    include_once('../config/init.php');
    include_once($BASE_DIR .'database/articles.php');



    $categories = getArticleCategories();


    $articles = array();
    $articles_per_line = array();

    if(isset($_SESSION['id'])){
        $i = 1;
        $articles_per_category = getFolloweeArticles($_SESSION['id'], 0, 2);
        if(isset($articles_per_category)){
            $i = 1;
            array_push($articles_per_line, $articles_per_category);
            array_unshift($categories, array('id' => -1, 'name' => "Follow Feed"));
        }
    } else {
        $id = 0;
    }

    for(; $i < count($categories); $i++){
        $articles_per_category = searchArticle("",0, 2, $categories[$i]['name']);
        var_dump($articles_per_category);
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