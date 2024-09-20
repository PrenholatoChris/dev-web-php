<?php 
  require_once "../classes/product.inc.php"; 
  require_once "./includes/header.php"; 
  $prod = $_SESSION["produto"];
?>

<h1 class="text-center font-bold text-xl">Atualizar Produto</h1>
<main class="flex justify-center w-full my-10">
  
    <form id="form" action="../controllers/produtoController.php" method="post" class="border w-1/3 bg-white shadow-lg p-6 rounded-xl flex flex-col gap-4" enctype="multipart/form-data">
        
        <div class="flex flex-col gap-2">
            <label for="vName" class="font-semibold text-gray-700">Nome</label>
            <input type="text" class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" name="vName" value="<?= $prod->name ?>" placeholder="Digite o nome do produto">
        </div>

        <div class="flex flex-col gap-2">
            <label for="vRef" class="font-semibold text-gray-700">Referência</label>
            <input type="text" class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" name="vRef" value="<?= $prod->ref ?>" placeholder="Digite a referência">
        </div>

        <div class="flex flex-col gap-2">
            <label for="vPrice" class="font-semibold text-gray-700">Preço</label>
            <input type="text" class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" name="vPrice" value="<?= $prod->price ?>" placeholder="Digite o preço">
        </div>

        <div class="flex flex-col gap-2">
            <label for="vStock" class="font-semibold text-gray-700">Quantidade em Estoque</label>
            <input type="text" class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" name="vStock" value="<?= $prod->stock ?>" placeholder="Digite a quantidade">
        </div>

        <div class="flex flex-col gap-2">
            <label for="vImage" class="font-semibold text-gray-700">Foto:</label>
            <input type="file" class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" name="vImage">
        </div>

        <div class="flex flex-col gap-2">
            <label for="vDescription" class="font-semibold text-gray-700">Descrição do produto:</label>
            <textarea class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" name="vDescription" rows="6" style="resize: none" placeholder="Digite a descrição do produto"><?= $prod->description ?></textarea>    
        </div>

        <input type="hidden" name="vType" value="p">

        <div class="flex gap-4 justify-between mt-4">
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400 transition duration-200">Atualizar</button>
            <button type="reset" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-400 transition duration-200">Cancelar</button>
        </div>

        <input type="hidden" name="vOpcao" value="5">
        <input type="hidden" name="vId" value="<?=$prod->id?>">
    </form>
</main>

<?php require_once "./includes/footer.php"; ?>

