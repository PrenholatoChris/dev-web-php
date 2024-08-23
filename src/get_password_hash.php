<?php 
    $pass = $_REQUEST["password"];
    echo password_hash($pass, PASSWORD_DEFAULT);


?>