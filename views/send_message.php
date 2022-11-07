<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once "../validators/User_message_validator.php";
include_once "../models/DB_add.php";
include_once "../models/DB_read.php";

$user_message_validator = new User_message_validator;
$add_controller = new DB_add();
$read_controller = new DB_read();

$user_message = $_POST['user-msg'];

$error_info = $user_message_validator -> validate($user_message);

if(!$error_info["err"]) {
    $user_message = $user_message_validator -> get_variable();

    $status = $read_controller -> get_my_data();
    $status = $add_controller -> add_user_message($user_message, $status["data"][0][2]);
    
    echo json_encode($status);
}
else {
    echo json_encode($error_info);
}