<?php 
    require_once "../dao/usuarioDAO.php";
    require_once "../services/userService.php";
    require_once "../classes/usuario.inc.php";

    $opcao = (int)$_REQUEST['vOpcao'];

    if($opcao == 1) //Cadastrar
    {
        $nome = $_REQUEST["vNome"];
        $email = $_REQUEST["vEmail"];
        $senha = $_REQUEST["vSenha"];
        $confirmarSenha = $_REQUEST["vSenhaConf"];

        if($senha != $confirmarSenha){
            $_SESSION["senhaError"] = "As senhas precisam ser iguais";
        }

        try{
            unset($_SESSION["senhaError"]);
            validarSenha($senha);
        }
        catch(Exception $e){
            $_SESSION["senhaError"] = $e->getMessage();
        }
        
        try{
            unset($_SESSION["emailError"]);
            validarEmail($email);
        }
        catch(Exception $e){
            $_SESSION["emailError"] = $e->getMessage();
        }
        
        // $usuarioDao = new UsuarioDAO();
        // $usuarioDao->cadastrar($nome, $email, $senha);

    }
    elseif($opcao == 2) //Authenticar
    {
        session_start();

        $email = $_REQUEST["vLogin"];
        $senha = $_REQUEST["vSenha"];
        
        try{
            unset($_SESSION["senhaError"]);
            validarSenha($senha);
        }
        catch(Exception $e){
            $_SESSION["senhaError"] = $e->getMessage();
        }
        
        try{
            unset($_SESSION["emailError"]);
            validarEmail($email);
        }
        catch(Exception $e){
            $_SESSION["emailError"] = $e->getMessage();
        }

        if(isset($_SESSION["emailError"]) || isset($_SESSION["senhaError"]))
        {
            header("Location: ../views/formLogin.php");
        }

        $usuarioDao = new UsuarioDAO();
        $usrLogado = $usuarioDao->authenticar($email, $senha);
        
        if($usrLogado != null){
            $_SESSION["loggedUser"] = $usrLogado;
        }else{
            $_SESSION["senhaError"] = "Login ou senha não encontrado no sistema!";
        }
    }
    elseif($opcao == 3) //GetAll
    {
        // $usuarioDao = new UsuarioDAO();
        // $usuarioDao->getAll();
    }
    elseif($opcao == 4) //Deletar
    {
        // $id = $_REQUEST["vId"];
        // $usuarioDao = new UsuarioDAO();
        // $usuarioDao->deletar($id);
    }
    elseif($opcao == 5) //Atualizar
    {
        // $id = $_REQUEST["vId"];
        // $nome = $_REQUEST["vNome"];
        // $email = $_REQUEST["vEmail"];
        // $senha = $_REQUEST["vSenha"];
        // $usuario = new Usuario();
        // $usuario->setUsuario($nome, $email, $senha);
        // $usuario->id = $id;

        // $usuarioDao = new UsuarioDAO();
        // $usuarioDao->atualizar($usuario);
    }
?>