<?php 
    require_once "../classes/endereco.php";
    require_once "./includes/header.php";

    $endereco = $_SESSION["endereco"];
?>

<div class="flex justify-center w-full mb-5 mt-5">
    <form action="../controllers/enderecoController.php" method="post" class=" w-1/3 h-fit items-center flex flex-col gap-2">
        <span class="w-full">
            <p class="text-sm text-gray-500 mb-2">
                <a href="">Sua conta</a> > <a href="">Seus Endereços</a> > <span class="text-pink-500"> Novo endereço</span>
            </p>
            <h1 class="text-xl font-bold">Alterar novo endereco</h1>
        </span>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vNomeReceb">Nome</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vNomeReceb">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vTelReceb">Telefone</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vTelReceb" placeholder="(00) 00000-0000">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vCEP">CEP</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vCEP" placeholder="Ex. 00000-000">
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
            <label class="font-semibold" for="vUF">UF</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vUF">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vComplemento">Complemento</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vComplemento" placeholder="Apartamento, andar, etc">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vNumero">Numero</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vNumero">
        </div>
        <input type="text" name="vOpcao" value="5" hidden>
        <span class="w-full">
            <button type="submit" class="px-2 py-1 bg-green-400 rounded-2xl mt-3 hover:bg-green-300">Atualizar endereco</button>
        </span>
    </form>
</div>

<?php require_once "./includes/footer.php" ?>
