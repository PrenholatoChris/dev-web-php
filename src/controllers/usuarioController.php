<?php 
    require_once "../dao/userDAO.inc.php";
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
        
        // $userDAO = new userDAO();
        // $userDAO->cadastrar($nome, $email, $senha);

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

        $userDAO = new userDAO();
        $usrLogado = $userDAO->authenticar($email, $senha);
        
        if($usrLogado != null){
            $_SESSION["user"] = $usrLogado;
            header("Location: ../views/formCadastroEndereco.php");
        }else{
            $_SESSION["senhaError"] = "Login ou senha não encontrado no sistema!";
            header("Location: ../views/formLogin.php");
        }
    }
    elseif($opcao == 3) //GetAll
    {
        // $userDAO = new userDAO();
        // $userDAO->getAll();
    }
    elseif($opcao == 4) //Deletar
    {
        // $id = $_REQUEST["vId"];
        // $userDAO = new userDAO();
        // $userDAO->deletar($id);
    }
    elseif($opcao == 5) //Atualizar
    {
        session_start();
        $usr = $_SESSION["user"];
        $name = $_REQUEST["vName"];
        $email = $_REQUEST["vEmail"];
        // $senha = $_REQUEST["vSenha"]; podemos pedir para reconfirmar a senha antes
        $updatedUser = new User();
        $updatedUser->setUser($name, $email, $usr->password, $usr->is_admin, $usr->id);

        $userDAO = new userDAO();
        $userDAO->atualizar($updatedUser);
        $_SESSION["user"] = $updatedUser;
        header('Location: ../views/userProfile.php');
    }
    elseif($opcao == 6) //Deslogar
    {
        session_start();
        unset($_SESSION["user"]);
        header('Location: ../views/index.php');
    }
    elseif($opcao == 99){
        session_start();
        var_dump($_SESSION['user']);
    }
?>