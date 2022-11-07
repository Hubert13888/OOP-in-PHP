<?php

include_once "DB.php";

class DB_delete extends DB {
    public function delete_offlines() {

        $status = $this -> prepare_and_execute_query(
            'DELETE FROM users WHERE NOW() - updated_on > 60', []
        );
        return $status;
    }
}