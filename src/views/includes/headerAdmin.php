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
            <img class="w-full object-cover" src="../assets/PrintShop.png" alt="Logo">
        </div>
        <ul class="list-none flex flex-row gap-4 w-fit">
            <li><a href="index.php" class="items-center"><i class="bi-house mr-1"></i>Home</a></li>
            <li><a href="faleConosco.php" class="items-center"><i class="bi-telephone mr-1"></i>Fale conosco</a></li>
            <li  class="cursor-pointer">
                <a id="dropdownDefaultButton" data-dropdown-trigger="hover" data-dropdown-toggle="dropdown" href="../controllers/serviceController.php?vOpcao=2" class="items-center flex flex-row" type="button">Produtos <i class="bi-caret-down-fill text-sm"></i> </a>
                <div id="dropdown" class="z-10 absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <p class="bg-gray-100 px-2 cursor-default">Produtos</p>
                            <ul>
                                <li>
                                    <a href="formProduct.php" class="block px-4 py-2 hover:bg-gray-100 ">Cadastrar</a>
                                </li>
                                <li>
                                    <a href="../controllers/produtoController.php?vOpcao=6" class="block px-4 py-2 hover:bg-gray-100 ">Consultar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <p class="bg-gray-100 px-2 cursor-default">Servicos</p>
                            <ul>
                                <li>
                                    <a href="formService.php" class="block px-4 py-2 hover:bg-gray-100 ">Cadastrar</a>
                                </li>
                                <li>
                                    <a href="../controllers/serviceController.php?vOpcao=6" class="block px-4 py-2 hover:bg-gray-100 ">Consultar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            <li><a href="../controllers/vendaController.php?vOpcao=2" class="items-center"><i class="bi-receipt bi"></i> Vendas</a></li>
            <li><a href="showCart.php" class="items-center"><i class="bi bi-cart"></i> Carrinho</a></li>
        </ul>
        <a id="dropdownDefaultButtonUser" data-dropdown-trigger="hover" data-dropdown-toggle="dropdownUser" href="userProfile.php" class="items-center flex flex-row" type="button"><i class="bi-person"></i> <?= $usuario->username ?> <i class="bi-caret-down-fill text-sm"></i></a>
        <div id="dropdownUser" class="z-10 absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButtonUser">
                <li>
                    <a href="../controllers/vendaController.php?vOpcao=4" class="block px-4 py-2 hover:bg-gray-100 ">Minhas encomendas</a>
                </li>
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>