<?php 
require 'config.php';
require 'DAO/UsuarioDAOMySQL.php';
$usuarioDao = new UsuarioDAOMySQL($pdo);

$id = filter_input(INPUT_GET, 'id');
if($id){

    $usuarioDao->delete($id);
} 

header('Location: index.php');
exit;

