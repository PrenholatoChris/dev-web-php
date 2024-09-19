<?php 
    require_once '../dao/productDAO.inc.php';
    require_once '../classes/product.inc.php';
    require_once '../classes/service.inc.php';
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
            }
        }else{
            $carrinho[] = $item;
        }

        $_SESSION["carrinho"] = $carrinho;


        header("Location: ../views/showCart.php");

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

        if(isset($_SESSION["user"])){
            #seleciona endereco de entrega
            header('Location: enderecoController.php?vOpcao=6');
        }else{
            header('Location: ../views/formLogin.php');
        }
    }elseif($opcao ==7){
        #adicionar um servico ao carrinho

        $product_id = (int)$_REQUEST["id"];
        $size_id = (int)$_REQUEST["size_id"];
    
        $serviceDao = new serviceDAO();
        $service = $serviceDao->getFullById($product_id);

        $size_value = findValueOfSizeById($size_id, $service->sizes);

        $service->price = $service->price + $size_value;

        $item = new Item($service);
        
        session_start();
        if(isset($_SESSION["carrinho"])){
            $carrinho = $_SESSION["carrinho"];
        }else{
            $carrinho = array();
        }

        $idx = buscaCarrinho($service->id, $carrinho);
        if($idx != -1){
            if($opcao == 1){
                $carrinho[$idx]->addQuantidade();
            }else{
                $carrinho[$idx]->decreaseQuantidade();
            }
        }else{
            $carrinho[] = $item;
        }

        $_SESSION["carrinho"] = $carrinho;

        $size = null;
        if(isset($_REQUEST["tamanho"])){
            $size = (int)$_REQUEST["tamanho"];
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

    function findValueOfSizeById($id,$array){
        $value = 0;
        foreach($array as $size){
            if($size->id == $id){
                $value = $size->value;
            }
        }
        return $value;
    }



?>