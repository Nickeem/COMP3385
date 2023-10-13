<?php

spl_autoload_register(function($className) 
{
    $directories = [
        './controllers/',
        '../controllers/',
        '../../controllers/'
    ];

    foreach ($directories as $directory) {
        $classFile = $directory . $className . '.php';

        if (file_exists($classFile)) {
            require_once $classFile;
            return;
        }
    }
});


$controller = new CreateUserController;
$controller->index();

?>