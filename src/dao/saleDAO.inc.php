<?php 
require_once 'conexao.inc.php';
require_once '../script/funcoesUteis.php';
require_once '../classes/sale.inc.php';
require_once '../classes/item.inc.php';


class SaleDAO{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConnection();
    }

    public function insertSale($venda, $carrinho){
        $sql = $this->con->prepare("insert into sales 
        (cpf, saleDate, totalValue, address_id)
        values (:cpf, :data, :val, :address)");

        $sql->bindValue(':cpf', $venda->cpf);
        $sql->bindValue(':data', converterDataToMysql($venda->data));
        $sql->bindValue(':val', $venda->valorTotal);
        $sql->bindValue(':address', $venda->address_id);
        $sql->execute();

        $id = $this->getIdSale();
        $this->insertItems($id, $carrinho);
    }
    

    private function insertItems($idVenda,$carrinho){
        foreach($carrinho as $item){
            $sql = $this->con->prepare("insert into items 
            (product_id, amount, totalValue, sale_id) 
            values (:idPrd, :qt, :val, :idV)");

            $sql->bindValue(":idPrd", $item->getProduto()->id);
            $sql->bindValue(":qt", $item->getQuantidade());
            $sql->bindValue(":val", $item->getValorItem());
            $sql->bindValue(":idV", $idVenda);
            $sql->execute();
        }
    }
    
    
    private function getIdSale(){
        $sql = $this->con->query("SELECT MAX(id) as maior from sales");
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_OBJ);
        return $row->maior;
    }

}

?>