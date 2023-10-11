<?php
    spl_autoload_register();
class CreateUserModel extends Model
{
    public function __construct()
    {
       $this->connect(); 
    } // constructor

    public function register($username, $email, $password, $permission) 
    {
       // for now assume everything that is passed is validated
       $hashed_password = password_hash($password, PASSWORD_DEFAULT);
       $stmt = $this->db->prepare("INSERT INTO users(username, password, email) VALUES (?, ?, ?) ");
       $stmt->execute([$username, $hashed_password, $email]); 


       
       $stmt = $this->db->prepare("INSERT INTO user_access_levels(email, 	AccessLevel) VALUES (?, ?) ");
       $stmt->execute([$email, $permission]); 
       
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

    public function fetchPermissions($email) 
    {
        $stmt = $this->db->prepare("SELECT AccessLevel FROM user_access_levels WHERE email=?");
        $stmt->execute([$email]);
        $accessLevel = $stmt->fetchColumn();
        return $accessLevel;
    }

    public function getRoles()
    {
        $stmt = $this->db->prepare("SELECT role FROM roles");
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    }

}