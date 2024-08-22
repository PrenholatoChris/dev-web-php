<?php
    require_once "conexao.inc.php";
    require_once "../classes/usuario.inc.php";

    class UsuarioDAO
    {

        private $conn;

        function __construct(){
            $conexao = new Conexao();
            $this->conn = $conexao->getConecxao();
        }
        function cadastrar(Usuario $usuario)
        {
            $sql = $this->conn->prepare("INSERT INTO users (nome, email, password, is_admin) VALUES (:nome, :email, :password, 0)");
            $sql->bindValue(":nome", $usuario->nome);
            $sql->bindValue(":email", $usuario->email);
            $sql->bindValue(":password", $usuario->senha);
            // $sql->bindValue(":is_admin", "C");
            $sql->execute();
        }

        function authenticar($email, $senha)
        {
            $sql = $this->conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":password", $senha);
            $sql->execute();
            
            $user = null;
            if($sql->rowCount() == 1){
                $userTemp = $sql->fetch(PDO::FETCH_OBJ);
                $user = new Usuario();
                $user->setUsuario($userTemp->username, $userTemp->email, $userTemp->password, "27999999999", $userTemp->is_admin);
            }
            return $user;
        }

        function getAll()
        {
            $sql = $this->conn->prepare("SELECT * FROM users");
            $sql->execute();

            $users = array();
            while( $us = $sql->fetch(PDO::FETCH_OBJ) ){
                $user = new Usuario();
                $user->setUsuario($us->nome, $us->email, $us->senha, $us->tel, $us->is_admin);
                $users[] = $user;
            }

            return $users;
        }

        function deletar($id)
        {
            $sql = $this->conn->prepare("DELETE FROM users WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
        }

        function getById($id){
            $sql = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            $userTemp = $sql->fetch(PDO::FETCH_OBJ);
            $user = new Usuario();
            return $user->setUsuario($userTemp->nome, $userTemp->email, $userTemp->senha, $user->tel, $userTemp->is_admin);
        }

        function atualizar(Usuario $usuario){
            $sql = $this->conn->prepare("UPDATE users SET nome = :nome, email = :email, password = :password, is_admin = :is_admin WHERE id = :id");
            $sql->bindValue(":nome", $usuario->nome);
            $sql->bindValue(":email", $usuario->email);
            $sql->bindValue(":password", $usuario->senha);
            $sql->bindValue(":is_admin", $usuario->is_admin);
            $sql->bindValue(":id", $usuario->id);
            $sql->execute();
        }
    }

?>