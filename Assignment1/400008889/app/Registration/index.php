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


// in the future this index page 'app/' will act as home

// then there will be routes accordingly
// app/registration/
// app/login/
// app/dashboard/
// app/dashboard/createUser/


// Controller
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) ) {
//     //echo 'hello';
    $controller = new RegistrationController;
    
    $controller->index();
    
//     // Redirect to a success page or perform other actions
//     // header('Location: registration_success.php');
//     exit();
// }
// ?>


 <?php //include 'views/registration.php'; ?>