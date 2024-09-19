<?php        
      require_once '../classes/product.inc.php';
      require_once 'includes/header.php';   
?>
<main class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-center text-2xl font-bold text-gray-800 mb-6">Produtos do Estoque</h1>

    <div class="flex justify-center">
        <table class="min-w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-4 text-center font-semibold">ID</th>
                    <th class="py-3 px-4 text-center font-semibold">Nome</th>
                    <th class="py-3 px-4 text-center font-semibold">Descrição</th>
                    <th class="py-3 px-4 text-center font-semibold">Preço Unitário</th>
                    <th class="py-3 px-4 text-center font-semibold">Em Estoque</th>
                    <th class="py-3 px-4 text-center font-semibold">Operação</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php
                    $produtos = [];
                    if(isset($_SESSION["produtos"])){
                        $produtos = $_SESSION["produtos"];
        
                        foreach ($produtos as $prd) {
                            echo "<tr class='hover:bg-gray-100 text-center'>";
                            echo "<td class='py-3 px-4 border'>$prd->id</td>";
                            echo "<td class='py-3 px-4 border font-bold'>$prd->name</td>";
                            echo "<td class='py-3 px-4 border'>$prd->description</td>";
                            echo "<td class='py-3 px-4 border'>R$ ".number_format($prd->price, 2, ',', '.')."</td>";
                            echo "<td class='py-3 px-4 border'>$prd->stock</td>";
                            echo "<td class='py-3 px-4 border'>";
                            echo "<a href='../controllers/produtoController.php?vOpcao=2&vId=$prd->id' class='bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600'>A</a> ";
                            echo "<a href='../controllers/produtoController.php?vOpcao=4&vId=$prd->id' class='bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600'>X</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>


<?php
       require_once 'includes/footer.php';
?>

