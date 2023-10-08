<?php
spl_autoload_register();
include_once './models/RegistrationModel.php';

class RegistrationController {
    private $model;
    private $username;
    private $email;
    private $password;

    public function __construct()
    {
        $this->model = new RegistrationModel;

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

    public function userDataValidation($username, $password, $email) {
        $validation_results = array();
        $validation_results['username'] = $this->model->isUsernameUnique($username);
        $validation_results['password'] = $this->isPasswordValid($password);
        $validation_results['email'] = $this->isEmailValid($email);
        return $validation_results;
    }

    public function index() {
        $validation_results = $this->userDataValidation($this->username, $this->email, $this->password);
        if ($validation_results['username'] && $validation_results['email'] && $validation_results['password']) 
        { // everything is valid
            // create user 
            // go to login page
            echo 'go to login page';
        }
        else {
            // show registration page with failure info
            $validation_results;
            include_once './views/registration.php';
        }
        
    }


}

//$c = new RegistrationController;