<?php
    include_once("../../config/init.php");
    include_once($BASE_DIR . "database/users.php");

    $users = searchUser($_GET['keyword'], $_GET['limit'], $_GET['offset']);

    echo json_encode(array('count' => sizeof($users), 'users' => $users));
?>