<?php 

class AException extends Exception {
}

function fun() {
    throw new AException("You have an error");
}

function A() {
    fun();
}


echo $_SERVER['SCRIPT_NAME'];