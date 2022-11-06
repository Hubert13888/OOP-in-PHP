<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once("../controllers/DB_read_controller.php");
include_once("../controllers/DB_update_controller.php");

$read_controller = new DB_read();
$update_controller = new DB_update();

$status = $read_controller -> is_my_sessionid_in_db();

if($status["data"]) {
    $status = $update_controller -> switch_me_online();
    echo json_encode(["err" => False, "data" => True]);
}
else echo json_encode(["err" => False, "data" => False]);