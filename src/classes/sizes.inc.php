<?php
    class Sizes
    {
        private $id;
        private $name;
        private $price;
        private $type;

        public function setSizes($name, $price, $type, $id = null) {
            $this->id = $id;
            $this->name = $name;
            $this->type = $type;
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