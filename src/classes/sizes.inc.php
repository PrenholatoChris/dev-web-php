<?php
    class Sizes
    {
        private $id;
        private $name;
        private $price;

        public function setSizes($name, $price, $id = null) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
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