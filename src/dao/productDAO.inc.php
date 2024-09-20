<?php
    require_once "conexao.inc.php";
    require_once "../classes/product.inc.php";

    class ProductDAO
    {

        private $conn;

        function __construct() {
            $conexao = new Conexao();
            $this->conn = $conexao->getConnection();
        }

        function cadastrar(Product $product) {
            $sql = $this->conn->prepare("INSERT INTO products (name, description, stock, price, ref, type) VALUES (:name, :description, :stock, :price, :ref, :type)");
            $sql->bindValue(":name", $product->name);
            $sql->bindValue(":description", $product->description);
            $sql->bindValue(":stock", $product->stock);
            $sql->bindValue(":price", $product->price);
            $sql->bindValue(":ref", $product->ref);
            $sql->bindValue(":type", $product->type);
            $sql->execute();
        }

        function getAll() {
            $sql = $this->conn->prepare("SELECT * FROM products where type = 'p'");
            $sql->execute();

            $products = array();
            while ($p = $sql->fetch(PDO::FETCH_OBJ)) {
                array_push($products, $this->mapProduct($p));
            }

            return $products;
        }

        function getById($id) {
            $sql = $this->conn->prepare("SELECT * FROM products WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            $productTemp = $sql->fetch(PDO::FETCH_OBJ);
            return $this->mapProduct($productTemp);
        }

        function atualizar(Product $product) {
            $sql = $this->conn->prepare("UPDATE products SET name = :name, description = :desc, stock = :stock, price = :price, ref = :ref WHERE id = :id");
            $sql->bindValue(":name", $product->name);
            $sql->bindValue(":desc", $product->description);
            $sql->bindValue(":stock", $product->stock);
            $sql->bindValue(":price", $product->price);
            $sql->bindValue(":ref", $product->ref);
            $sql->bindValue(":id", $product->id);
            $sql->execute();
        }

        function deletar($id) {
            $sql = $this->conn->prepare("DELETE FROM products WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
        }

        private function mapProduct($productTemp) {
            $product = new Product();
            $product->setProduct($productTemp->name, $productTemp->description, $productTemp->stock, $productTemp->price, $productTemp->ref, $productTemp->type, $productTemp->id);
            return $product;
        }
    }
?>
