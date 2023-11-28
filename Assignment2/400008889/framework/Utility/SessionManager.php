<?php
namespace Utility;
trait SessionManager 
{
    public function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            //ini_set('session.gc_maxlifetime', 3600); // session life set to 3600 seconds
        }      
    }

    public function endSession()
    {
        $this->startSession();
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
        session_regenerate_id(true);
    }

    public function session_set($name, $value)
    {
        $this->startSession();
        $_SESSION[$name] = $value;
    }
    
    public function session_get($name)
    {
        $this->startSession();
        if (!isset($_SESSION[$name]))
        {
            throw new \Exceptions\SessionManagerException("Session variable '$name' was not set");
        }
        return $_SESSION[$name];
    }
}