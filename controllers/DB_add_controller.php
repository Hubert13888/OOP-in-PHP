<?php

include_once "../models/DB.php";

class DB_add {
    private $db;

    public function __construct() {
        $this -> db = new DB();
    }

    public function add_user_message($message) {
        $this -> db -> open_connection();
        $this -> db -> prepare_and_execute_query("INSERT INTO ");
    }
}