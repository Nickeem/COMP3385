<?php
spl_autoload_register();
include_once './controllers/RegistrationController.php';
// in the future this index page 'app/' will act as home

// then there will be routes accordingly
// app/registration/
// app/login/
// app/dashboard/
// app/dashboard/createUser/


// Controller
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) ) {
    //echo 'hello';
    $controller = new RegistrationController;
    
    $controller->index();
    
    // Redirect to a success page or perform other actions
    // header('Location: registration_success.php');
    exit();
}
?>


<?php include 'views/registration.php'; ?>