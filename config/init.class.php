<?php
require_once 'config.class.php';

spl_autoload_register ('myAutoloader');

function myAutoloader($classname) {
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $path = 'lib/';
        $extention = '.class.php';
        require_once $path . $classname . $extention; 
}