<?php 

class Sale{
    private $id;
    private $cpf;
    private $address_id;
    private $totalAmount;
    private $date;

    function __construct($cpf, $address_id, $valor){
        $this->cpf = $cpf;
        $this->address_id = $address_id;
        $this->valorTotal = $valor;
        $this->data = time();
    }

    function __set($atrib, $value){
        $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}

?>