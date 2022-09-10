<?php

    require 'config.php';
    require 'DAO/UsuarioDAOMySQL.php';


    $usuarioDao = new UsuarioDAOMySQL($pdo);
    $lista = $usuarioDao->findAll();
    print_r($lista);
    ?>


<label><a href="adicionar.php">Adicionar Usuario</a></label>
<br />
<table border="1" width='100%'>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
    <tr>
        <td><?=$usuario->getId()?></td>
        <td><?=$usuario->getNome()?></td>
        <td><?=$usuario->getEmail()?></td>
        <td>
            <a href="editar.php?id=<?=$usuario->getId()?>">[ Editar ]</a>
            <a href="excluir.php?id=<?=$usuario->getId()?>" onclick="return confirm('Tem certeza que quer excluir?')">[ Excluir ]</a>
        </td>
    </tr>

    <?php endforeach ?>
</table>