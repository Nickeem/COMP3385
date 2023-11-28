<?php
namespace App\Controllers;
include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class AppRouter extends \Abstracts\Router 
{
    public function __construct($root_uri='')
    {
        parent::__construct($root_uri);
        // $this->addRoute('/', []);
        $this->addRoute('/Login', ['\App\Controllers\Login', 'executeHelper']);
        $this->addRoute('/Dashboard', ['\App\Controllers\Dashboard', 'execute']);
        $this->addRoute('/Logout', ['\App\Controllers\Logout', 'execute']);
    }
}