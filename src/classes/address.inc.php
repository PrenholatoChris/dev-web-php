<?php 
    class Address {
        private $id;
        private $user_id;
        private $phone;
        private $receiver;
        private $postal_code;
        private $uf;
        private $city;
        private $neighborhood;
        private $street;
        private $number;
        private $complement;

        function setAddress($user_id, $phone, $postal_code, $uf, $city, $neighborhood, $street, $number, $complement, $id=null){
            $this->user_id = $user_id;
            $this->street = $street;
            $this->neighborhood = $neighborhood;
            $this->city = $city;
            $this->uf = $uf;
            $this->number = $number;
            $this->complement = $complement;
            $this->postal_code = $postal_code;
            $this->phone = $phone;
            $this->id = $id;
            return $this;
        }

        function __get($name){
            return $this->$name;
        }

        function __set($name, $value){
            $this->$name = $value;
        }
    }
?>