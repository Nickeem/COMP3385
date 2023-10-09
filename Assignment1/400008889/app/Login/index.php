<?php
spl_autoload_register();
include_once '../controllers/LoginController.php';
    $controller = new LoginController;   
    $controller->index();
// ?>