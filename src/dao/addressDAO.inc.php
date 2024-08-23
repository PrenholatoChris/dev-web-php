<?php
require_once "conexao.inc.php";
require_once "../classes/address.inc.php";

class AddressDAO
{
    private $conn;

    function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }

    function cadastrar(Address $address) {
        $sql = $this->conn->prepare("INSERT INTO addresses (user_id, phone, postal_code, uf, city, neighborhood, street, number, complement) VALUES (:user_id, :phone, :postal_code, :uf, :city, :neighborhood, :street, :number, :complement)");
        $sql->bindValue(":user_id",$address->user_id);
        $sql->bindValue(":phone",$address->phone);
        $sql->bindValue(":postal_code",$address->postal_code);
        $sql->bindValue(":uf",$address->uf);
        $sql->bindValue(":city",$address->city);
        $sql->bindValue(":neighborhood",$address->neighborhood);
        $sql->bindValue(":street",$address->street);
        $sql->bindValue(":number",$address->number);
        $sql->bindValue(":complement",$address->complement);
        $sql->execute();
    }

    function getAll() {
        $sql = $this->conn->prepare("SELECT * FROM addresses");
        $sql->execute();

        $addresses = array();
        while ($s = $sql->fetch(PDO::FETCH_OBJ)) {
            $addresses[] = $this->mapAddress($s);
        }

        return $addresses;
    }

    function getAllByUser($id) {
        $sql = $this->conn->prepare("SELECT * FROM addresses where user_id = :user_id");
        $sql->bindValue(":user_id",$id);
        $sql->execute();

        $addresses = array();
        while ($s = $sql->fetch(PDO::FETCH_OBJ)) {
            array_push($addresses, $this->mapAddress($s));
        }

        return $addresses;
    }

    function getById($id) {
        $sql = $this->conn->prepare("SELECT * FROM addresses WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        $addressTemp = $sql->fetch(PDO::FETCH_OBJ);
        return $this->mapAddress($addressTemp);
    }

    function atualizar(Address $address) {
        $sql = $this->conn->prepare("UPDATE addresses SET user_id = :user_id, phone = :phone, postal_code = :postal_code, uf = :uf, city = :city, neighborhood = :neighborhood, street = :street, number = :number, complement = :complement
        where id = :id");
        $sql->bindValue(":id",$address->id);
        $sql->bindValue(":user_id",$address->user_id);
        $sql->bindValue(":phone",$address->phone);
        $sql->bindValue(":postal_code",$address->postal_code);
        $sql->bindValue(":uf",$address->uf);
        $sql->bindValue(":city",$address->city);
        $sql->bindValue(":neighborhood",$address->neighborhood);
        $sql->bindValue(":street",$address->street);
        $sql->bindValue(":number",$address->number);
        $sql->bindValue(":complement",$address->complement);
        $sql->execute();
    }

    function deletar($id) {
        $sql = $this->conn->prepare("DELETE FROM addresses WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    private function mapAddress($addressTemp) {
        $address = new Address();
        return $address->setAddress($addressTemp->user_id, $addressTemp->phone, $addressTemp->postal_cod, $addressTemp->uf, $addressTemp->city, $addressTemp->neighborhood, $addressTemp->street, $addressTemp->number, $addressTemp->complement);
    }
}
?>
