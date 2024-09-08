<?php
    require_once "../classes/usuario.inc.php";
    require_once "./includes/header.php";

    $usuario = $_SESSION["user"];
?>

<div class="flex justify-center w-full mb-5 mt-5">
    <form id="form" action="../controllers/enderecoController.php?vOpcao=1&vUserId=<?= $usuario->id ?>" method="post" class=" w-1/3 h-fit items-center flex flex-col gap-2">
        <span class="w-full">
            <p class="text-sm text-gray-500 mb-2">
                <a href="./userProfile.php">Sua conta</a> > <a href="../controllers/enderecoController.php?vOpcao=3">Seus Endereços</a> > <span class="text-pink-500"> Novo endereço</span>
            </p>
            <h1 class="text-xl font-bold">Adicionar novo endereco</h1>
        </span>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vNomeReceb">Nome do Recebedor</label>
            <input  value="<?= $usuario->username ?>" class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vNomeReceb">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vTelReceb">Telefone</label>
            <input id="phone" class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vTelReceb" placeholder="(00) 00000-0000">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vCep">CEP</label>
            <input id="cep" class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vCep" placeholder="Ex. 00000-000">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vRua">Rua</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vRua">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vBairro">Bairro</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vBairro">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vCidade">Cidade</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vCidade">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vUf">UF</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vUf">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vComplemento">Complemento</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vComplemento" placeholder="Apartamento, andar, etc">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vNumero">Numero</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vNumero">
        </div>
        <input type="text" name="vOpcao" value="1" hidden>
        <span class="w-full">
            <button type="submit" class="px-2 py-1 bg-green-400 rounded-2xl mt-3 hover:bg-green-300">Salvar endereco</button>
        </span>
    </form>
</div>

<script src="../script/phone-script.js"></script>
<script src="../script/cep-script.js"></script>
<?php require_once "./includes/footer.php" ?>
