<?php
    require_once "conexao.inc.php";
    require_once "../classes/usuario.inc.php";

    class userDAO
    {

        private $conn;

        function __construct(){
            $conexao = new Conexao();
            $this->conn = $conexao->getConnection();
        }

        private function mapUser($userTemp) {
            $user = new User();
            $user->setUser($userTemp->username, $userTemp->cpf ,$userTemp->email, $userTemp->password, $userTemp->is_admin, $userTemp->id);
            return $user;
        }

        function cadastrar($usuario){
            $sql = $this->conn->prepare("INSERT INTO users (username, cpf, email, password, is_admin) VALUES (:username, :cpf, :email, :password, 0)");
            $sql->bindValue(":username", $usuario->username);
            $sql->bindValue(":cpf", $usuario->cpf);
            $sql->bindValue(":email", $usuario->email);
            $sql->bindValue(":password", password_hash($usuario->password, PASSWORD_DEFAULT));
            $sql->execute();
        }

        function authenticar($email, $password)
        {
            $sql = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();
            
            if ($sql->rowCount() == 1) {
                $userTemp = $sql->fetch(PDO::FETCH_OBJ);
                if (password_verify($password, $userTemp->password)) {
                    return $this->mapUser($userTemp); 
                }
            }
            return null;
        }

        function getAll()
        {
            $sql = $this->conn->prepare("SELECT * FROM users");
            $sql->execute();

            $users = array();
            while( $us = $sql->fetch(PDO::FETCH_OBJ) ){
                array_push($users, $this->mapUser($us));
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
            return $this->mapUser($userTemp);
        }

        function atualizar(User $usuario){
            $sql = $this->conn->prepare("UPDATE users SET username = :username, email = :email, password = :password, is_admin = :is_admin WHERE id = :id");
            $sql->bindValue(":username", $usuario->username);
            $sql->bindValue(":email", $usuario->email);
            $sql->bindValue(":password", $usuario->password);
            $sql->bindValue(":is_admin", $usuario->is_admin);
            $sql->bindValue(":id", $usuario->id);
            $sql->execute();
        }
    }

?>