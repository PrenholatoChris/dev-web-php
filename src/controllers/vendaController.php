<?php 
    require_once '../dao/saleDao.inc.php';
    require_once '../classes/sale.inc.php';
    require_once '../classes/usuario.inc.php';
    require_once '../classes/address.inc.php';
    
    $opcao = 0;
    if(isset($_REQUEST["vOpcao"])){
        $opcao = $_REQUEST["vOpcao"];
    }


    if($opcao == 1){
        session_start();
        $carrinho = $_SESSION["carrinho"];
        $address = $_SESSION["endereco"];
        $cliente = $_SESSION["user"];
        $total = $_SESSION["total"];


        //Armazena a sale e itens
        $sale = new Sale($cliente->cpf, $address->id, $total);
        $dao = new saleDao();
        $dao->insertSale($sale, $carrinho);
        
        unset($_SESSION["carrinho"]);
        header("Location: ../views/boleto/meuBoleto.php");
    }elseif($opcao == 2){//listar vendas
        session_start();

        $datai = null;
        if(isset($_REQUEST['datai'])){
            $datai = $_REQUEST["datai"];
        }

        $dataf = null;
        if(isset($_REQUEST['dataf'])){
            $dataf = $_REQUEST["dataf"];
        }
        $saleDao = new SaleDAO();
        $sales = $saleDao->getAllBetweenDates($datai,$dataf);
        $_SESSION["sales"] = $sales;
        // var_dump($sales);
        header("Location: ../views/showSales.php");

    }
    
    

?>