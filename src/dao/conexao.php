<?php 
    class Conexao {
        private $servidor_mysql = '';
        private $nome_banco = '';
        private $usuario = '';
        private $senha = '';
        private $conn = new PDO("mysql:host=$this->servidor_mysql;dbname=$this->nome_banco", "$this->usuario", "$this->senha"); 

        function getConecxao() {
            return $this->conn;
        }
    }

?>