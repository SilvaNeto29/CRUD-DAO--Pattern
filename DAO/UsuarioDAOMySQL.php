<?php

require_once 'models/Usuarios.php';

class UsuarioDAOMySQL implements UsuarioDAO{

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function add(Usuario $u){

    }

    public function findAll(){
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");
            if($sql->rowCount() > 0){
                $data = $sql->fetchAll();

                foreach($data as $item){
                    $u = new Usuario();
                    $u->setId($item['ID']);
                    $u->setNome($item['USUARIO']);
                    $u->setEmail($item['EMAIL']);

                    $array[] = $u;

                }
            }


        return $array;
    }

    public function findById($id){

    }

    public function update(Usuario $u){

    }

    public function delete($id){

    }
}