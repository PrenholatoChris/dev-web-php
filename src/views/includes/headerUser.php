<?php
    require_once "../classes/usuario.inc.php";
    
    $usuario = $_SESSION["user"];
?>

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
    <div class="flex justify-between flex-row w-full h-fit px-4 py-2 items-center bg-gray-200 text-xl">
        <div class="w-16 h-full">
            <img class="w-full h-full object-contain" src="../assets/PrintShop.png" alt="Logo">
        </div>
        <ul class="list-none flex flex-row gap-4 w-fit">
            <li><a href="index.php" class="items-center"><i class="bi-house mr-1"></i>Home</a></li>
            <li><a href="#" class="items-center"><i class="bi-telephone mr-1"></i>Fale conosco</a></li>
            <li class="cursor-pointer">Servicos
                <a href="produtosVenda.php">
                    <i class="bi-caret-down-fill text-gray-600" style="font-size: x-small;">Produtos</i>
                </a>
                
                <!-- TODO fazer descer uma lista com o hover -->
            </li>
            <li><a href="#" class="items-center"><img src="../assets/cart3.png" alt="Carrinho"></a></li>
        </ul>
        <button class="m-0 p-0 w-fit h-fit" type="button"><a href="userProfile.php" class="items-center"> <?= $usuario->username ?> <i class="bi-person"></i></a></button>
    </div>