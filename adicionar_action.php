<?php

require "config.php";

$name = filter_input(INPUT_POST,"name");
$email= filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);

if($name && $email){
     
}else{
    header("Location: adicionar.php");
    exit;
}