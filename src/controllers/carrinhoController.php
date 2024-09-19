<?php 
    require_once '../dao/productDAO.inc.php';
    require_once '../dao/serviceDAO.inc.php';
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
    }elseif($opcao == 7 || $opcao == 8){
        #adicionar um servico ao carrinho

        $product_id = (int)$_REQUEST["id"];
        $size_id = $_REQUEST["size_id"];
        
        session_start();
        if(isset($_SESSION["carrinho"])){
            $carrinho = $_SESSION["carrinho"];
        }else{
            $carrinho = array();
        }

        $idx = buscaServicoCarrinho($product_id, $carrinho, $size_id);
        if($idx != -1){
            if($opcao == 7){
                $carrinho[$idx]->addQuantidade();
            }else{
                $carrinho[$idx]->decreaseQuantidade();
            }
        }else{
            $carrinho[] = $item;
        }

        $_SESSION["carrinho"] = $carrinho;
        header("Location: ../views/showCart.php");
    }
    elseif ($opcao == 9){
        #adicionar um servico ao carrinho

        $product_id = (int)$_REQUEST["id"];
        $size_id = $_REQUEST["propsIds"];
        $size_id = json_decode($size_id, true);
        
        $serviceDao = new serviceDAO();
        $service = $serviceDao->getFullById($product_id);

        $sizeIdValidator = '';
        foreach ($size_id as $group) {
            foreach ($group as $group_id) {
                $sizeIdValidator = $sizeIdValidator . updateServiceBySizes((int) $group_id, $service);
            }
        }
        $prd = new Product();
        $prd->setProduct($service->name, $service->description, 0, $service->price, $service->reference, "s", $service->id);
        
        $item = new Item($prd);
        $item->setSizeId((int)$sizeIdValidator); 
        
        session_start();
        if(isset($_SESSION["carrinho"])){
            $carrinho = $_SESSION["carrinho"];
        }else{
            $carrinho = array();
        }

        $idx = buscaServicoCarrinho($service->id, $carrinho, $sizeIdValidator);
        if($idx != -1){
            if($opcao == 7){
                $carrinho[$idx]->addQuantidade();
            }else{
                $carrinho[$idx]->decreaseQuantidade();
            }
        }else{
            $carrinho[] = $item;
        }

        $_SESSION["carrinho"] = $carrinho;
        header("Location: ../views/showCart.php");
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

    function buscaServicoCarrinho($servicoId, $vetor, $size_id){
        $index = -1;
        var_dump($vetor);
        var_dump($size_id);
        for($i=0; $i<count($vetor); $i++){
            if ($servicoId == $vetor[$i]->getProduto()->id && $vetor[$i]->getSizeId() == $size_id ) {
                $index = $i;
                break;
            }
        }
        return $index;
    }

    function updateServiceBySizes($size_id, $service){
        $idValidator = '';
        foreach($service->sizes as $sizegroup){
            foreach($sizegroup as $size){
                if($size->id == $size_id){
                    $service->name = $service->name . ' - ' . $size->name;
                    $service->price = $service->price + $size->price;
                    $idValidator = $idValidator . (string)$size->id;
                }
            }
        }
        return $idValidator;
    }
?>