<?php 
    $opcao = (int)$_REQUEST['vOpcao'];

    if($opcao == 1) //Cadastrar
    {
        $rua = $_REQUEST["vRua"];
        $bairro = $_REQUEST["vBairro"];
        $cidade = $_REQUEST["vCidade"];
        $estado = $_REQUEST["vEstado"];
        $numero = $_REQUEST["vNumero"];
        $complemento = $_REQUEST["vComplemento"];
        $cep = $_REQUEST["vCep"];
        $nomeReceb = $_REQUEST["vNomeReceb"];
        $telReceb = $_REQUEST["vTelReceb"];

        $endereco = new Endereco();
        $endereco->setEndereco($rua, $bairro, $cidade, $estado, $numero, $complemento, $cep, $nomeReceb, $telReceb);

        // $enderecoDao = new EnderecoDAO();
        // $enderecoDao->cadastrar($rua, $bairro, $cidade, $estado, $numero, $complemento, $cep);
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

        $endereco = new Endereco();
        $endereco->setEndereco($rua, $bairro, $cidade, $estado, $numero, $complemento, $cep, $nomeReceb, $telReceb);

        // $enderecoDao = new EnderecoDAO();
        // $enderecoDao->atualizar($endereco);
    }
?>