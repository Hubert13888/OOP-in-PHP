<?php

include_once "DB.php";

class DB_add extends DB {

    public function add_user_message($content, $username) {
        $created_on = date("Y-m-d H-i-s");

        $status = $this -> open_connection();
        if($status["err"]) return $status;

        $client_id = uniqid('msg_');
        $status = $this -> prepare_and_execute_query(
            'INSERT INTO messages VALUES ("", ?, ?, ?, ?, ?)', 
            [$this->sessionid, $username, $created_on, $content, $client_id]
        );
        if($status["err"]) return $status;

        return ["err" => False];
    }
    public function add_user($username) {
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $created_on = date("Y-m-d H-i-s");
        $updated_on = date("Y-m-d H-i-s");

        $status = $this -> prepare_and_execute_query(
            "INSERT INTO users VALUES (?, ?, ?, ?, ?, ?)", 
            [$this -> sessionid, $ip_addr, $username, $created_on, $updated_on, 1]
        );

        return ["err" => False, "data" => $username];
    }
}