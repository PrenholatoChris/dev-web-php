<?php 
    require_once "../classes/address.inc.php";
    require_once "../dao/addressDAO.inc.php";

    $opcao = (int)$_REQUEST['vOpcao'];

    if($opcao == 1) //Cadastrar
    {
        $user_id = $_REQUEST["vUsuario"];
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
        $endereco->setAddress($user_id, $phone, $postal_code, $uf, $city, $neighborhood, $street, $number, $complement);

        $enderecoDao = new AddressDAO();
        $enderecoDao->cadastrar($endereco);
    }
    elseif($opcao == 2) //GetById
    {}
    elseif($opcao == 3) //GetAllByUserId
    {
        $userId = (int)$_REQUEST["vUserId"];

        // $enderecoDao = new EnderecoDAO();
        // $enderecos = $enderecoDao->getAllByUserId($userId);
    }
    elseif($opcao == 4) //Deletar
    {
        $id = (int)$_REQUEST["vId"];

        // $enderecoDao = new EnderecoDAO();
        // $enderecoDao->deletar($id);
    }
    elseif($opcao == 5) //Atualizar
    {
        $id = (int)$_REQUEST["vId"];
        $rua = $_REQUEST["vRua"];
        $bairro = $_REQUEST["vBairro"];
        $cidade = $_REQUEST["vCidade"];
        $estado = $_REQUEST["vEstado"];
        $numero = $_REQUEST["vNumero"];
        $complemento = $_REQUEST["vComplemento"];
        $cep = $_REQUEST["vCep"];
        $nomeReceb = $_REQUEST["vNomeReceb"];
        $telReceb = $_REQUEST["vTelReceb"];

        $endereco = new Address();
        $endereco->setAddress($rua, $bairro, $cidade, $estado, $numero, $complemento, $cep, $nomeReceb, $telReceb);

        // $enderecoDao = new EnderecoDAO();
        // $enderecoDao->atualizar($endereco);
    }
?>