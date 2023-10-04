<?php

class Model {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "user_management_system";

    protected function connect() : PDO {
        $db = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
        return $db;
    }
}