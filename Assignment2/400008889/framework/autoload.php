<?php
include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/config.php';
spl_autoload_register(function($className) 
{
    if (!defined('APP_DIR')) 
    {
        define('APP_DIR', 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\app');
        define('FRAMEWORK_DIR', 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework');
        define('ROOT_DIR', 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889');
    }
    

    $framework_directories = [
        '/',
        '/AbstractClasses/',
        '/Interfaces/',

    ];

    foreach ($framework_directories as $directory) {
        $classFile = FRAMEWORK_DIR . $directory . $className . '.php';

        if (file_exists($classFile)) {
            require_once $classFile;
            return;
        }
    }

    if(file_exists(FRAMEWORK_DIR . '/' . $className . 'php' )) 
    {
        require FRAMEWORK_DIR . '/' . $className . 'php';
    }
    // trigger_error
});