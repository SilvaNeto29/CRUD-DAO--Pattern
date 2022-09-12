<?php

require 'config.php';
require 'DAO/UsuarioDAOMySQL.php';
$usuarioDao = new UsuarioDAOMySQL($pdo);

$id = filter_input(INPUT_POST,"id");
$name = filter_input(INPUT_POST,"name");
$email= filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);

if($name && $email && $id){

    $usuario = new Usuario;
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);

    $usuarioDao->update($usuario);

    header('Location: index.php');
    exit;
} else {
    header('Location: editar.php?id='.$id); 
    exit;
}