<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'api/users/check_access.php');
include_once($BASE_DIR .'database/categories.php');

if(administrator_access() && isset($_POST['category']) && isset($_POST['id'])){
    if(updateCategory($_POST['id'], $_POST['category']))
        echo json_encode(array('success' => 'category edited successfully'));
    else
        echo json_encode(array('error' => 'error editing category '.$_POST['category'].' id '.$_POST['id']));
} else
    echo json_encode(array('error' => 'request was incorrect or no permission to execute it'));
