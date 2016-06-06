<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'api/users/check_access.php');
include_once($BASE_DIR .'database/categories.php');

if(administrator_access() && isset($_POST['category'])){
    $id = createCategory($_POST['category']);
    if($id >= 0 && isset($id)) {
        echo json_encode(array('success' => $id));
    }
    else
        echo json_encode(array('error' => 'error creating category'));
} else
    echo json_encode(array('error' => 'request was incorrect or no permission to execute it'));
