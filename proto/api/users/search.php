<?php
    include_once("../../config/init.php");
    include_once($BASE_DIR . "database/users.php");

    $users = searchUser($_GET['keyword'], $_GET['offset'], $_GET['limit']);

    echo json_encode(array('count' => sizeof($users), 'users' => $users));
?>