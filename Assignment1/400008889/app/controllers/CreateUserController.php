<?php

include_once('../models/CreateUserModel.php');

class CreateUserController {
    private $model;
    private $required_permission;        
    
    public function __construct()
    {

        $this->model = new CreateUserModel;
        $this->required_permission = "Research Group Manager";
    }

    public function index() 
    {
        session_start();
        if (!isset($_SESSION['loggedin']) || !isset($_SESSION['email']) || !isset($_SESSION['username']))
        {
            header('Location: ../'); // go to app/ - default page
        }
        $accessLevel = $this->model->fetchPermissions($_SESSION['email']);
        if ($accessLevel != $this->required_permission) 
        {
            header('Location: ../');
        }
        // if user has necessary session variable and valid credentials
        $roles = $this->model->getRoles();
        $username_error = ''; 
        $email_error = ''; 
        $password_error = '';
        include_once('../views/createUser.php');

    }
}