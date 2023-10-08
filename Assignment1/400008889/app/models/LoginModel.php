<?php

spl_autoload_register();

class LoginModel extends Model {
    public function __construct()
    {
        $this->connect();
    }

    public function authenticateUser($email, $password) : bool
    {
        $isPasswordValid = false;
        $stmt = $this->db->prepare("SELECT password FROM users WHERE email=?");
        $stmt->execute([$email]);
        $email_linked_password = $stmt->fetchColumn();
        if ($email_linked_password !== false)
        {
            $isPasswordValid = password_verify($password, $email_linked_password);
        }
        return $isPasswordValid;
    }

    public function fetchUsername($email, $password) 
    {
        $username = "";
        if($this->authenticateUser($email, $password))
        {
            $stmt = $this->db->prepare("SELECT username FROM users WHERE email=?");
            $stmt->execute([$email]);
            $username = $stmt->fetchColumn();
        }
        return $username;
    }

}