<?php

require 'config.php';
require 'DAO/UsuarioDAOMySQL.php';
$usuarioDao = new UsuarioDAOMySQL($pdo);

$name = filter_input(INPUT_POST,"name");
$email= filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);

if($name && $email){

    if($usuarioDao->findByEmail($email) === false){

        $newUser = new Usuario();
        $newUser->setNome($name);
        $newUser->setEmail($email);

        $usuarioDao->add($newUser);

        header("Location: index.php");
        exit;
    } else {
        header("Location: adicionar.php");
        echo 'Houve um erro';
        exit;
    }
} else {
    header("Location: adicionar.php");
    exit;
}