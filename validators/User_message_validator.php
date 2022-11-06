<?php

class User_message_validator {
    private $user_message = "";
    
    public function validate($content) {
        settype($content, "string");
        $content = trim($content);
        $content = htmlspecialchars($content, ENT_QUOTES);
        if(empty($content))
            return ["err" => True, "msg" => "EMPTY"];
        if(strlen($content) > 120)
            return ["err" => True, "msg" => "TOOLONG"];
        $this -> user_message = $content;
        return ["err" => False];
    }

    public function get_variable() {
        return $this -> user_message;
    }
}