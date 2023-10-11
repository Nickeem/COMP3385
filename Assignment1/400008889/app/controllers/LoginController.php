<?php
require_once '../models/LoginModel.php';

class LoginController {
    private $email;
    private $password;
    private $model;

    public function __construct()
    {
        $this->model = new LoginModel;   
    }

    public function getData() 
    {
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
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
		    $userData = $this->model->fetchUserData($this->email, $this->password);
		    $_SESSION['username'] = $userData['username'];
		    $_SESSION['email'] = $userData['email'];
            // start session and get some session info
            header('Location: ../');

        }
        else 
        {
            $isLoginValid = false;
            // return to login page and show error
            include_once '../views/login.php';
            
        }
    }

    public function index()
    {
        session_start();
        if (isset($_SESSION['loggedin']) && isset($_SESSION['email']) && isset($_SESSION['username'])) {
            header('Location: ../');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password']) ) 
        {
            $this->getData();
            $this->loginUser();

        }
        else
        {
            include_once '../views/login.php';
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