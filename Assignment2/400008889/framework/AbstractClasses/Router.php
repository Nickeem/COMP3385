
<?php 
include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

abstract class Router implements RouterInterface {
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
            throw new Exception("Route '{$path} already exists'");
        }

        // handler should either be a function or array containing class and method. In any case it should be callable
        if (!is_callable($handler))
        {
            throw new Exception("handler passed to 'addRoute' is invalid"); 
        }
        
        $this->routes[$path] = $handler;
    } // addRoute

    public function route($path) 
    {
        if(!isset($this->routes[$path])) 
        {
            // throw exception
            throw new Exception("No route with path: '$path'");
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
            return;
        }
        unset($this->routes[$path]);
        
    }
    
    public function execute()
    {
        
    }

    public function handle() 
    {
        // $request = $_REQUEST;
        // $path = $_REQUEST['path'];
        // $this->route($path);

        $raw_path = $_SERVER['REQUEST_URI']; // doing it this way lets the function not be rule dependent - my own assumption.
        $search = '/'.preg_quote(APP_URI, '/').'/';
        $path = preg_replace($search, '', $raw_path, 1); // remove first occurence of
        $this->route($path);
    }

}