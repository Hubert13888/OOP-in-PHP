<?php

include_once "DB_operate.php";

class DB_update extends DB_operate {
    public function switch_me_online() {

        $status = $this -> db -> prepare_and_execute_query(
            'UPDATE users SET is_online=1 WHERE sessionid=?', [$this -> sessionid]
        );
        return $status;
    }
    
    public function i_am_online() {

        $updated_on = date("Y-m-d H-i-s");

        $status = $this -> db -> prepare_and_execute_query(
            'UPDATE users SET is_online=1, updated_on=? WHERE sessionid=?', [$updated_on, $this -> sessionid]
        );
        return ["err" => False];
    }
    public function update_idles() {

        $status = $this -> db -> prepare_and_execute_query(
            'UPDATE users SET is_online=0 WHERE NOW() - updated_on > 8', []
        );
        return ["err" => False];
    }
}