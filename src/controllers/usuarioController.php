<?php 
    // require_once "../dao/usuarioDAO.php";
    require_once "../services/userService.php";

    $opcao = (int)$_REQUEST['vOpcao'];

    if($opcao == 1) //Cadastrar
    {}
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
    {}
    elseif($opcao == 4) //Deletar
    {}
    elseif($opcao == 5) //Atualizar
    {}
?>