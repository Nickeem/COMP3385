<?php
namespace App\Models;

//include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class Users extends \Abstracts\Model
{
    const DEFAULT_ROLE = 'Research Group Manager';

    public function __construct()
    {
        parent::__construct('users');
    }

    
    public function createUser($username, $email, $password ) 
    {
        if (!$this->isUsernameUnique($username) && !$this->isEmailUnique($email)) {
            return false; // username and email should be unique for each user. If info passed is not unique, don't create user 
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $this->fields('username, email, password')->values([$username, $email, $hashed_password])->create();

        // check if user was created
        if (!$this->isUsernameUnique($username))
        {
            // assign role to user
            $Role = new \App\Models\Role();
            $Role->assignRole($email, self::DEFAULT_ROLE);

        }
        else
        {
            return false;
        }

    }
    
    public function authenticate($email, $password)
    {
        // encrypt password
        $encrypted_password = $this->encryptPassword($password);
        // get array of associative arrays containing fields specified
        $user = $this->select('password')->where('email', '=', $email)->limit(1)->get();
        if (count($user) < 1) 
        {
            return false;
        }
        $email_linked_password = $user[0]['password'];
        // validaate password
        return password_verify($password, $email_linked_password);

    }

    public function updateUserUsername($email, $username)
    {
        $this->set('username', $username)->where('email', '=', $email)->update();
    }

    public function deleteUser($email)
    {
        $this->where('email', '=', $email)->remove();
    }

    private function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function isUsernameUnique($username)
    {
        $user = $this->select('username')->where('username', '=', $username)->limit(1)->get();
        return count($user) < 1;
    }
    
    private function isEmailUnique($email)
    {
        $user = $this->select('email')->where('email', '=', $email)->limit(1)->get();
        return count($user) < 1 ;
    }

    public function getUsernameByEmail($email)
    {
        $user = $this->select('email, username')->where('email', '=', $email)->limit(1)->get();
        return $user[0]['username']; // username
    }
}

$user = new Users();
$user->createUser('madlad', 'madlad@gmail.com', 'password');