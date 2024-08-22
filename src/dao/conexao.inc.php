<?php 
    class Conexao {
        private $servidor_mysql = 'localhost';
        private $nome_banco = 'grafica';
        private $usuario = 'root';
        private $senha = '';
        private $conn;

        function getConecxao() {
            $this->conn = new PDO("mysql:host=$this->servidor_mysql;dbname=$this->nome_banco", "$this->usuario", "$this->senha"); 
            return $this->conn;
        }
    }

?>