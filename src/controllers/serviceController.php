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

        $sizes = $_REQUEST['sizes'];
        $sizes = json_decode($sizes, true);
        
        $list = array();
        foreach ($sizes as $size) {
            $s = new Sizes();
            $s->setSizes($size['name'], $size['price'], $size['id']);
            $list[] = $s;
        }

        if($opcao == 1){
            $service = new service();
            $service->setService($vName, $vDescription, $vRef, $vPrice, $list);
            
            $serviceDAO = new serviceDAO();
            $serviceDAO->cadastrar($service);
            
            if(isset($_FILES['vImage']) && $_FILES['vImage']['error'] == UPLOAD_ERR_OK){
                uploadImage($vRef);
            }

            header("Location: ./serviceController.php?vOpcao=2");
        }
        else{
            $service = new service();
            $service->setService($vName, $vDescription, $vRef, $vPrice, $list);

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
    else if($opcao == 3){ // get-by-id
        $id = $_REQUEST["vId"];
        $serviceDAO = new serviceDAO();
        $_SESSION["servico"] = $serviceDAO->getFullById($id);
        header("Location: ../views/formAtualizarService.php");
    }
    else if ($opcao == 5){ // Deletar
        $id = $_REQUEST["vId"];
        $serviceDAO = new serviceDAO();
        $serviceDAO->deletar($id);
        header("Location: ./serviceController.php?vOpcao=6");    
    }
?>