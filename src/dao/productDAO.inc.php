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
            $sql = $this->conn->prepare("INSERT INTO products (nome, estoque, preco, imagem) VALUES (:nome, :estoque, :preco, :imagem)");
            $sql->bindValue(":nome", $product->nome);
            $sql->bindValue(":estoque", $product->estoque);
            $sql->bindValue(":preco", $product->preco);
            $sql->bindValue(":imagem", $product->imagem);
            $sql->execute();
        }

        function getAll() {
            $sql = $this->conn->prepare("SELECT * FROM products");
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
            $sql = $this->conn->prepare("UPDATE products SET nome = :nome, estoque = :estoque, preco = :preco, imagem = :imagem WHERE id = :id");
            $sql->bindValue(":nome", $product->nome);
            $sql->bindValue(":estoque", $product->estoque);
            $sql->bindValue(":preco", $product->preco);
            $sql->bindValue(":imagem", $product->imagem);
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
            return $product->setProduct($productTemp->nome, $productTemp->estoque, $productTemp->preco, $productTemp->imagem, $productTemp->id);
        }
    }
?>
