<?php 
    class Product
    {
        private $id;
        private $name;
        private $stock;
        private $price;
        private $image;

        public function setProduct($name, $stock, $price, $image, $id = null) {
            $this->name = $name;
            $this->stock = $stock;
            $this->price = $price;
            $this->image = $image;
            $this->id = $id;
            return $this;
        }

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }

    }

?>