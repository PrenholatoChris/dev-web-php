<?php 
    // require_once "../dao/usuarioDAO.php";
    require_once "../services/userService.php";
    require_once "../classes/usuario.php";

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
            validarSenha($senha);
        }
        catch(Exception $e){
            $_SESSION["senhaError"] = $e->getMessage();
        }
        
        try{
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
            validarSenha($senha);
        }
        catch(Exception $e){
            $_SESSION["senhaError"] = $e->getMessage();
        }
        
        try{
            validarEmail($email);
        }
        catch(Exception $e){
            $_SESSION["emailError"] = $e->getMessage();
        }

        if(isset($_SESSION["emailError"]) || isset($_SESSION["senhaError"]))
        {
            header("Location: ../views/formLogin.php");
        }

        // $usuarioDao = new UsuarioDAO();
        // $usuarioDao->authenticar($email, $senha);
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