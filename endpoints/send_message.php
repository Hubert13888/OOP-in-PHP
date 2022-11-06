<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once "../validators/User_message_validator.php";
include_once "../controllers/DB_add_controller.php";

$user_message_validator = new User_message_validator;
$add_controller = new DB_add();

$user_message = $_POST['user-msg'];

$error_info = $user_message_validator -> validate($user_message);

if(!$error_info["err"]) {
    $user_message = $user_message_validator -> get_variable();
    $status = $add_controller -> add_user_message($user_message);
    
    echo json_encode($status);
}
else {
    echo json_encode($error_info);
}