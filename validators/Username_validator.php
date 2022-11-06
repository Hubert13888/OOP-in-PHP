<?php

class Username_validator {
    private $username = "";
    
    public function validate($content) {
        settype($content, "string");
        $content = trim($content);
        $content = htmlspecialchars($content, ENT_QUOTES);
        if(empty($content))
            return ["err" => True, "msg" => "EMPTY"];
        if(strlen($content) > 20)
            return ["err" => True, "msg" => "TOOLONG"];
        $this -> username = $content;
        return ["err" => False];
    }

    public function get_variable() {
        return $this -> username;
    }
}