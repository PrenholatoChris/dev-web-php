<?php 
    class Endereco {
        private $id;
        private $rua;
        private $bairro;
        private $cidade;
        private $uf;
        private $numero;
        private $complemento;
        private $cep;
        private $nomeRecebedor;
        private $telefoneRecebedor;

        function setEndereco($rua, $bairro, $cidade, $uf, $numero, $complemento, $cep, $nomeRecebedor, $telefoneRecebedor){
            $this->rua = $rua;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->uf = $uf;
            $this->numero = $numero;
            $this->complemento = $complemento;
            $this->cep = $cep;
            $this->nomeRecebedor = $nomeRecebedor;
            $this->telefoneRecebedor = $telefoneRecebedor;
        }

        function __get($name){
            return $this->$name;
        }

        function __set($name, $value){
            $this->$name = $value;
        }
    }
?>