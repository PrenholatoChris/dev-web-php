<?php
    class Usuario {
        private int $id;
        private string $nome;
        private string $tel;
        private string $email;
        private string $senha;
        private bool $is_admin;

        function setUsuario($nome, $email, $senha, $telefone, $is_admin)
        {
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->is_admin = $is_admin;
            $this->tel = $telefone;
        }

        function __get($name)
        {
            return $this->$name;
        }

        function __set($name, $value)
        {
            $this->$name = $value;
        }
    }
?>