<?php
    require_once "../classes/conexao.php";
    require_once "../classes/usuario.php";

    class UsuarioDAO
    {
        private $conexao = new Conexao();
        private $conn = $this->conexao->getConecxao();

        function cadastrar(Usuario $usuario)
        {
            $sql = $this->conn->prepare("INSERT INTO usuarios (nome, email, senha, type) VALUES (:nome, :email, :senha, :type)");
            $sql->bindValue(":nome", $usuario->nome);
            $sql->bindValue(":email", $usuario->email);
            $sql->bindValue(":senha", $usuario->senha);
            $sql->bindValue(":type", "C");
            $sql->execute();
        }

        function authenticar($email, $senha)
        {
            $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email, senha = :senha");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();
            
            $userTemp = $sql->fetch(PDO::FETCH_OBJ);
            $user = new Usuario();
            return $user->setUsuario($userTemp->nome, $userTemp->email, $userTemp->senha, $userTemp->tel, $userTemp->type);
        }

        function getAll()
        {
            $sql = $this->conn->prepare("SELECT * FROM usuarios");
            $sql->execute();

            $users = array();
            while( $us = $sql->fetch(PDO::FETCH_OBJ) ){
                $user = new Usuario();
                $user->setUsuario($us->nome, $us->email, $us->senha, $us->tel, $us->type);
                $users[] = $user;
            }

            return $users;
        }

        function deletar($id)
        {
            $sql = $this->conn->prepare("DELETE FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
        }

        function getById($id){
            $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            $userTemp = $sql->fetch(PDO::FETCH_OBJ);
            $user = new Usuario();
            return $user->setUsuario($userTemp->nome, $userTemp->email, $userTemp->senha, $user->tel, $userTemp->type);
        }

        function atualizar(Usuario $usuario){
            $sql = $this->conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, type = :type WHERE id = :id");
            $sql->bindValue(":nome", $usuario->nome);
            $sql->bindValue(":email", $usuario->email);
            $sql->bindValue(":senha", $usuario->senha);
            $sql->bindValue(":type", $usuario->type);
            $sql->bindValue(":id", $usuario->id);
            $sql->execute();
        }
    }

?>