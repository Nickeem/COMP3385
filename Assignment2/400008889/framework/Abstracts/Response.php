<?php
namespace Abstracts;
include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

abstract class Response implements \Interfaces\ResponseInterface, \Interfaces\AuthenticatorInterface 
{
    protected $session;
    abstract public function execute();

    abstract public function auth();
    public function isAuth() : bool
    {
        return false;
    }
}