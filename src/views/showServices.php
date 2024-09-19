<?php        
      require_once '../classes/service.inc.php';
      require_once 'includes/header.php';   

      $servicos = array();

      if(isset($_SESSION["servicos"])){
            $servicos = $_SESSION["servicos"];
      }
?>
<main class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-center text-2xl font-bold text-gray-800 mb-6">Serviços Cadastrados</h1>

    <div class="flex justify-center">
        <table class="min-w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-4 text-center font-semibold">ID</th>
                    <th class="py-3 px-4 text-center font-semibold">Nome</th>
                    <th class="py-3 px-4 text-center font-semibold">Descrição</th>
                    <th class="py-3 px-4 text-center font-semibold">Preço Base</th>
                    <th class="py-3 px-4 text-center font-semibold">Operação</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php 
                    foreach ($servicos as $servi) {
                ?>
                    <tr class="hover:bg-gray-100 text-center">
                        <td class="py-3 px-4 border"><?= $servi->id ?></td>
                        <td class="py-3 px-4 border font-bold"><?= $servi->name ?></td>
                        <td class="py-3 px-4 border"><?= $servi->description ?></td>
                        <td class="py-3 px-4 border">R$ <?= number_format($servi->price, 2, ',', '.') ?></td>
                        <td class="py-3 px-4 border">
                            <a href='../controllers/serviceController.php?vOpcao=3&vId=<?= $servi->id ?>' class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">A</a>
                            <a href='../controllers/serviceController.php?vOpcao=5&vId=<?= $servi->id ?>' class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">X</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>  
        </table>
    </div>
</main>


<?php
       require_once 'includes/footer.php';
?>

