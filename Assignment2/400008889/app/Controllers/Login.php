<?php

namespace App\Controllers;

include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class Login extends \Abstracts\Response 
{
    const LOGIN_ERROR = 'Email or password is incorrect';

    public function auth()
    {
        $this->isAuth = true;
    }

    public function execute()
    {
        // Check if request was set
        if (!$this->requestExists())
        {
            throw new \Exception('No request to process');  // TODO: CHANGE THIS 
        }
        
        try {
            $user = $this->session_get('email');          
        }
        catch (\Exceptions\SessionManagerException $e) 
        {
            $user = '';
        }
        // echo $_SESSION;exit();
        if ($user == '') 
        {
            if ($this->request['method'] == 'GET')
            {
                $this->handleGet();
            }
            else if ($this->request['method'] == 'POST')
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
            // $x = new AppRouter();$x->route('/Dashboard'); //- NO url would still be ./Login/
            header('Location: '. APP_URI . '/Dashboard');
            exit();
        }
    }

    public function requestExists()
    {
        return !($this->request == NULL);
    }
    public function handleGet()
    {
        $login_error = '';
        $this->loadPage();
    }

    public function handlePost()
    {
        $params = $this->request['params'];
        // get credentials
        $email = $params['email'];
        $password = $params['password'];

        $User = new \App\Models\Users();
        $isAuthenticated = $User->authenticate($email, $password);
    
        if ($isAuthenticated) 
        {
            // log in
            $username = $User->getUsernamebyEmail($email);
            $this->session_set('username', $username);
            $this->session_set('loggedIn', true);
            $this->session_set('email', $email);
            header('Location: ' . APP_URI . '/Dashboard');
        }
        else
        {
            $this->loadPage(self::LOGIN_ERROR);
        }
        

    }

    public function loadPage($login_error='')
    {
        $templateEngine = new \Utility\TemplateEngine(TPL_DIR);
        $formGenerator = new \Utility\FormGenerator();
        $formGenerator->addAttribute('action','./Login');
        $formGenerator->addAttribute('method','POST');
        $formGenerator->addField('email', 'email', 'Enter Email Address', isRequired: true);
        $formGenerator->addField('password', 'password', 'Enter Password', isRequired: true);
        $form = $formGenerator->generateForm();

        $templateEngine->assign('CSS_DIR', CSS_DIR);
        $templateEngine->assign('form', $form);
        $templateEngine->assign('login_error', $login_error);
        $templateEngine->render('login.tpl');
    }


} 