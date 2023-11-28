<?php


include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';
// class Test {
//     protected $val = 1;
//     protected $name = null;
//     public function __construct() {
//         $this->val = 5;
//     }

//     public function exec() {
//         echo $this->name. ' = ' .$this->val;
//     }

//     public function helper($name) {
//         $this->name = $name;
//         $this->exec();
//     }
// }
// $callback = ['Test', 'helper'];
// $class = new $callback[0](); 
// call_user_func([$class, $callback[1]], 'name', 9);

include 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\app\Models\Users.php';

$user = new \App\Users();

