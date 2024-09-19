<?php
require_once '../classes/item.inc.php';
require_once 'includes/header.php';
?>

<h1 class="text-center font-bold text-xl">Carrinho de compra</h1>
<?php
$carrinho = [];
if (isset($_SESSION["carrinho"])) {
      $carrinho = $_SESSION["carrinho"];
}

?>
<div class="w-full flex justify-center">
      <div class="container w-[80vw] flex-col flex content-center">
            <table class="table table-ligth table-striped border">
                  <thead class="table-danger border">
                        <tr class="align-middle border" style="text-align: center">
                              <th class="border" witdh="10%">Item No</th>
                              <th class="border">Ref.</th>
                              <th class="border">Nome</th>
                              <th class="border">Preço</th>
                              <th class="border">Qde.</th>
                              <th class="border">Total</th>
                              <th class="border">Remover</th>
                        </tr>
                  </thead>
                  <tbody class="table-group-divider">
                        <?php
                        $soma = 0;
                        $count = 0;
                        $count++;

                        foreach ($carrinho as $item) {
                        ?>
                              <tr class="align-middle border" style="text-align: center">
                                    <td class="border"><?= $count ?></td>
                                    <td class="border"><?= $item->getProduto()->id ?></td>
                                    <td class="border"><?= $item->getProduto()->name ?></td>
                                    <td class="border"><?= $item->getProduto()->price ?></td>
                                    <td class="border"><a href="../controllers/carrinhoController.php?vOpcao=6&id=<?= $item->getProduto()->id ?>" class='text-gray-800 bg-red-300 rounded-md px-1 hover:bg-fuchsia-200 hover:text-black text-center'>-</a>
                                          <span><?= $item->getQuantidade() ?></span>
                                          <a href="../controllers/carrinhoController.php?vOpcao=1&id=<?= $item->getProduto()->id ?>" class='text-gray-800 bg-green-300 rounded-md px-1 hover:bg-green-200 hover:text-black text-center self-center'>+</a>
                                    </td>
                                    <td class="border">R$ <?= $item->getValorItem() ?></td>
                                    <td class="border"><a href="../controllers/carrinhoController.php?vOpcao=2&index=<?= $count - 1 ?>" class='text-gray-800 bg-red-400 rounded-md px-1 hover:bg-fuchsia-300 hover:text-black text-center'>X</a></td>
                              </tr>
                        <?php
                              $soma += $item->getValorItem();
                        }
                        ?>

                        <tr align="right">
                              <td colspan="8">
                                    <font face="Verdana" size="4" color="red"><b>Valor Total = R$ <?= $soma ?></b></font>
                              </td>
                        </tr>
            </table>
            <div class="container text-center">
                  <div class="flex justify-around mt-6">
                        <div class="col">
                              <a class="px-4 py-2 bg-amber-300 rounded-md hover:bg-amber-200 hover:text-black" role="button" href="../controllers/produtoController.php?vOpcao=3"><b>Continuar comprando</b></a>
                        </div>
                        <div class="col">
                              <a class="px-4 py-2 text-gray-800 bg-fuchsia-300 rounded-md hover:bg-fuchsia-200 hover:text-black text-center"" role=" button" href="../controllers/carrinhoController.php?vOpcao=3"><b>Esvaziar carrinho</b></a>
                        </div>
                        <div class="col">
                              <a class='px-4 py-2 text-gray-800 bg-green-300 rounded-md hover:bg-green-200 hover:text-black text-center"' role='button' href='../controllers/carrinhoController.php?vOpcao=5&total=<?= $soma ?>'><b>Seguir para a compra</b></a>
                        </div>
                  </div>
            </div>
      </div>
</div>
      <?php
      require_once 'includes/footer.php';
      ?>