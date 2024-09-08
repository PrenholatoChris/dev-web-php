<?php 
    class Address {
        private $user_id;
        private $id;
        private $phone;
        private $receiver;
        private $postal_code;
        private $uf;
        private $city;
        private $neighborhood;
        private $street;
        private $number;
        private $complement;

        function setAddress($phone, $postal_code, $uf, $city, $neighborhood, $street, $number, $complement, $receiver) {
            $this->street = $street;
            $this->neighborhood = $neighborhood;
            $this->city = $city;
            $this->uf = $uf;
            $this->number = $number;
            $this->complement = $complement;
            $this->postal_code = $postal_code;
            $this->phone = $phone;
            $this->receiver = $receiver;
        }

        function __get($name){
            return $this->$name;
        }

        function __set($name, $value){
            $this->$name = $value;
        }
    }
?>