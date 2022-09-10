<?php

require 'config.php';
require 'DAO/UsuarioDAOMySQL.php';
$usuarioDao = new UsuarioDAOMySQL($pdo);

$name = filter_input(INPUT_POST,"name");
$email= filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);

if($name && $email){

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE EMAIL = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){

    //prepare faz protecoes de seguranca na sql 
    $sql = $pdo->prepare("INSERT INTO usuarios (USUARIO, EMAIL) VALUES (:name,:email)");
    $sql->bindValue(':name',$name);
    $sql->bindValue(':email',$email);
    $sql->execute();

    header("Location: index.php");
} else {
    // header("Location: adicionar.php");
    echo "<p>Adicione um usuario que ainda não foi cadastrado</p>";
}

}else{
    header("Location: adicionar.php");
}