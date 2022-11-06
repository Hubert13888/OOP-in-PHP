<?php

include_once "../connector/DB.php";

class DB_operate {
    protected $db;
    protected $sessionid;

    public function __construct() {
        $this -> sessionid = session_id();
        $this -> db = new DB();
        $this -> db -> open_connection();
    }
    
    public function __destruct() {
        $this -> db -> close_connection();
    }
}