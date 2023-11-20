<?php
include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class AppRouter extends Abstracts\Router 
{
    public function __construct()
    {
        parent::__construct();
        $this->addRoute('/', []);
        $this->addRoute('/Login/', []);
        $this->addRoute('/Dashboard/', []);
        $this->addRoute('/Logout/', []);
    }
}