<?php

namespace App;

class AppErrorHandler extends \Abstracts\RuntimeErrorHandler {
    public function __construct() {
        parent::__construct(E_ALL);
    }
}