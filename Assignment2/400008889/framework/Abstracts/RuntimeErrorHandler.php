<?php
namespace Abstracts;
abstract class RuntimeErrorHandler {
    protected $errorLevel;

    public function __construct($errorLevel) {
        $this->errorLevel = $errorLevel;
        $this->register();
    }
    public function register() {
        set_error_handler([$this, 'handleError']);
        set_exception_handler([$this, 'handleException']);
        register_shutdown_function([$this, 'handleShutdown']);
    }

    public static function handleError($errno, $errstr, $errfile, $errline) {
        // Handle non-fatal errors (warnings, notices, etc.)
        error_log("Error: [$errno] $errstr in $errfile on line $errline");
        // You can customize the error handling logic here
    }

    public static function handleException($exception) {
        // Handle uncaught exceptions
        error_log("Uncaught Exception: " . $exception->getMessage());
        // You can customize the exception handling logic here
    }

    public static function handleShutdown() {
        $error = error_get_last();
        if ($error !== null) {
            // Handle fatal errors
            error_log("Fatal Error: [{$error['type']}] {$error['message']} in {$error['file']} on line {$error['line']}");
            // You can customize the shutdown handling logic here
        }
    }

    public function setErrorLevel($errorLevel) 
    {
        $this->errorLevel = $errorLevel;
    }

    public function __destruct() {
        restore_error_handler();
        restore_exception_handler();
    }
}