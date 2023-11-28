<?php
namespace App\Controllers;
include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class AppRouter extends \Abstracts\Router 
{
    public function __construct($root_uri='')
    {
        parent::__construct($root_uri);
        $this->addRoute('/', ['\App\Controllers\Login', 'executeHelper']);
        $this->addRoute('/Login', ['\App\Controllers\Login', 'executeHelper']);
        $this->addRoute('/Dashboard', ['\App\Controllers\Dashboard', 'execute']);
        $this->addRoute('/Logout', ['\App\Controllers\Logout', 'execute']);
    }

    private function errorPage() {
        $templateEngine = new \Utility\TemplateEngine(TPL_DIR);
        $templateEngine->render('Error404.tpl');
    }
    public function executeHandler() {
        try {
            $this->execute();
        }
        catch (\Exceptions\RouteException $e)
        {
            $this->errorPage();
        }
        catch (\Exception $e) {
            $this->errorPage();
        }
    }
}