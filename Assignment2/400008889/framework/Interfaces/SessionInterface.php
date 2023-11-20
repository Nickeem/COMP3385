<?php
namespace Interfaces;
interface SessionInterface {
    public function session_set($name, $value);
    public function session_get($name);
    public function startSession();
    public function endSession();
}