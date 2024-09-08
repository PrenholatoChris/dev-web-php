<?php 
    require_once "../classes/address.inc.php";
    require_once "../classes/usuario.inc.php";
    require_once "./includes/header.php";

    $endereco = array();
    if(isset($_SESSION["enderecos"])){
        $endereco = $_SESSION["enderecos"];
    }
?>

<div class="flex justify-center w-full h-full mb-5 mt-5">
    <div class="h-full items-center flex flex-col gap-2">
        <span class="w-full mb-5">
            <p class="text-sm text-gray-500 mb-2">
                <a href="userProfile.php">Sua conta</a> > <span class="text-pink-500"> Seus endereços</span>
            </p>
            <h1 class="text-2xl font-bold">Seus endereços</h1>
        </span>
        
        <div class="w-full f-full gap-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Card para adicinar novos enderecos -->
            <a href="./formCadastroEndereco.php" class="flex flex-col justify-center items-center w-80 h-64 p-4 shadow-sm border border-dashed border-gray-500 gap-1">
                <i class="bi-plus-lg text-5xl text-gray-500"></i>
                <span class="text-lg font-bold text-gray-700">Adicionar endereço</span>
            </a>

            <?php
                if(!empty($endereco)){
                    foreach($endereco as $end){
                        include "./includes/cardEndereco.php";
                    }
                }  
            ?>
        </div>
    </div>
</div>

<?php require_once "./includes/footer.php" ?>
