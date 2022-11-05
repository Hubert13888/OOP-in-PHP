<?php

class DB {
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $db = "";

    private $conn, $query;

    public function open_connection() {
        try {
            $this->conn = new PDO("mysql:host=$this->dbhost;dbname=myDB", $this->$username, $this->$password, $this->$db);
            return ["err" => False];
        }
        catch(PDO_Exception $e) {
            var_dump($e);
            return ["err" => True, "msg" => "DB_CONNECTION"];
        }
    }
    public function prepare_and_execute_query($query, $props) {
        try {
            $this -> $query = $this -> conn -> prepare($query);
        }
        catch(PDO_Exception $e) {
            var_dump($e);
            return ["err" => True, "msg" => "PREPARE_QUERY"];
        }
        try {
            $this -> $query -> execute($props);
        }
        catch(PDO_Exception $e) {
            var_dump($e);
            return ["err" => True, "msg" => "EXECUTE_QUERY"];
        }
        return ["err" => False];
    }
    public function get_all_data() {
        try {
            $data = $this -> $query -> fetchAll();
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