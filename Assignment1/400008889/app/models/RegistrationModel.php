<?php

spl_autoload_register();

class RegistrationModel extends Model {

     //private $db; 

     public function __construct()
     {
        $this->connect(); 
     } // constructor

     public function register($username, $password, $email) 
     {
        // for now assume everything that is passed is validated
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users(username, password, email) VALUES (?, ?, ?) ");
        $stmt->execute([$username, $hashed_password, $email]); 
        
        return $this->isUsernameUnique($username); // this would determine if the user was created successfully

     } // register

     public function isUsernameUnique($username) : bool 
     {
         $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE username=?");
         $stmt->execute([$username]);
         if ($stmt->fetchColumn() > 0)
         {
            return false;
         }
         return true;
     }

     

}

$model = new RegistrationModel;
$username = "nickeem999";
$password = "ABCDEFGHI0";
$email = "nickeem.payne@n.c";


?>