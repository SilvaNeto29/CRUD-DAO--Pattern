<?php 
require 'config.php';

$id = filter_input(INPUT_GET, 'id');
if($id){

    $sql = $pdo->prepare("SELECT * FROM 
                            usuarios 
                        WHERE
                            ID = :id");

    $sql->bindValue(':id', $id);
    $sql->execute();
    
    if($sql->rowCount() > 0){

        $info = $sql->fetch(PDO::FETCH_ASSOC);
    }

} else {
    header('Location: index.php');
}

?>
<h1>Editar Clientes</h1>
<form method="POST" action="editar_action.php">

    <input type="hidden" name="id" value="<?=$info['ID']?>" />
    <label>
        Nome:<br />
        <input type="text" name="name" value="<?=$info['USUARIO']?>">
    </label><br /><br />

    <label>
        Email:<br />
        <input type="email" name="email" value="<?=$info['EMAIL']?>">
    </label><br /><br />

    <label>
        Editar:<br />
        <input type="submit" value="Editar">
    </label><br /><br />
</form>