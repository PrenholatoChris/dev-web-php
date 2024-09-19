<?php
  require_once "../classes/service.inc.php";
  require_once "../classes/sizes.inc.php";
  require_once "./includes/header.php"; 

  if (isset($_SESSION["servico"])) {
    $servico = $_SESSION["servico"];
  }
?>
<h1 class="text-center font-bold text-xl">Atualizar servico</h1>
  
<div class="flex justify-center w-full mb-5 mt-5">
  <form id="form" action="../controllers/serviceController.php" method="post" class="border w-1/3 h-fit items-center flex flex-col gap-4 rounded-xl p-6 bg-white shadow-lg" enctype="multipart/form-data">
    
    <div class="w-full">
      <label for="vName" class="block text-sm font-medium text-gray-700">Nome</label>
      <input value="<?= $servico->name ?>" type="text" class="border rounded w-full p-2 mt-1 focus:ring focus:ring-blue-300" name="vName" required>
    </div>
    
    <div class="w-full">
      <label for="vRef" class="block text-sm font-medium text-gray-700">Referência</label>
      <input value="<?= $servico->reference ?>" type="text" class="border rounded w-full p-2 mt-1 focus:ring focus:ring-blue-300" name="vRef" required>
    </div>

    <div class="w-full">
      <label for="vRef" class="block text-sm font-medium text-gray-700">Category</label>
      <input value="<?= $servico->category ?>" type="text" class="border rounded w-full p-2 mt-1 focus:ring focus:ring-blue-300" name="vCategory" required>
    </div>
    
    <div class="w-full">
      <label for="vPrice" class="block text-sm font-medium text-gray-700">Preço base do serviço</label>
      <input value="<?= $servico->price ?>" type="text" class="border rounded w-full p-2 mt-1 focus:ring focus:ring-blue-300" name="vPrice" required>
    </div>
    
    <div class="w-full">
      <label for="vDescription" class="block text-sm font-medium text-gray-700">Descrição do servico:</label>
      <textarea class="border rounded w-full h-fit p-2 mt-1 focus:ring focus:ring-blue-300" name="vDescription" rows="6" style="resize: none" required>
        <?= $servico->description ?>
      </textarea>    
    </div>
    
    <div class="w-full">
      <label for="vImage" class="block text-sm font-medium text-gray-700">Foto:</label>
      <input type="file" class="border rounded w-full p-2 mt-1 focus:ring focus:ring-blue-300" name="vImage">
    </div>

    <div class="flex flex-col w-full">
      <h2 class="text-xl font-bold">Adicionar nova propriedade</h2>
      <div class="flex">
        <label for="name" class="form-label mr-2">Nome</label>
        <input type="text" id="tipoNovaPropriedade" class="flex flex-row mb-4 border rounded w-full p-2 mt-1 focus:ring focus:ring-blue-300">
      </div>
      <button type="button" id="duplicate-button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nova propriedade</button>
    </div>

    <?php
      if(empty($servico->sizes) && count($servico->sizes) == 0 ):
    ?>

      <div id="services-container" class="w-full mt-4">
        <p class="text-xl font-bold mb-2">Tamanho do Serviço</p>
        <div id="service-form" class="flex flex-col mb-4">
            <div class="flex flex-row mb-2">
                <label for="name" class="form-label mr-2">Nome</label>
                <input type="text" id="name" name="name" class="border rounded w-full p-2">
            </div>
            <div class="flex flex-row mb-4">
                <label for="price" class="form-label mr-2">Valor adicional</label>
                <input type="text" id="price" name="price" class="border rounded w-full p-2">
            </div>
            <button type="button" id="add-button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="addRow(this)">Adicionar</button>
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
            <tbody id="services-table-body" data-tipo='tamanho'>
              <!-- Template para nova linha -->
              <template id="size-template">
                <tr>
                  <td class="border border-gray-300 p-2" hidden></td>
                  <td class="border border-gray-300 p-2"></td>
                  <td class="border border-gray-300 p-2"></td>
                  <td class="border border-gray-300 p-2">
                    <button type="button" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="removeRow(this)">Remover</button>
                  </td>
                </tr>
              </template>
            </tbody>
        </table>
      </div>

    <?php    
      endif;

      
      foreach ($servico->sizes as $sizeGroup):
    ?>
    <div id="services-container" class="w-full mt-4">
      <p class="text-xl font-bold mb-2"><?= $sizeGroup[0]->type ?> do Serviço</p>
      <div id="service-form" class="flex flex-col mb-4">
          <div class="flex flex-row mb-2">
              <label for="name" class="form-label mr-2">Nome</label>
              <input type="text" id="name" name="name" class="border rounded w-full p-2">
          </div>
          <div class="flex flex-row mb-4">
              <label for="price" class="form-label mr-2">Valor adicional</label>
              <input type="text" id="price" name="price" class="border rounded w-full p-2">
          </div>
          <button type="button" id="add-button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="addRow(this)">Adicionar</button>
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
          <tbody id="services-table-body" data-tipo='<?= $sizeGroup[0]->type ?>'>
            <!-- Template para nova linha -->
            <template id="size-template">
              <tr>
                <td class="border border-gray-300 p-2" hidden></td>
                <td class="border border-gray-300 p-2"></td>
                <td class="border border-gray-300 p-2"></td>
                <td class="border border-gray-300 p-2">
                  <button type="button" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="removeRow(this)">Remover</button>
                </td>
              </tr>
            </template>

            <?php
              foreach($sizeGroup as $size):
            ?>

              <tr>
                <td class="border border-gray-300 p-2" hidden> <?= $size->id ?> </td>
                <td class="border border-gray-300 p-2"> <?= $size->name ?> </td>
                <td class="border border-gray-300 p-2"> <?= $size->price ?> </td>
                <td class="border border-gray-300 p-2">
                  <button type="button" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="removeRow(this)">Remover</button>
                </td>
              </tr>

            <?php
              endforeach;
            ?>

          </tbody>
      </table>
    </div>
    <?php
      endforeach;
    ?>

    <div class="flex justify-between w-full mt-4">
      <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Atualizar</button>
      <button type="reset" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Cancelar</button>
    </div>
    
    <input type="hidden" name="vOpcao" value="4">
  </form>
</div>

<script type="text/javascript" src="../script/propertieDuplicator.js"></script>
<script type="text/javascript" src="../script/tableService.js"></script>
<?php require_once "./includes/footer.php"; ?>
