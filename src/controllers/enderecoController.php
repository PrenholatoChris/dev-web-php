<?php 
    require_once "../classes/address.inc.php";
    require_once "../classes/usuario.inc.php";
    require_once "../dao/addressDAO.inc.php";
    session_start();

    $opcao = (int)$_REQUEST['vOpcao'];

    if($opcao == 1) //Cadastrar
    {
        $user_id = $_REQUEST["vUserId"];
        
        $street = $_REQUEST["vRua"];
        $neighborhood = $_REQUEST["vBairro"];
        $city = $_REQUEST["vCidade"];
        $uf = $_REQUEST["vUf"];
        $number = $_REQUEST["vNumero"];
        $complement = $_REQUEST["vComplemento"];
        $postal_code = $_REQUEST["vCep"];
        $nomeReceb = $_REQUEST["vNomeReceb"];
        $phone = $_REQUEST["vTelReceb"];

        $endereco = new Address();
        $endereco->setAddress($phone, $postal_code, $uf, $city, $neighborhood, $street, $number, $complement, $complement, $nomeReceb);
        $endereco->user_id = $user_id;

        $enderecoDao = new AddressDAO();
        $enderecoDao->cadastrar($endereco);

        $comprando = $_REQUEST["comprando"];

        header("Location: ./enderecoController.php?vOpcao=3&comprando=$comprando");

    }
    elseif($opcao == 2 | $opcao == 7) //GetById
    {
        $id = (int)$_REQUEST["vId"];
        $enderecoDao = new AddressDAO();
        $enderecoDao->getById($id);

        $_SESSION["endereco"] = $enderecoDao->getById($id);
        if($opcao == 2){
            header("Location: ../views/formAtualizarEndereco.php");
        }else{
            header('Location: vendaController.php?vOpcao=1');
        }
    }
    elseif($opcao == 3 | $opcao == 6 ) //GetAllByUserId
    {
        $enderecoDao = new AddressDAO();
        $enderecos = $enderecoDao->getAllByUser($_SESSION["user"]->id);
        $_SESSION["enderecos"] = $enderecos;
        $comprando = $_REQUEST["comprando"];

        if($opcao == 3){
            if($comprando){
                header("Location: ../views/formSelectAddress.php");
            }else{
                header("Location: ../views/userAddresses.php");
            }
        }else{
            #Escolher endereco para a compra
            header('Location: ../views/formSelectAddress.php');
        }
    }
    elseif($opcao == 4) //Deletar
    {
        $id = (int)$_REQUEST["vId"];

        $enderecoDao = new AddressDAO();
        $enderecoDao->deletar($id);
        $enderecoDao->getAllByUser($_SESSION["user"]->id);

        header("Location: ./enderecoController.php?vOpcao=3");
    }
    elseif($opcao == 5) //Atualizar
    {
        $rua = $_REQUEST["vRua"];
        $bairro = $_REQUEST["vBairro"];
        $cidade = $_REQUEST["vCidade"];
        $estado = $_REQUEST["vUf"];
        $numero = $_REQUEST["vNumero"];
        $complemento = $_REQUEST["vComplemento"];
        $cep = $_REQUEST["vCep"];
        $nomeReceb = $_REQUEST["vNomeReceb"];
        $telReceb = $_REQUEST["vTelReceb"];

        $endereco = $_SESSION["endereco"];
        $endereco->setAddress($telReceb, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $nomeReceb);
        
        $enderecoDao = new AddressDAO();
        $enderecoDao->atualizar($endereco);

        header("Location: ./enderecoController.php?vOpcao=3");
    }
?>