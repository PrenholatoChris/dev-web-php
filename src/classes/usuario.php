<?
    class Usuario {
        private $id;
        private $nome;
        private $tel;
        private $email;
        private $senha;
        private $type;

        function setUsuario($nome, $email, $senha, $telefone, $type)
        {
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->type = $type;
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