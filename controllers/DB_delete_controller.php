<?php

include_once "DB_operate.php";

class DB_delete extends DB_operate {
    public function delete_offlines() {

        $status = $this -> db -> prepare_and_execute_query(
            'DELETE FROM users WHERE NOW() - updated_on > 60', []
        );
        return $status;
    }
}