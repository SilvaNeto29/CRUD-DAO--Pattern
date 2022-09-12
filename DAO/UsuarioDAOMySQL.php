<?php

require_once 'models/Usuarios.php';

class UsuarioDAOMySQL implements UsuarioDAO{

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function add(Usuario $u){
        $sql = $this->pdo->prepare("INSERT INTO usuarios (EMAIL, USUARIO) VALUES (:email, :name)");
        $sql->bindValue(':name', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
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
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE ID = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['ID']);
            $u->setNome($data['USUARIO']);
            $u->setEmail($data['EMAIL']);
            return $u;
        } else {return false;}
    }

    public function findByEmail($email){
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE EMAIL = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['ID']);
            $u->setNome($data['USUARIO']);
            $u->setEmail($data['EMAIL']);
            return $u;
        } else {return false;}
    }

    public function update(Usuario $u){
        $sql = $this->pdo->prepare("UPDATE usuarios SET USUARIO = :name, EMAIL = :email WHERE ID = :id");
        $sql->bindValue(':id', $u->getId());
        $sql->bindValue(':name', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        return true;
    }

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE ID = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}