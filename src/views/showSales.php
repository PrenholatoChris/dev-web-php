<?php
    require_once '../classes/sale.inc.php';
    require_once 'includes/header.php';   

    $sales = array();
    if(isset($_SESSION["sales"])){
        $sales = $_SESSION["sales"];
    }
?>

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-center mb-6">Vendas Realizadas</h1>
    <!-- Modal Button -->
<button onclick="openModal()" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
    Filtrar Vendas por Data
</button>

<!-- Modal -->
<div id="filterModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-xl p-6 w-[90vw] md:w-[40vw]">
        <h2 class="text-xl font-bold mb-4 text-center">Filtrar Vendas por Data</h2>
        <form action="../controllers/vendaController.php" method="POST" class="space-y-4">
            <input type="hidden" name="vOpcao" value="2">
            <!-- Data Inicial -->
            <div>
                <label for="datai" class="block text-sm font-medium text-gray-700">Data Inicial</label>
                <input type="date" id="datai" name="datai" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <!-- Data Final -->
            <div>
                <label for="dataf" class="block text-sm font-medium text-gray-700">Data Final</label>
                <input type="date" id="dataf" name="dataf" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <!-- Botões -->
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeModal()" class="bg-gray-300 text-black px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Filtrar</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Função para abrir o modal
    function openModal() {
        document.getElementById("filterModal").classList.remove("hidden");
    }

    // Função para fechar o modal
    function closeModal() {
        document.getElementById("filterModal").classList.add("hidden");
    }
</script>

    <!-- Verifica se existem vendas -->
    <?php if (!empty($sales)): ?>
        <div class="flex flex-col space-y-4 pb-10">
            <?php foreach($sales as $sale): ?>
                <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                    <p class="text-lg"><strong>CPF do Cliente:</strong> <?php echo htmlspecialchars($sale->cpf); ?></p>
                    <p class="text-lg"><strong>Valor Total:</strong> R$ <?php echo number_format($sale->totalValue, 2, ',', '.'); ?></p>
                    <p class="text-lg"><strong>Data da Venda:</strong> <?php echo date('d/m/Y H:i:s', strtotime($sale->date)); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-lg text-gray-600">Nenhuma venda registrada na sessão no momento.</p>
    <?php endif; ?>
</div>


<?php        
    require_once 'includes/footer.php';   
?>
