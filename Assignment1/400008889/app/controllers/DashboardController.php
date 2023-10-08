<?php

require_once '../models/DashboardModel.php';

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
        $accessLevel = $this->model->fetchPermissions($_SESSION['email']);
        
    }
}