<?php 
include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

class Response {
    public function index() {
        //echo 'hello';
        if (isset($_SERVER['REQUEST_METHOD']))
        {
            echo $_SERVER['REQUEST_METHOD'];
        }
        
    }
}


class AppRouter extends Router {

}

class User extends Model {
    public function __construct()
    {
        $this->table = "users";
        parent::__construct($this->table);
    }
}



$r = new AppRouter();
// $res = new Response();

$r->removeRoute('/home');
// $r->handle();
// $r->addRoute('/index', array($res, 'index'));
// $r->route('/index');

// $user = new User();
// var_dump($user->fields('username, email, password')->values(['smino', 'smino@mail.com', 'password']));

// echo $_SERVER["REQUEST_URI"];
// $generator = new FormGenerator();
// $generator->addAttribute("action", "./");
// $generator->addAttribute("name", "my-form");
// $generator->addField('email', 'user-email', 'Enter Email', ['class' => 'email-css']);
// echo $generator->generateForm();



