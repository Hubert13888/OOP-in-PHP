<?php

include_once "DB_operate.php";

class DB_add extends DB_operate {

    public function add_user_message($message) {
        $author = $_SERVER['REMOTE_ADDR'];
        $created_on = date("Y-m-d H-i-s");

        $status = $this -> db -> open_connection();
        if($status["err"]) return $status;

        $client_id = uniqid('msg_');
        $status = $this -> db -> prepare_and_execute_query(
            'INSERT INTO messages VALUES ("", ?, ?, ?, ?)', [$created_on, $author, $message, $client_id]
        );
        if($status["err"]) return $status;

        return ["err" => False];
    }
    public function add_user($username) {
        $created_on = date("Y-m-d H-i-s");
        $updated_on = date("Y-m-d H-i-s");

        $status = $this -> db -> prepare_and_execute_query(
            "INSERT INTO users VALUES ('', ?, ?, ?, ?, ?)", 
            [$this -> sessionid, $username, $created_on, $updated_on, 1]
        );

        return ["err" => False, "data" => $username];
    }
}