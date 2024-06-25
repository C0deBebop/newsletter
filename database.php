<?php

class Database {
    public $host;
    public $user;
    public $password;
    public $db;

    function __construct($host, $user, $password, $db){
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }
}

?>