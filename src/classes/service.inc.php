<?php
    require_once "sizes.inc.php";

    class Service
    {
        private $id;
        private $name;
        private $reference;
        private $description;
        private $sizes;
        private $price;
        private $category;

        public function setService($name, $description, $reference, $price, $category, $sizes = null, $id = null) {
            $this->name = $name;
            $this->description = $description;
            $this->id = $id;
            $this->reference = $reference;
            $this->sizes = $sizes;
            $this->price = $price;
            $this->category = $category;
            return $this;
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
