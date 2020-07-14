<?php

spl_autoload_register ('myAutoloader');

function myAutoloader($classname) {

        $path = '\/classes/';
        $extention = '.class.php';
        $full_path = $path . $classname . $extention;
        
        if(!file_exists($full_path)) {
             return  false; 
        }
        require_once $full_path;
}

