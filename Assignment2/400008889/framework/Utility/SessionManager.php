<?php
namespace Utility;
trait SessionManager 
{
    public static function startSession()
    {
        session_start();
        ini_set('session.gc_maxlifetime', 3600); // session life set to 3600 seconds
    }

    public static function endSession()
    {
        session_destroy();
    }

    public static function session_set($name, $value)
    {
        session_start();
        $_SESSION[$name] = $value;
    }
    
    public static function session_get($name)
    {
        session_start();
        if (!isset($_SESSION[$name]))
        {
            throw new \Exceptions\SessionManagerException("Session variable '$name' was not set");
        }
        return $_SESSION[$name];
    }
}