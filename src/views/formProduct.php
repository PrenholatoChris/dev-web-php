<?php require_once "./includes/header.php"; ?>
<h1 class="text-center font-bold text-xl">Inclusão de produto</h1>
  
<div class="flex justify-center w-full mb-5 mt-5">
    <form id="form" action="../controllers/produtoController.php?vOpcao=1" method="post" class="border w-1/3 h-fit items-center flex flex-col gap-2 rounded-xl pt-5 pb-5" enctype="multipart/form-data">
  <div class="columns-md">
    <label for="vName" class="form-label">Nome</label>
    <input type="text" class="border rounded w-max" name="vName">
  </div>
  <div class="columns-md">
    <label for="vRef" class="form-label">Referência</label>
    <input type="text" class="border rounded w-max" name="vRef">
  </div>
  <div class="columns-md">
    <label for="vPrice" class="form-label">Preço</label>
    <input type="text" class="border rounded w-max" name="vPrice">
  </div>
  <div class="columns-md">
    <label for="vStock" class="form-label">Qde Estoque</label>
    <input type="text" class="border rounded w-auto" name="vStock">
  </div>
  <div class="columns-md">
    <label for="vImage" class="form-label">Foto:</label>
    <input type="file" class="border rounded w-max" name="vImage">
  </div>
  <div class="columns-md">
    <label for="vDescription" class="form-label">Descrição do produto: </label>
    <textarea class="border rounded w-max h-fit" name="vDescription" rows="6" style="resize: none"></textarea>    
  </div>
  <div class="columns-md">
    <label for="vType" class="form-label">Tipo de produto:</label>
    <input type="radio" id="p" name="vType" value="p"><label for="p">Produto</label>
    <input type="radio" id="s" name="vType" value="s"><label for="s">Servico</label>
  </div>
  <div class="">
    <button type="submit" class="px-2 py-1 bg-green-400 rounded w-max-2xl mt-3 hover:bg-green-300">Incluir</button>
    <button type="reset" class="px-2 py-1 bg-red-400 rounded w-max-2xl mt-3 hover:bg-red-300">Cancelar</button>
  </div>
  <input type="hidden" name="vOpcao" value="1">
</form>
</div>

<?php require_once "./includes/footer.php"; ?>

