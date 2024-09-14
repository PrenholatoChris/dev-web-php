<?php 
    class Product
    {
        private $id;
        private $name;
        private $description;
        private $stock;
        private $price;
        private $ref;
        private $type;

        public function setProduct($name, $description, $stock, $price, $ref, $type, $id = null) {
            $this->name = $name;
            $this->description = $description;
            $this->stock = $stock;
            $this->price = $price;
            $this->ref = $ref;
            $this->type = $type;
            $this->id = $id;
        }

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }

    }

?>