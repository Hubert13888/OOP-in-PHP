<?php

include_once "DB.php";

class DB_read extends DB {
    public function read_online_users() {
        $status = $this -> prepare_and_execute_query(
            'SELECT username FROM users WHERE is_online=1', []
        );
        if($status["err"]) return $status;
        $data = $this -> get_all_data();

        return $data;
    }
    public function read_all_messages() {

        $status = $this -> prepare_and_execute_query(
            'SELECT created_on, username, content, client_id FROM (SELECT  * FROM messages ORDER BY created_on DESC LIMIT 50) X ORDER BY created_on ASC', []
        );
        if($status["err"]) return $status;

        $data = $this -> get_all_data();
        return $data;
    }
    public function is_my_sessionid_in_db() {

        $status = $this -> prepare_and_execute_query(
            'SELECT * FROM users WHERE sessionid=?', [$this -> sessionid]
        );
        $status = $this -> get_all_data();

        return ["err" => False, "data" => !empty($status["data"])];
    }
    public function get_my_data() {

        $status = $this -> prepare_and_execute_query(
            'SELECT * FROM users WHERE sessionid=?', [$this -> sessionid]
        );
        $status = $this -> get_all_data();

        return ["err" => False, "data" => $status["data"]];
    }
}