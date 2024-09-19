
<?php 
  require_once "../classes/product.inc.php"; 
  require_once "../classes/service.inc.php"; 
  require_once "./includes/cardProduto.php";
  require_once "./includes/header.php";

  $produtos = array();
  $servicos = array();

  if(isset($_SESSION["produtos"])){
    $produtos = $_SESSION["produtos"];
  }
  if(isset($_SESSION["servicos"])){
    $servicos = $_SESSION["servicos"];
  }
?>
<div class="min-h-screen bg-gray-100 flex flex-col justify-between">
    <!-- Main Content -->
    <form class="bg-white shadow-md rounded-lg p-2 w-full flex justify-center items-center" action="../controllers/serviceController.php" method="POST">
      <div class="flex items-center">
        <input
          type="text"
          name="vBusca"
          placeholder="Buscar..."
          class="flex-grow p-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        <input type="text" name="vOpcao" value="8" hidden>
        <button type="submit" class="p-2 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600">
          <i class="bi-search"></i>
        </button>
      </div>
    </form>
    <main class="flex-grow container mx-auto py-8">
        <section class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Cartela de Serviços</h1>
        </section>

        <!-- Carousel de Serviços -->
        <div class="relative py-3 mx-10">
            <!-- Controles de navegação -->
            <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white px-4 py-2 rounded-full z-10">❮</button>
            <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white px-4 py-2 rounded-full z-10">❯</button>

            <!-- Container do carrossel -->
            <div id="carousel" class="flex space-x-4 overflow-x-auto scroll-smooth snap-x snap-mandatory justify-center pb-3">
                <!-- Inserir aqui os cards dos serviços -->
                <?php
                  foreach($servicos as $servico){
                    include "./includes/cardServico.php";
                  }
                  if(empty($servicos)){
                    echo "<h1 class='text-center'>Nenhum servico encontrado</h1>";
                  }
                ?>
            </div>
        </div>

        <?php
          if(!empty($produtos)):
        ?>
        <hr class="my-8 border-gray-300">

        <!-- Showroom de Produtos -->
        <section class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Showroom de Produtos</h2>
        </section>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mx-10">
          <?php
            foreach($produtos as $prod){
              cardProd($prod->id, $prod->name, $prod->description, $prod->price, $prod->ref);
            }
          ?>
        </div>
        
        <?php 
          endif; 
        ?>
    </main>

</div>

<?php require_once "./includes/footer.php" ?>
