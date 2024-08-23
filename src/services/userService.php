<?php
    function validarSenha($senha)
    {
        if(strlen($senha) < 8)
        {
            throw new Exception("A senha deve ter pelo menos 8 caracteres");
        }
    }
    function validarEmail($email){}
?>