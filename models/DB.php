<?php

class DB {
    private $dbhost = "localhost:3306";
    private $dbuser = "root";
    private $dbpass = "";
    private $db = "oop_in_php";
    private $query, $conn;

    protected $sessionid;

    public function __construct() {
        $this -> sessionid = session_id();
        $this -> open_connection();
    }
    
    public function __destruct() {
        $this -> close_connection();
    }

    public function open_connection() {
        try {
            $this->conn = new PDO("mysql:host=$this->dbhost;dbname=$this->db", $this->dbuser, $this->dbpass);
            return ["err" => False];
        }
        catch(PDO_Exception $e) {
            var_dump($e);
            return ["err" => True, "msg" => "DB_CONNECTION"];
        }
    }
    public function prepare_and_execute_query($query, $props) {
        try {

            $this -> query = $this -> conn -> prepare($query);
        }
        catch(PDO_Exception $e) {
            var_dump($e);
            return ["err" => True, "msg" => "PREPARE_QUERY"];
        }
        try {
            $this -> query -> execute($props);
        }
        catch(PDO_Exception $e) {
            var_dump($e);
            return ["err" => True, "msg" => "EXECUTE_QUERY"];
        }
        return ["err" => False];
    }
    public function get_all_data() {
        try {
            $data = $this -> query -> fetchAll();
            return ["err" => False, "data" => $data];
        }
        catch(PDO_Exception $e) {
            var_dump($e);
            return  ["err" => True, "msg" => "FETCH_DATA"];
        }
    }
    public function close_connection() {
        $this->conn = null;
    }
}