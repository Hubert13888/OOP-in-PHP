<?php

include_once "../User_message_validator.php";
$user_message_validator = new User_message_validator;

$_POST['user-msg'] = "";
$user_message = $_POST['user-msg'];


$error_info = $user_message_validator -> validate($user_message);

if(!$error_info["err"]) {
    $user_message = $user_message_validator -> get_variable();
    echo json_encode(array("status" => $user_message));
}
else {
    echo json_encode($error_info);
}