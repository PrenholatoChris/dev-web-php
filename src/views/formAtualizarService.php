<?php
  require_once "../classes/service.inc.php";
  require_once "../classes/sizes.inc.php";
  require_once "./includes/header.php"; 

  if (isset($_SESSION["servico"])) {
    $servico = $_SESSION["servico"];
  }
?>
<h1 class="text-center font-bold text-xl">Inclusão de servicos</h1>
  
<div class="flex justify-center w-full mb-5 mt-5">
  <form id="form" action="../controllers/serviceController.php" method="post" class="border w-1/3 h-fit items-center flex flex-col gap-2 rounded-xl pt-5 pb-5" enctype="multipart/form-data">
    <div class="columns-md">
      <label for="vName" class="form-label">Nome</label>
      <input type="text" class="border rounded w-max" name="vName" value="<?= $servico->name ?>">
    </div>
    <div class="columns-md">
      <label for="vRef" class="form-label">Referência</label>
      <input type="text" class="border rounded w-max bg-gray-100" name="vRef" value="<?= $servico->reference ?>">
    </div>
    <div class="columns-md">
      <label for="vPrice" class="form-label">Preço base do servico</label>
      <input type="text" class="border rounded w-max" name="vPrice" value="<?= $servico->price ?>">
    </div>
    <div class="columns-md">
      <label for="vDescription" class="form-label">Descrição do produto: </label>
      <textarea class="border rounded w-max h-fit" name="vDescription" rows="6" style="resize: none"><?= $servico->description ?></textarea>    
    </div>
    <div class="columns-md">
      <label for="vImage" class="form-label">Foto:</label>
      <input type="file" class="border rounded w-max" name="vImage">
    </div>
    
    <div class="columns-md">
        <p class="text-xl font-bold mb-4">Tamanhos do Serviço</p>
        <div id="service-form">
            <div class="flex flex-row mb-4">
                <label for="name" class="form-label mr-2">Nome</label>
                <input type="text" id="name" name="name" class="border rounded w-max p-2">
            </div>
            <div class="flex flex-row mb-4">
                <label for="price" class="form-label mr-2">Valor adicional</label>
                <input type="text" id="price" name="price" class="border rounded w-max p-2">
            </div>
            <button type="button" id="add-button" class="bg-blue-500 text-white px-4 py-2 rounded">Adicionar</button>
        </div>

        <table class="mt-4 border-collapse border border-gray-200 w-full">
          <thead>
              <tr>
                  <th class="border border-gray-300 p-2" hidden>ID</th>
                  <th class="border border-gray-300 p-2">Nome</th>
                  <th class="border border-gray-300 p-2">Valor</th>
                  <th class="border border-gray-300 p-2">Operação</th>
              </tr>
          </thead>
          <tbody id="services-table-body">
            <!-- Template para nova linha -->
            <template id="size-template">
              <tr>
                <td class="border border-gray-300 p-2" hidden></td>
                <td class="border border-gray-300 p-2"></td>
                <td class="border border-gray-300 p-2"></td>
                <td class="border border-gray-300 p-2">
                  <button type="button" class="bg-red-500 text-white px-2 py-1 rounded" onclick="removeRow(this)">Remover</button>
                </td>
              </tr>
            </template>

            <!-- Renderizando tamanhos existentes -->
            
                <?php foreach ($servico->sizes as $size): ?>
                    <tr>
                      <td class="border border-gray-300 p-2" hidden><?= $size->id ?></td>
                      <td class="border border-gray-300 p-2"><?= $size->name ?></td>
                      <td class="border border-gray-300 p-2"><?= $size->price ?></td>
                      <td class="border border-gray-300 p-2">
                        <button type="button" class="bg-red-500 text-white px-2 py-1 rounded" onclick="removeRow(this)">Remover</button>
                      </td>
                    </tr>
                <?php endforeach; ?>  
          </tbody>
        </table>
    </div>

    <div class="">
      <button type="submit" class="px-2 py-1 bg-blue-400 rounded w-max-2xl mt-3 hover:bg-blue-300">Atualizar</button>
      <button type="reset" class="px-2 py-1 bg-red-400 rounded w-max-2xl mt-3 hover:bg-red-300">Cancelar</button>
    </div>
    <input type="hidden" name="vOpcao" value="4">
  </form>
</div>

<script type="text/javascript" src="../script/tableService.js"></script>
<?php require_once "./includes/footer.php"; ?>
