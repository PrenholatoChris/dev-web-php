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

    private function mapSales($rows){
        $arr = array();
        foreach($rows as $row){
            $arr[] = new Sale($row->cpf, $row->address_id, $row->totalValue, $row->date, $row->id);
        }
        return $arr;
    }

    public function insertSale($venda, $carrinho){
        $sql = $this->con->prepare("insert into sales 
        (cpf, date, totalValue, address_id)
        values (:cpf, :data, :val, :address)");

        $sql->bindValue(':cpf', $venda->cpf);
        $sql->bindValue(':data', converterDataToMysql($venda->date));
        $sql->bindValue(':val', $venda->totalValue);
        $sql->bindValue(':address', $venda->address_id);
        $sql->execute();

        $id = $this->getIdSale();
        $this->insertItems($id, $carrinho);
    }
    
    public function getAllBetweenDates($datai,$dataf){
        $sql = $this->con->prepare("SELECT s.* FROM sales s
        WHERE (:datai is null or 
               s.date >= :datai)
          and (:dataf is null or 
               s.date <= :dataf)");

        $sql->bindValue(':datai', $datai);
        $sql->bindValue(':dataf', $dataf);
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_OBJ);
        return $this->mapSales($rows);
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