<?php

namespace App\Controllers;

include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class Logout extends \Abstracts\Response {

    public function execute() {
        $this->endSession();
        header('Location: ' . APP_URI . '/Login');
    }

    public function auth() {
        return true;
    }

}