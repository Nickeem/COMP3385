<?php
include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';
abstract class Response implements ResponseInterface, AuthenticatorInterface {
    public function index() {
        echo '<h1>Hello If you see this page it\'s time for the developer to get off his ass ☺️</h1>';
    }

    abstract public function auth();
    public function isAuth() : bool
    {
        return false;
    }
}