<?php 
    class Produto {
        private $id;
        private $nome;
        private $preco;
        private $descricao;
        private $foto;

        public function setProduto($nome, $preco, $descricao, $foto){
            $this->nome = $nome;
            $this->preco = $preco;
            $this->descricao = $descricao;
            $this->foto = $foto;
        }

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }
    }
?>