<?php 
    require_once "../classes/address.inc.php";
    require_once "./includes/header.php";

    $endereco = $_SESSION["endereco"];
    $usuario = $_SESSION["user"];
?>

<div class="flex justify-center w-full mb-5 mt-5">
    <form action="../controllers/enderecoController.php?vOption=5" method="post" class=" w-1/3 h-fit items-center flex flex-col gap-2">
        <span class="w-full">
            <p class="text-sm text-gray-500 mb-2">
                <a href="./userProfile.php">Sua conta</a> > <a href="../controllers/enderecoController.php?vOpcao=3">Seus Endereços</a> > <span class="text-pink-500"> Editar endereço</span>
            </p>
            <h1 class="text-xl font-bold">Alterar seu endereo</h1>
        </span>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vNomeReceb">Nome</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vNomeReceb" value="<?= $endereco->receiver ?>">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vTelReceb">Telefone</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vTelReceb" placeholder="(00) 00000-0000" value="<?= $endereco->phone ?>">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vCEP">CEP</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vCep" placeholder="Ex. 00000-000" value="<?= $endereco->postal_code ?>">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vRua">Rua</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vRua" value="<?= $endereco->street ?>">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vBairro">Bairro</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vBairro" value="<?= $endereco->neighborhood ?>">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vCidade">Cidade</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vCidade" value="<?= $endereco->city ?>">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vUf">UF</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vUf" value="<?= $endereco->uf ?>">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vComplemento">Complemento</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vComplemento" placeholder="Apartamento, andar, etc" value="<?= $endereco->complement ?>">
        </div>

        <div class="flex flex-col w-full h-fit gap-0.5">
            <label class="font-semibold" for="vNumero">Numero</label>
            <input class="border border-gray-400 shadow-inner shadow-gray-300 px-1 rounded-md font-light" type="text" name="vNumero" value="<?= $endereco->number ?>">
        </div>
        <input type="text" name="vOpcao" value="5" hidden>
        <span class="w-full">
            <button type="submit" class="px-2 py-1 bg-green-400 rounded-2xl mt-3 hover:bg-green-300">Atualizar endereco</button>
        </span>
    </form>
</div>

<?php require_once "./includes/footer.php" ?>
