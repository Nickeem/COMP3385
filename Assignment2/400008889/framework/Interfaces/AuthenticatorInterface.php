<?php
namespace Interfaces;
interface AuthenticatorInterface {
    public function auth();
    public function isAuth() : bool;
}