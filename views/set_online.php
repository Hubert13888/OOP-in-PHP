<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once("../models/DB_add.php");
include_once("../validators/Username_validator.php");

$add_controller = new DB_add();
$username_validator = new Username_validator();

$username = $_POST["username"];

$error_info = $username_validator -> validate($username);

if(!$error_info["err"]) {
    $username = $username_validator -> get_variable();
    $status = $add_controller -> add_user($username);
    
    echo json_encode($status);
}