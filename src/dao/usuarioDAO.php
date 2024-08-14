<?php
    class UsuarioDAO
    {
        private $conexao = new Conexao();
        private $conn = $this->conexao->getConecxao();

        function authenticar($email, $senha)
        {
            $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email, senha = :senha");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();
            
            $userTemp = $sql->fetch(PDO::FETCH_OBJ);
            $user = new Usuario();
            return $user->setUsuario($userTemp->nome, $userTemp->email, $userTemp->password, $userTemp->type);
        }
    }

?>