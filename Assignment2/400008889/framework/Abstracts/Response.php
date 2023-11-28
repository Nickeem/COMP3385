<?php
namespace Abstracts;
//include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

abstract class Response implements \Interfaces\ResponseInterface, \Interfaces\AuthenticatorInterface, \Interfaces\SessionInterface
{
    use \Utility\SessionManager;
    protected $session;
    protected $isAuth;
    protected $request;

    abstract public function execute();
    public function executeHelper($request) // sets request before executing
    {
        $this->request = $request;
        $this->execute();
    }

    abstract public function auth();
    public function isAuth() : bool
    {
        return false;
    }
}