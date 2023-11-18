<?php
namespace Interfaces;
include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';


interface RouterInterface {
    public function addRoute($path, $handler);
    public function removeRoute($route);
    public function route($path);
    public function handle();  
}