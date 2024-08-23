<?php
    class Service
    {
        private $id;
        private $name;
        private $description;
        private $image;

        public function setService($name, $description, $image, $id = null) {
            $this->name = $name;
            $this->description = $description;
            $this->image = $image;
            $this->id = $id;
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
