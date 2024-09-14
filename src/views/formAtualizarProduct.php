<?php 
  require_once "../classes/product.inc.php"; 
  require_once "./includes/header.php"; 
  $prod = $_SESSION["produto"];
?>
<h1 class="text-center font-bold text-xl">Inclusão de produto</h1>
  
<div class="flex justify-center w-full mb-5 mt-5">
    <form id="form" action="../controllers/produtoController.php?vOpcao=1" method="post" class="border w-1/3 h-fit items-center flex flex-col gap-2 rounded-xl pt-5 pb-5" enctype="multipart/form-data">
  <div class="columns-md">
    <label for="vName" class="form-label">Nome</label>
    <input type="text" class="border rounded w-max" value="<?= $prod->name ?>" name="vName">
  </div>
  <div class="columns-md">
    <label for="vRef" class="form-label">Referência</label>
    <input type="text" class="border rounded w-max" value="<?= $prod->ref ?>" name="vRef">
  </div>
  <div class="columns-md">
    <label for="vPrice" class="form-label">Preço</label>
    <input type="text" class="border rounded w-max" value="<?= $prod->price ?>" name="vPrice">
  </div>
  <div class="columns-md">
    <label for="vStock" class="form-label">Qde Estoque</label>
    <input type="text" class="border rounded w-auto" value="<?= $prod->stock ?>" name="vStock">
  </div>
  <div class="columns-md">
    <label for="vImage" class="form-label">Foto:</label>
    <input type="file" class="border rounded w-max" name="vImage" value="<?="../assets/product/$prod->ref.jpg"?>"> 
  </div>
  <div class="columns-md">
    <div><label for="vDescription" class="form-label relative top-0">Descrição do produto: </label></div>
    <textarea class="border rounded w-60 h-fit" name="vDescription" rows="6" style="resize: none"><?= $prod->description ?></textarea>    
  </div>
  <div class="columns-md">
    <label for="vType" value="<?=$prod->type?>" class="form-label">Tipo de produto:</label>
    <input type="radio" <?php if($prod->type =='p'){echo "checked";}?> id="p" name="vType" value="p"><label for="p">Produto</label>
    <input type="radio" <?php if($prod->type =='s'){echo "checked";}?> id="s" name="vType" value="s"><label for="s">Servico</label>
  </div>
  <div class="">
    <button type="submit" class="px-2 py-1 bg-green-400 rounded w-max-2xl mt-3 hover:bg-green-300">Incluir</button>
    <button type="reset" class="px-2 py-1 bg-red-400 rounded w-max-2xl mt-3 hover:bg-red-300">Cancelar</button>
  </div>
  <input type="hidden" name="vOpcao" value="1">
</form>
</div>

<?php require_once "./includes/footer.php"; ?>

