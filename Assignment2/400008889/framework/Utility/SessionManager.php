<?php
class SessionManager 
{
    public static function start()
    {
        session_start();
        ini_set('session.gc_maxlifetime', 3600); // session life set to 3600 seconds
    }

    public static function end()
    {
        session_destroy();
    }

    public static function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }
    
    public static function get($name)
    {
        return $_SESSION[$name];
    }
}