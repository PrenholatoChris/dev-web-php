<?php 
    require_once '../dao/productDAO.inc.php';
    require_once '../classes/product.inc.php';
    require_once '../classes/item.inc.php';

    $opcao = (int)$_REQUEST["vOpcao"];

    if($opcao == 1 | $opcao == 6){
        #Adicionar um item ao carrinho
        $product_id = (int)$_REQUEST["id"];
        $productDao = new ProductDAO();
        $product = $productDao->getById($product_id);

        $item = new Item($product);

        session_start();
        if(isset($_SESSION["carrinho"])){
            $carrinho = $_SESSION["carrinho"];
        }else{
            $carrinho = array();
        }

        $idx = buscaCarrinho($product->id, $carrinho);
        if($idx != -1){
            if($opcao == 1){
                $carrinho[$idx]->addQuantidade();
            }else{
                $carrinho[$idx]->decreaseQuantidade();
                // if($carrinho[$idx]->getQuantidade() == 0){
                //     header("carrinhoController.php?vOpcao=2&index=$idx");
                // }
            }
        }else{
            $carrinho[] = $item;
        }

        $_SESSION["carrinho"] = $carrinho;

        // Validar se item eh produto ou servico
            // se produto
            header("Location: ../views/showCart.php");
            // se servico
            // header("Location: ../views/formService.php");
    }elseif($opcao == 2){
        #tirar um item do carrinho
        $index = $_REQUEST["index"];
        session_start();
        $carrinho = $_SESSION['carrinho'];
        unset($carrinho[$index]);
        sort($carrinho);
        $_SESSION['carrinho'] = $carrinho;
        header("Location: carrinhoController.php?vOpcao=4");

    }elseif($opcao == 3){
        #limpar carrinho
        session_start();
        unset($_SESSION['carrinho']);
        header("Location: carrinhoController.php?vOpcao=4");
    }elseif($opcao == 4){
        #verifica carrinho vazio
        // session_start();
        // if(!isset($_SESSION['carrinho']) || sizeof($_SESSION['carrinho'])==0){
        //     header('Location: ../views/showCart.php?status=1');
        // }else{
            header('Location: ../views/showCart.php');
        // }
    }elseif($opcao ==5){
        #finaliza carrinho
        session_start();
        $total = $_REQUEST["total"];
        $_SESSION['total'] = $total;

        if(isset($_SESSION["clienteLogado"])){
            header('Location: ../views/dadosCompra.php');
        }else{
            header('Location: ../views/formLogin.php');
        }
    }

    function buscaCarrinho($produtoId, $vetor){
        $index = -1;
        for($i=0; $i<count($vetor); $i++){
            if ($produtoId == $vetor[$i]->getProduto()->id) {
                $index = $i;
                break;
            }
        }
        return $index;
    }




?>