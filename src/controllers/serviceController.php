<?php
    require_once "../classes/service.inc.php";
    require_once "../classes/sizes.inc.php";
    require_once "../services/imageService.php";
    require_once "../dao/serviceDAO.inc.php";

    session_start();

    $opcao = $_REQUEST["vOpcao"];

    if($opcao == 1 || $opcao == 4){ // cadastra | atualizar

        $vName = $_REQUEST['vName'];
        $vRef = $_REQUEST['vRef'];
        $vPrice = $_REQUEST['vPrice'];
        $vDescription = $_REQUEST['vDescription'];
        $vCategory = $_REQUEST['vCategory'];

        $sizes = $_REQUEST['props'];
        $sizes = json_decode($sizes, true);
        
        $list = array();
        foreach ($sizes as $size) {
            $s = new Sizes();
            $s->setSizes($size['name'], $size['price'], $size['tipo'], $size['id']);
            $list[] = $s;
        }

        if($opcao == 1){
            $service = new service();
            $service->setService($vName, $vDescription, $vRef, $vPrice, $vCategory,$list);
            
            $serviceDAO = new serviceDAO();
            $serviceDAO->cadastrar($service);
            
            uploadImage($vRef);
            

            header("Location: ./serviceController.php?vOpcao=2");
        }
        else{
            $service = new service();
            $service->setService($vName, $vDescription, $vRef, $vPrice, $vCategory, $list);

            if(isset($_SESSION["servico"])){
                $service->id = $_SESSION["servico"]->id;
            }
            
            $serviceDAO = new serviceDAO();
            $serviceDAO->atualizar($service);
            
            if(isset($_FILES['vImage']) && $_FILES['vImage']['error'] == UPLOAD_ERR_OK){
                uploadImage($vRef);
            }
            header("Location: ./serviceController.php?vOpcao=6");    
        }
    }
    else if($opcao == 2 || $opcao == 6){ // get-all
        $serviceDAO = new serviceDAO();
        $_SESSION["servicos"] = $serviceDAO->getAll();
        
        if($opcao == 2){
            header("Location: ./produtoController.php?vOpcao=3");
        }
        else{
            header("Location: ../views/showServices.php");   
        }
    }
    else if($opcao == 3 | $opcao == 7){ // get-by-id
        $id = $_REQUEST["vId"];
        $serviceDAO = new serviceDAO();
        $_SESSION["servico"] = $serviceDAO->getFullById($id);
        if($opcao == 3){
            header("Location: ../views/formAtualizarService.php");
        }else{
            header("Location: ../views/formSelectServiceSize.php");
        }
    }
    else if ($opcao == 5){ // Deletar
        $id = $_REQUEST["vId"];
        $serviceDAO = new serviceDAO();
        $serviceDAO->deletar($id);
        header("Location: ./serviceController.php?vOpcao=6");    
    }
    else if ($opcao == 8){ // Buscar
        $busca = $_REQUEST["vBusca"];

        if(isset($_SESSION["produtos"])){
            unset($_SESSION["produtos"]);
        }

        if(empty($busca)){
            header("Location: serviceController.php?vOpcao=2");
            return;
        }

        $serviceDAO = new serviceDAO();
        $_SESSION["servicos"] = $serviceDAO->buscaService($busca);

        header("Location: ../views/produtosVenda.php");
    }
?>