<?php
# include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\config/config.php';
spl_autoload_register(function($className) 
{
    $className = str_replace('\\', '/', $className);
    if (!defined('APP_DIR')) 
    {
        define('APP_DIR', 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\app');
        define('FRAMEWORK_DIR', 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework');
        define('ROOT_DIR', 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889');
    }
    

    $framework_directories = [
        '/',
        '/Abstracts/',
        '/Interfaces/',
        '/Exceptions/',
        '/Utility/',

    ];

    $app_directories = [
        '/'
        ,'/Controllers/'
        ,'/Models/'
        ,'/View/'

    ];

    if(file_exists(FRAMEWORK_DIR . '/' . $className . 'php' )) 
    {
        require FRAMEWORK_DIR . '/' . $className . 'php';
    }

    foreach ($framework_directories as $directory) {
        $classFile = FRAMEWORK_DIR . $directory . $className . '.php';

        if (file_exists($classFile)) {
            require_once $classFile;
            return;
        }
    }

    foreach ($app_directories as $directory) {
        $classFile = APP_DIR . $directory . $className . '.php';

        if (file_exists($classFile)) {
            require_once $classFile;
            return;
        }
    }
    
    foreach ($app_directories as $directory) {
        $classFile = ROOT_DIR . $directory . $className . '.php';

        if (file_exists($classFile)) {
            require_once $classFile;
            return;
        }
    }


    
    // trigger_error
});