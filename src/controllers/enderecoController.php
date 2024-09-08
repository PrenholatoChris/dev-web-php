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

        header("Location: ./enderecoController.php?vOpcao=3");
    }
    elseif($opcao == 2) //GetById
    {
        $id = (int)$_REQUEST["vId"];
        $enderecoDao = new AddressDAO();
        $enderecoDao->getById($id);

        $_SESSION["endereco"] = $enderecoDao->getById($id);

        header("Location: ../views/formAtualizarEndereco.php");
    }
    elseif($opcao == 3) //GetAllByUserId
    {
        $enderecoDao = new AddressDAO();
        $enderecos = $enderecoDao->getAllByUser($_SESSION["user"]->id);
        $_SESSION["enderecos"] = $enderecos;

        header("Location: ../views/userAddresses.php");
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