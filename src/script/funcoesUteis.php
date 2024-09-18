<?php

function converterDataToMysql($data)
{
    return date('Y-m-d',$data);
}

function converterDataFromMySql($data)
{
    $data = strtotime($data);
    return date('d/m/Y',$data);
}

?>