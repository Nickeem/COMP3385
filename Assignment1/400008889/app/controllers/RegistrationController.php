<?php
spl_autoload_register();
include_once '../models/RegistrationModel.php';

class RegistrationController {
    private $model;
    private $username;
    private $email;
    private $password;

    public function __construct()
    {
        $this->model = new RegistrationModel;
    }

    public function getData() 
    {
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $this->email = $_POST['email'];
    }

    

    private function isPasswordValid($password) : bool {
        // valid criteria
        $is_10_characters = false;
        $contains_upper = false;
        $contains_digit = false;
        if (strlen($password) > 9) 
        {
           $is_10_characters = true;
        }
        for ($i = 0; $i < strlen($password); $i++){
           if (ctype_upper($password[$i])) 
           {
              $contains_upper = true;
           }
           if (is_numeric($password[$i]))
           {
              $contains_digit = true;
           }
       }
        return $is_10_characters && $contains_upper && $contains_digit;
    }

    private function isEmailValid($email) : bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function userDataValidation($username, $email, $password) {
        $validation_results = array();
        $validation_results['username'] = $this->model->isUsernameUnique($username);
        $validation_results['password'] = $this->isPasswordValid($password);
        $validation_results['email'] = $this->isEmailValid($email);
        return $validation_results;
    }

    public function index() {
        session_start();
        if (isset($_SESSION['loggedin']) && isset($_SESSION['email']) && isset($_SESSION['username'])) {
            header('Location: ../');
        }
        $username_error = ''; 
        $email_error = ''; 
        $password_error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) ) 
        {
            
            
            $this->getData();
            $validation_results = $this->userDataValidation($this->username, $this->email, $this->password);
            
            if ($validation_results['username'] && $validation_results['email'] && $validation_results['password']) 
            { // everything is valid
                // create user 
                $default_permission = "Research Group Manager";
                $this->model->register($this->username, $this->email, $this->password, $default_permission);
                // go to login page
                header('Location: ../Login/') ;
            }
            else 
            {
               

                if(!$validation_results['username']) {
                    $username_error = 'Username is not unique. Choose another username.';
               }
        
               if(!$validation_results['email']) {
                    $email_error = 'Email address is invalid.';
               }
               
               if(!$validation_results['password']) {
                    $password_error = 'The password must be at least 10 characters, contain a number and uppercase character';
               }
                // show registration page with failure info
                include_once '../views/registration.php';
                
            }
        }
        else 
        {
            include_once '../views/registration.php';
        }   
        
    }


}

//$c = new RegistrationController;