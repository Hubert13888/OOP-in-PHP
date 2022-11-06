<?php

include_once "DB_operate.php";

class DB_read extends DB_operate {
    public function read_online_users() {
        $status = $this -> db -> prepare_and_execute_query(
            'SELECT username FROM users WHERE is_online=1', []
        );
        if($status["err"]) return $status;
        $data = $this -> db -> get_all_data();

        return $data;
    }
    public function read_all_messages() {

        $status = $this -> db -> prepare_and_execute_query(
            'SELECT created_on, author, content, client_id FROM messages ORDER BY created_on ASC', []
        );
        if($status["err"]) return $status;

        $data = $this -> db -> get_all_data();
        return $data;
    }
    public function is_my_sessionid_in_db() {

        $status = $this -> db -> prepare_and_execute_query(
            'SELECT * FROM users WHERE sessionid=?', [$this -> sessionid]
        );
        $status = $this -> db -> get_all_data();

        return ["err" => False, "data" => !empty($status["data"])];
    }
}