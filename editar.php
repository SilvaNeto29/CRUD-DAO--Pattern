<?php 
require 'config.php';
require 'DAO/UsuarioDAOMySQL.php';
$usuarioDao = new UsuarioDAOMySQL($pdo);

$usuario = false;

$id = filter_input(INPUT_GET, 'id');
    if($id){

        $usuario = $usuarioDao->findById($id);

    }

    if($usuario === false){
        header("Location: index.php");
        exit;
    }

?>
<h1>Editar Clientes</h1>
<form method="POST" action="editar_action.php">

    <input type="hidden" name="id" value="<?=$usuario->getId()?>" />
    <label>
        Nome:<br />
        <input type="text" name="name" value="<?=$usuario->getNome()?>">
    </label><br /><br />

    <label>
        Email:<br />
        <input type="email" name="email" value="<?=$usuario->getEmail()?>">
    </label><br /><br />

    <label>
        Editar:<br />
        <input type="submit" value="Editar">
    </label><br /><br />
</form>