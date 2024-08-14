<?
    class Usuario {
        private $id;
        private $nome;
        private $email;
        private $password;
        private $type;

        function setUsuario($nome, $email, $password, $type)
        {
            $this->nome = $nome;
            $this->email = $email;
            $this->password = $password;
            $this->type = $type;
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