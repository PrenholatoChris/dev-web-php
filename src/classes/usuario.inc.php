<?php
    class User {
        private int $id;
        private string $cpf;
        private string $username;
        private string $email;
        private string $password;
        private bool $is_admin;

        public function setUser($username, $cpf, $email, $password, $is_admin, $id = null) {
            $this->username = $username;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->password = $password;
            $this->is_admin = $is_admin;
            $this->id = $id;
            return $this;
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