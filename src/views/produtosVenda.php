
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

<h1 class="text-center text-xl font-bold">Cartela de Servicos</h1>

<div class="relative py-3 mx-10">
  <!-- Controles de navegação -->
  <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white px-4 py-2 rounded-full z-10">
    &#10094;
  </button>
  <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white px-4 py-2 rounded-full z-10">
    &#10095;
  </button>

  <!-- Container do carrossel -->
  <div id="carousel" class="flex space-x-4 overflow-x-auto scroll-smooth snap-x snap-mandatory justify-center pb-3 min-w-fit">
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





<hr class="w-full h-1 opacity-35 bg-gray-700">
<h1 class="text-center font-bold text-xl">Show room de produtos</h1>
<!-- <div class="w-screen flex justify-center "> -->
<div class="flex justify-center w-full h-full mb-5 mt-5">
    <div class="h-full items-center flex flex-col">
      <div class="w-full f-full gap-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">

      <?php
        foreach($produtos as $prod){
          cardProd($prod->id, $prod->name, $prod->description, $prod->price, $prod->ref);
        }
      ?>
    </div>
  </div>
</div>

<script src="../script/carrossel.js"></script>
<?php require_once "./includes/footer.php" ?>
