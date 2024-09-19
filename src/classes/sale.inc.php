<?php 

class Sale{
    private $id;
    private $cpf;
    private $address_id;
    private $totalValue;
    private $date;
    private $status;

    function __construct($cpf, $address_id, $totalValue, $status = "aberto", $date=null, $id=null){
        $this->cpf = $cpf;
        $this->address_id = $address_id;
        $this->totalValue = $totalValue;
        $this->date = $date;
        if($date == null){
            $this->date = time();
        }
        $this->id = $id;
        $this->status = $status;
    }

    function __set($atrib, $value){
        $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}

?>