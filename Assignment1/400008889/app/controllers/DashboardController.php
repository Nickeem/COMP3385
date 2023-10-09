<?php

require_once './models/DashboardModel.php';

class DashboardController {
    private $model;
    private $username;
    private $email;

    public function __construct()
    {
        $this->model = new DashboardModel;
    }

    public function index()
    {
        session_start();
        if (isset($_SESSION['username']) && isset($_SESSION['username'])) {
            $accessLevel = $this->model->fetchPermissions($_SESSION['email']);
            include('./views/Dashboard.php');
        }
        else {
           header('Location: ./Login/');
        }
        
        
    }
}