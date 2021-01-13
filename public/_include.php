<?php
 session_start();


 function dumpAndDie($var)
 {
     var_dump($var);
     die();
 }

 require 'class/Form.php';
 require 'class/Validator.php';
