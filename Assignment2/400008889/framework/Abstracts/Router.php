<?php 
namespace Abstracts;
include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

abstract class Router implements \Interfaces\RouterInterface {
    // attributes
    protected $routes;

    public function __construct()
    {
        $routes = array();
    }

    public function addRoute($path, $handler, $method='get') 
    {
        if(isset($this->routes[$path])) 
        {
            throw new \Exceptions\RouteException("Route '{$path}' already exists");
        }

        // handler should either be a function or array containing class and method. In any case it should be callable
        if (!is_callable($handler))
        {
            throw new \Exceptions\RouteException("handler passed to 'addRoute' is invalid, handler must be callable"); 
        }
        
        $this->routes[$path] = $handler;
    } // addRoute

    public function route($path) 
    {
        if(!isset($this->routes[$path])) 
        {
            // throw exception
            throw new \Exceptions\RouteException("No route with path: '$path'");
        }
        // be aware of paths like /api/user/token - may want to unpack
        $callback = $this->routes[$path];
        // callback can be function or array that includes
        // $params = [5, 3]; // Parameters
        call_user_func($callback);
    } // route

    public function removeRoute($path)
    {
        if(!isset($this->routes[$path])) 
        {
            $message = "'$path' does not exist and was not removed.";
            trigger_error($message, E_USER_WARNING);

        }
        else 
        {
            unset($this->routes[$path]);
        }
        
        
    }

    public function handle() 
    {
        // $request = $_REQUEST;
        // $path = $_REQUEST['path'];
        // $this->route($path);

        $raw_path = $_SERVER['REQUEST_URI']; // doing it this way lets the function not be rule dependent - my own assumption.

        // clean raw_path
        // Remove trailing slashes
        $cleaned_path = trim($raw_path,'/');
        // Remove query parameters
        $urlParts = explode('?', $cleaned_path);   
        $path = $urlParts[0];
        // add slash to the start of slash to act as root
        $path = '/' . $path;
        // Remove redundant slashes
        $path = preg_replace('#/{2,}#', '/', $path);

        $search = '/'.preg_quote(APP_URI, '/').'/';
        $path = preg_replace($search, '', $path, 1); 
        $this->route($path);
    }

}