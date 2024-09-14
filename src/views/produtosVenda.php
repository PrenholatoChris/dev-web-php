
<?php require_once "../classes/product.inc.php" ?>
<?php require_once "./includes/header.php" ?>
<?php require_once "./includes/cardProduto.php" ?>

<h1 class="text-center font-bold text-xl">Show room de produtos</h1>


<!-- <div class="w-screen flex justify-center "> -->
<div class="flex justify-center w-full h-full mb-5 mt-5">
    <div class="h-full items-center flex flex-col">
      <div class="w-full f-full gap-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">

    <?php
      $produtos = $_SESSION["produtos"];
      foreach($produtos as $prod){
        cardProd($prod->id, $prod->name, $prod->description, $prod->price, $prod->ref);
    ?>

    <?php 
     }
      ?>
    </div>
  </div>
</div>

<?php require_once "./includes/footer.php" ?>
