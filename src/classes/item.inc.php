<?php 

require_once 'product.inc.php';
class Item{
    private int $amount;
    private float $totalValue;
    private Product $produto;

    function __construct($produto){
        $this->amount = 1;
        $this->produto = $produto;
        $this->totalValue = $produto->price;
    }

    public function getValorItem(){
        return $this->totalValue;
    }

    public function setvalorItem(){
        $this->totalValue = $this->amount * $this->produto->price;
    }

    public function getQuantidade(){
        return $this->amount;
    }

    public function addQuantidade(){
        $this->amount++;
        $this->setvalorItem();
    }

    public function decreaseQuantidade(){
        if($this->amount > 1){
            $this->amount--;
            $this->setvalorItem();
        }
    }

    public function getProduto(){
        return $this->produto;
    }

}

?>