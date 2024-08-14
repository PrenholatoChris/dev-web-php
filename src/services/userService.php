<?php
    function validarSenha($senha)
    {
        if(strlen($senha) < 8)
        {
            throw new Exception("A seha deve ter pelo menos 8 caracteres");
        }
    }
    function validarEmail($email){}
?>