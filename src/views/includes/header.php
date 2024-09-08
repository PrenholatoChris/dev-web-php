<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="min-h-screen min-w-screen">
    <?php
        require_once "../classes/usuario.inc.php";
        session_start();
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]->is_admin){
                require_once "./includes/headerAdmin.php";
            }
            else{
                require_once "./includes/headerUser.php";
            }
        }
        else{
            require_once "./includes/headerDefault.php";
        }
    ?>