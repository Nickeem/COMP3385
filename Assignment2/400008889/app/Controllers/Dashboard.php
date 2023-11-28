<?php
namespace App\Controllers;

include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class Dashboard extends \Abstracts\Response
{
    const REQUIRED_PERMISSION = 'Research Group Manager';
    protected $username;
    protected $email;

    public function auth()
    {
        $loggedIn = false;
        try 
        {
            $loggedIn = $this->session_get('loggedIn');
        }
        catch (\Exceptions\SessionManagerException $e) {
            $loggedIn = false;
        }
        
        if (!$loggedIn)
        {
            return false;
        }

        try 
        {
            $this->username = $this->session_get('username');
            $this->email = $this->session_get('email');
        }
        catch (\Exceptions\SessionManagerException $e) 
        {   
            return false;
        }
        return true;
    }

    public function execute()
    {
        $isAuth = $this->auth();
        // if not authorized go to login page
        if (!$isAuth)
        {
            header('Location:'. APP_URI.'/Login');
            exit();
        }
        // go to dashboard
        $this->loadSessionVariables();
        $Role = new \App\Models\Role();
        $CreateNewStudy_allowed = $Role->hasPermission($this->username, "Research Group Manager") || $Role->hasPermission($this->username, "Research Study Manager");
        $ViewAllStudies_allowed = $Role->hasPermission($this->username, "Research Group Manager") || $Role->hasPermission($this->username, "Research Study Manager") || $Role->hasPermission($this->username, "Researcher");
        $DeleteNewStudy_allowed = $Role->hasPermission($this->username, "Research Group Manager") || $Role->hasPermission($this->username, "Research Study Manager");
        $CreateNewResearcher_allowed = $Role->hasPermission($this->username, "Research Group Manager");
        $this->loadPage($CreateNewStudy_allowed, $ViewAllStudies_allowed, $DeleteNewStudy_allowed, $CreateNewResearcher_allowed);

    }

    private function loadSessionVariables()
    {
        $this->username = $this->session_get('username');
        $this->email = $this->session_get('email');
    }

    public function loadPage($CreateNewStudy_allowed, $ViewAllStudies_allowed, $DeleteNewStudy_allowed, $CreateNewResearcher_allowed)
    {
        $templateEngine = new \Utility\TemplateEngine(TPL_DIR);

        $templateEngine->assign('CSS_DIR', CSS_DIR);
        $templateEngine->assign('username', $this->username);
        $templateEngine->assign('email', $this->email);
        $templateEngine->assign('CreateNewStudy_allowed', $CreateNewStudy_allowed);
        $templateEngine->assign('ViewAllStudies_allowed', $ViewAllStudies_allowed);
        $templateEngine->assign('DeleteNewStudy_allowed', $DeleteNewStudy_allowed);
        $templateEngine->assign('CreateNewResearcher_allowed', $CreateNewResearcher_allowed);
        $templateEngine->render('Dashboard.tpl');
    }
}

$d = new \App\Models\Role();