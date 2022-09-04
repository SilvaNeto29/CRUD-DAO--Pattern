<?php

    require 'config.php';
        $lista = [];
        $sql = $pdo->query("SELECT * FROM usuarios");
        if ($sql->rowCount() > 0){
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
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
    <?php foreach($lista as $listas): ?>
    <tr>
        <td><?=$listas['ID']?></td>
        <td><?=$listas['USUARIO']?></td>
        <td><?=$listas['EMAIL']?></td>
        <td>
            <a href="editar.php?id=<?=$listas['ID']?>">[ Editar ]</a>
            <a href="excluir.php?id=<?=$listas['ID']?>" onclick="return confirm('Tem certeza que quer excluir?')">[ Excluir ]</a>
        </td>
    </tr>

    <?php endforeach ?>
</table>