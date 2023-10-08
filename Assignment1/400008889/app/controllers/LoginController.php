<?php
require_once '../models/LoginModel.php';

class LoginController {
    private $email;
    private $password;
    private $model;

    public function __construct()
    {
        $this->model = new LoginModel;   
        $this->password = "password";//$_POST['password'];
        $this->email = "nickeem.payne@gmail.com";//$_POST['email'];
    }

    public function isLoginValid() : bool
    {
        return $this->model->authenticateUser($this->email, $this->password);
    }

    public function loginUser() 
    {
        if($this->isLoginValid())
        {

            session_regenerate_id();
		    $_SESSION['loggedin'] = TRUE;
		    $_SESSION['username'] = $this->model->fetchUsername($this->email, $this->password);
            // start session and get some session info
            echo $_SESSION['username'];
        }
        else 
        {
            $isLoginValid = false;
            // return to login page and show error
            include_once './views/registration.php';
            
        }
    }
}
/*
$controller = new LoginController;

if ($controller->isLoginValid())
{
    $controller->loginUser();
}
else
{
    echo 'incorrect credentials';
}*/
echo __DIR__;