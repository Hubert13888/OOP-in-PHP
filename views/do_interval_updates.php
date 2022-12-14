<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once("../models/DB_read.php");
include_once("../models/DB_update.php");
include_once("../models/DB_delete.php");

$read_controller = new DB_read();
$update_controller = new DB_update();
$delete_controller = new DB_delete();

$status = $update_controller -> i_am_online();
$status = $update_controller -> update_idles();
$status = $delete_controller -> delete_offlines();

$status_1 = $read_controller -> read_all_messages();
$status_2 = $read_controller -> read_online_users();

echo json_encode([$status_1, $status_2]);
