<?php 
    require_once "../classes/service.inc.php";
    require_once "includes/header.php";
    $servico = $_SESSION["servico"];
?>
<div class="w-screen flex justify-center items-center pb-60 mt-20">
    <div class="bg-white w-[90vw] sm:w-[60vw] lg:w-[40vw] p-6 shadow-2xl shadow-black border rounded-3xl border-gray-300">
        <form id="form" action="../controllers/carrinhoController.php" class="flex flex-col justify-between h-full" method="post">
            <input type="hidden" name="vOpcao" value="9">
            <input type="hidden" name="id" value="<?=$servico->id?>">

            <!-- Título e Descrição -->
            <div>
                <h1 class="font-bold text-2xl text-center text-gray-800">Descrição do Serviço</h1>
                <p class="text-lg text-center mt-4 text-gray-600"><?=$servico->description?></p>
            </div>

            <div>
                <h1 class="font-bold text-2xl text-center text-gray-800">Preço Base</h1>
                <p class="text-lg text-center mt-4 text-green-600">R$ <?=$servico->price?></p>
            </div>

            <?php foreach ($servico->sizes as $sizeGroup): ?>
            <!-- Opções de Serviço -->
            <div class="mt-6">
                <h2 class="font-semibold text-gray-700 mb-3">Escolha o <?= $sizeGroup[0]->type ?> do Serviço:</h2>
                <div class="flex flex-col space-y-2">
                    <?php foreach ($sizeGroup as $size): ?>

                    <label class='inline-flex items-center'>
                        <input type='radio' name="<?=$size->type?>" value='<?= $size->id ?>' class='form-radio text-blue-600'>
                        <span class='ml-2 text-gray-800'> <?= $size->name ?></span><span class='ml-2 text-green-600'> + R$ <?= $size->price ?></span>
                    </label>

                    <?php endforeach; ?>
                </div>
            </div>

            <?php endforeach ?>
            
            <div class="text-center mt-8">
                <input class="text-lg bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-md transition-colors cursor-pointer" type="submit" value="Adicionar ao Carrinho">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="../script/formSelectServiceSize.js"></script>
<?php require_once "includes/footer.php";?>
