<?php

use Utility\Request;

include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class LoginController extends \Abstracts\Response 
{
    use Utility\SessionManager;

    public function auth()
    {
        $this->isAuth = true;
    }

    public function execute()
    {
        $request = new \Utility\Request();
        try {
            $user = $this->session_get('user');          
        }
        catch (\Exceptions\SessionManagerException $e) 
        {
            $user = '';
        }

        if (!$user) 
        {
            if ($request->getMethod() == 'GET')
            {
                $this->handleGet();
            }
            else if ($request->getMethod() == 'POST')
            {
                $this->handlePost();
            }
            else {
                
            }
            // user is not logged in so proceed with login page
            
        }
        else
        {
            // go to dashboard
            // AppRouter()->route('/Dashboard/'); - NO url would still be ./Login/
            header('Location: /Dashboard/');
            exit();
        }
    }

    public function handleGet()
    {

    }

    public function handlePost()
    {

    }

} 