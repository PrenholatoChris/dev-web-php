<?php
require_once "../classes/service.inc.php";
require_once "../classes/sizes.inc.php";
require_once "conexao.inc.php";

class serviceDAO
{
    private $conn;

    function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }

    private function mapservice($serviceTemp) {
        $service = new Service();
        return $service->setservice($serviceTemp->name, $serviceTemp->description, $serviceTemp->ref, $serviceTemp->price, $serviceTemp->category, null,$serviceTemp->id);
    }

    private function mapSizes($sizes) {
        $services_sizes = array();
    
        foreach ($sizes as $s) {
            $size = new Sizes();
            $size->setSizes($s->name, $s->price, $s->type, $s->id);
    
            // Verifica se o tipo já existe no array
            if (!isset($services_sizes[$s->type])) {
                $services_sizes[$s->type] = array(); // Cria um novo array para o tipo
            }
    
            // Adiciona o objeto size ao array do tipo correspondente
            $services_sizes[$s->type][] = $size;
        }
    
        return $services_sizes;
    }


    private function getMaxId(){
        $sql = $this->conn->prepare("SELECT MAX(id) as maior FROM products");
        $sql->execute();
        
        $serviceTemp = $sql->fetch(PDO::FETCH_OBJ);
        return $serviceTemp->maior;
    }

    private function cadastrarTamanhos($id, $sizes) {
        foreach ($sizes as $s) {
            $sql = $this->conn->prepare("INSERT INTO service_prop (name, price, service_id, type) VALUES (:name, :price, :service_id, :type)");
            $sql->bindValue(":name", $s->name);
            $sql->bindValue(":price", $s->price);
            $sql->bindValue(":service_id", $id);
            $sql->bindValue(":type", $s->type);
            $sql->execute();
        }
    }

    function cadastrar(Service $service) {
        $sql = $this->conn->prepare("INSERT INTO products (name, description, ref, price, type, category) VALUES (:name, :description, :ref, :price, :type, :category)");
        $sql->bindValue(":name", $service->name);
        $sql->bindValue(":description", $service->description);
        $sql->bindValue(":ref", $service->reference);
        $sql->bindValue(":price", $service->price);
        $sql->bindValue(":type", "s");
        $sql->bindValue(":category", "$service->category");
        $sql->execute();

        $id = (int)$this->getMaxId();
        $this->cadastrarTamanhos($id, $service->sizes);
    }

    function getAll() {
        $sql = $this->conn->prepare("SELECT * FROM products WHERE type = 's'");
        $sql->execute();

        $services = array();
        while ($s = $sql->fetch(PDO::FETCH_OBJ)) {
            $services[] = $this->mapservice($s);
        }

        return $services;
    }

    function getById($id) {
        $sql = $this->conn->prepare("SELECT * FROM products WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        $serviceTemp = $sql->fetch(PDO::FETCH_OBJ);
        return $this->mapservice($serviceTemp);
    }

    function getFullById($id) {
        $service = $this->getById($id);
        
        $sql = $this->conn->prepare("
            SELECT 
                s.name, s.price, s.id , s.type
            FROM products p
            INNER JOIN service_prop s 
            ON p.id = s.service_id
            WHERE p.id = :id
            GROUP BY s.type, s.name, s.price, s.id
        ");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $sizes = array();
        while ($s = $sql->fetch(PDO::FETCH_OBJ)) {
            $sizes[] = $s;
        }

        $service->sizes = $this->mapSizes($sizes);        
        return $service;
    }

    function atualizar(Service $service) {
        $sql = $this->conn->prepare("UPDATE products SET name = :name, description = :description, price = :price , category = :category, ref = :ref WHERE id = :id");
        $sql->bindValue(":name", $service->name);
        $sql->bindValue(":description", $service->description);
        $sql->bindValue(":price", $service->price);
        $sql->bindValue(":id", $service->id);
        $sql->bindValue(":category", $service->category);
        $sql->bindValue(":ref", $service->reference);
        $sql->execute();
        $this->atualizarSizes($service->id , $service->sizes);
    }

    function buscaService($parametro){
        $sql = $this->conn->prepare("
            SELECT * from products 
            WHERE (name LIKE CONCAT('%', :parametro, '%') 
            OR ref LIKE CONCAT('%', :parametro, '%')
            OR category LIKE CONCAT('%', :parametro, '%'))
            AND type = 's'
        ");
        $sql->bindValue(":parametro", $parametro);
        $sql->execute();

        $services = array();
        while ($s = $sql->fetch(PDO::FETCH_OBJ)) {
            $services[] = $this->mapservice($s);
        }
        return $services;
    }

    private function atualizarSizes($serviceId, $sizes){
        // 1. Obter todos os IDs de tamanhos relacionados ao serviço no banco de dados
        $sql = $this->conn->prepare("
            SELECT id FROM service_prop WHERE service_id = :service_id
        ");
        $sql->bindValue(":service_id", $serviceId);
        $sql->execute();
        $existingSizes = $sql->fetchAll(PDO::FETCH_COLUMN, 0); // Retorna uma lista com os IDs dos tamanhos
        // 2. Criar uma lista dos IDs de tamanhos passados para a função
        $passedSizeIds = array();
        foreach ($sizes as $s) {
            if((int)$s->id == -1){
                echo ("<p> cadastrando </p>");
                // Inserir novos tamanhos
                $this->cadastrarTamanhos($serviceId, [$s]);
            } else {
                echo ("<p> atualizando </p>");
                // Atualizar tamanhos existentes
                $sql = $this->conn->prepare("
                    UPDATE service_prop 
                    SET name = :name, price = :price 
                    WHERE id = :size_id
                ");
                $sql->bindValue(":name", $s->name);
                $sql->bindValue(":price", $s->price);
                $sql->bindValue(":size_id", $s->id); // O ID do tamanho específico
                $sql->execute();
    
                // Adicionar o ID do tamanho atualizado na lista de tamanhos passados
                $passedSizeIds[] = (int) $s->id;
            }
            var_dump($s);
        }
    
        // 3. Deletar tamanhos que não foram passados para a função
        $sizesToDelete = array_diff($existingSizes, $passedSizeIds); // Tamanhos que existem no banco, mas não foram passados
        echo ("<p> PassedSizeIds </p>");
        var_dump($passedSizeIds);
        echo ("<p> To delete </p>");
        var_dump($sizesToDelete);

        if (!empty($sizesToDelete)) {
            $sql = $this->conn->prepare("
                DELETE FROM service_prop 
                WHERE id IN (" . implode(',', array_map('intval', $sizesToDelete)) . ")
            ");
            $sql->execute();
        }
    }
    

    function deletar($id) {
        $sql = $this->conn->prepare("DELETE FROM products WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $this->deleteSizes($id);
    }

    private function deleteSizes($serviceId){
        $sql = $this->conn->prepare("DELETE FROM service_prop WHERE service_id = :service_id");
        $sql->bindValue(":service_id", $serviceId);
        $sql->execute();
    }
}
?>
