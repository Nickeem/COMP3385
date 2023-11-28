<?php 
include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';


$errorHandler = new \App\AppErrorHandler();
$router = new \App\Controllers\AppRouter(APP_URI);
$router->execute();
















// // class Response {
// //     public function index() {
// //         //echo 'hello';
// //         if (isset($_SERVER['REQUEST_METHOD']))
// //         {
// //             echo $_SERVER['REQUEST_METHOD'];
// //         }
        
// //     }
// // }


// class AppRouter extends \Abstracts\Router {

// }

// class User extends \Abstracts\Model {
//     public function __construct()
//     {
//         $this->table = "users";
//         parent::__construct($this->table);
//     }
// }


// $raw_path = $_SERVER['REQUEST_URI']; // doing it this way lets the function not be rule dependent - my own assumption.

// // clean raw_path
// // Remove trailing slashes
// $cleaned_path = trim($raw_path,'/');
// // Remove query parameters
// $urlParts = explode('?', $cleaned_path);   
// $path = $urlParts[0];
// // add slash to the start of slash to act as root
// $path = '/' . $path;
// // Remove redundant slashes
// $path = preg_replace('#/{2,}#', '/', $path);

// $search = '/'.preg_quote(APP_URI, '/').'/';
// $path = preg_replace($search, '', $path, 1); 
// echo "$path<br>";
// if ($path == '')
// {
//     echo "Path is equal ''<br>";
// }
// echo var_dump($_REQUEST);

// // $r = new AppRouter();
// // // $res = new Response();

// // $r->removeRoute('/home');
// // $r->handle();
// // $r->addRoute('/index', array($res, 'index'));
// // $r->route('/index');

// // $user = new User();
// // var_dump($user->fields('username, email, password')->values(['smino', 'smino@mail.com', 'password']));

// // echo $_SERVER["REQUEST_URI"];
// // $generator = new FormGenerator();
// // $generator->addAttribute("action", "./");
// // $generator->addAttribute("name", "my-form");
// // $generator->addField('email', 'user-email', 'Enter Email', ['class' => 'email-css']);
// // echo $generator->generateForm();



