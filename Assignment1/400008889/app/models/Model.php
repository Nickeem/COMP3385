<?php

class Model {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "user_management_system";

    protected $db;

    protected function connect() {
        $this->db = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
    }

}