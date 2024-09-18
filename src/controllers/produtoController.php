<?php 
    require_once "../classes/product.inc.php";
    require_once "../services/imageService.php";
    require_once "../dao/productDAO.inc.php";
    session_start();

    $opcao = (int)$_REQUEST['vOpcao'];

    if($opcao == 1) //Cadastrar
    {
        $nome = $_REQUEST["vName"];
        $description = $_REQUEST["vDescription"];
        $stock = $_REQUEST["vStock"];
        $price = $_REQUEST["vPrice"];
        $ref = $_REQUEST["vRef"];
        $type = $_REQUEST["vType"];

        $product = new Product();
        $product->setProduct($nome, $description, $stock, $price, $ref, $type);
        $enderecoDao = new ProductDAO();
        $enderecoDao->cadastrar($product);

        uploadImage($ref);
        header("Location: ./produtoController.php?vOpcao=3");
    }
    elseif($opcao == 2) //GetById
    {
        $id = (int)$_REQUEST["vId"];
        $prodDao = new ProductDAO();
        $prodDao->getById($id);

        $_SESSION["produto"] = $prodDao->getById($id);

        header("Location: ../views/formAtualizarProduct.php");
    }
    elseif($opcao == 3 | $opcao ==6) //GetAll
    {
        $prodDao = new ProductDAO();
        $produtos = $prodDao->getAll();
        $_SESSION["produtos"] = $produtos;

        if($opcao == 3){
            header("Location: ../views/produtosVenda.php");
        }else{
            header("Location: ../views/showProducts.php");
        }
    }
    elseif($opcao == 4) //Deletar
    {
        $id = (int)$_REQUEST["vId"];

        $prodDao = new ProductDAO();
        
        deleteImage($prodDao->getById($id)->image);
        $prodDao->deletar($id);

        header("Location: ./produtoController.php?vOpcao=3");
    }
    elseif($opcao == 5) //Atualizar
    {
        $id = $_REQUEST["vId"];
        $nome = $_REQUEST["vName"];
        $stock = $_REQUEST["vStock"];
        $price = $_REQUEST["vPrice"];
        $image = $_REQUEST["vImage"];

        $product = $_SESSION["produto"];
        $product->setProduct($nome, $stock, $price, $image, $id);
        
        $enderecoDao = new ProductDAO();
        $enderecoDao->atualizar($product);

        header("Location: ./enderecoController.php?vOpcao=3");
    }
?>