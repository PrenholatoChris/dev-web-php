<?php
require_once "conexao.inc.php";
require_once "../classes/service.inc.php";

class serviceDAO
{
    private $conn;

    function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }

    function cadastrar(Service $service) {
        $sql = $this->conn->prepare("INSERT INTO services (name, description, image) VALUES (:name, :description, :image)");
        $sql->bindValue(":name", $service->name);
        $sql->bindValue(":description", $service->description);
        $sql->bindValue(":image", $service->image);
        $sql->execute();
    }

    function getAll() {
        $sql = $this->conn->prepare("SELECT * FROM services");
        $sql->execute();

        $services = array();
        while ($s = $sql->fetch(PDO::FETCH_OBJ)) {
            $services[] = $this->mapservice($s);
        }

        return $services;
    }

    function getById($id) {
        $sql = $this->conn->prepare("SELECT * FROM services WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        $serviceTemp = $sql->fetch(PDO::FETCH_OBJ);
        return $this->mapservice($serviceTemp);
    }

    function atualizar(Service $service) {
        $sql = $this->conn->prepare("UPDATE services SET name = :name, description = :description, image = :image WHERE id = :id");
        $sql->bindValue(":name", $service->name);
        $sql->bindValue(":description", $service->description);
        $sql->bindValue(":image", $service->image);
        $sql->bindValue(":id", $service->id);
        $sql->execute();
    }

    function deletar($id) {
        $sql = $this->conn->prepare("DELETE FROM services WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    private function mapservice($serviceTemp) {
        $service = new Service();
        return $service->setservice($serviceTemp->name, $serviceTemp->description, $serviceTemp->image, $serviceTemp->id);
    }
}
?>
