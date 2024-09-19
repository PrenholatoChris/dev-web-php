<?php
require_once '../classes/item.inc.php';
require_once 'includes/header.php';
?>

<h1 class="text-center font-bold text-xl mt-5">Carrinho de compra</h1>
<?php
$carrinho = [];
if (isset($_SESSION["carrinho"])) {
      $carrinho = $_SESSION["carrinho"];
}

?>
<main class="w-full flex justify-center pb-40 mt-5">
      <div class="container w-[80vw] flex flex-col items-center">
            <table class="w-full table-auto border-collapse shadow-lg">
                  <thead class="bg-red-300">
                        <tr class="text-center">
                              <th class="border px-4 py-2">Item No</th>
                              <th class="border px-4 py-2">Ref.</th>
                              <th class="border px-4 py-2">Nome</th>
                              <th class="border px-4 py-2">Preço</th>
                              <th class="border px-4 py-2">Qde.</th>
                              <th class="border px-4 py-2">Total</th>
                              <th class="border px-4 py-2">Remover</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php
                        $soma = 0;
                        $count = 0;
                        foreach ($carrinho as $item) {
                              $count++;
                        ?>
                              <tr class="text-center">
                                    <td class="border px-4 py-2"><?= $count ?></td>
                                    <td class="border px-4 py-2"><?= $item->getProduto()->id ?></td>
                                    <td class="border px-4 py-2"><?= $item->getProduto()->name ?></td>
                                    <td class="border px-4 py-2">R$ <?= $item->getProduto()->price ?></td>
                                    <td class="border px-4 py-2">
                                          <?php if ($item->getSizeId() == -1) { ?>
                                                <a href="../controllers/carrinhoController.php?vOpcao=6&id=<?= $item->getProduto()->id ?>" class="text-gray-800 bg-red-300 rounded-md px-2 hover:bg-fuchsia-200">-</a>
                                                <span><?= $item->getQuantidade() ?></span>
                                                <a href="../controllers/carrinhoController.php?vOpcao=1&id=<?= $item->getProduto()->id ?>" class="text-gray-800 bg-green-300 rounded-md px-2 hover:bg-green-200">+</a>
                                          <?php } else { ?>
                                                <a href="../controllers/carrinhoController.php?vOpcao=8&id=<?= $item->getProduto()->id ?>&size_id=<?= $item->getSizeId() ?>" class="text-gray-800 bg-red-300 rounded-md px-2 hover:bg-fuchsia-200">-</a>
                                                <span><?= $item->getQuantidade() ?></span>
                                                <a href="../controllers/carrinhoController.php?vOpcao=7&id=<?= $item->getProduto()->id ?>&size_id=<?= $item->getSizeId() ?>" class="text-gray-800 bg-green-300 rounded-md px-2 hover:bg-green-200">+</a>
                                          <?php } ?>
                                    </td>
                                    <td class="border px-4 py-2">R$ <?= $item->getValorItem() ?></td>
                                    <td class="border px-4 py-2">
                                          <a href="../controllers/carrinhoController.php?vOpcao=2&index=<?= $count - 1 ?>" class="text-white bg-red-400 rounded-md px-2 hover:bg-fuchsia-300">X</a>
                                    </td>
                              </tr>
                        <?php
                              $soma += $item->getValorItem();
                        }
                        ?>
                  </tbody>
                  <tfoot>
                        <tr>
                              <td colspan="7" class="text-right px-4 py-2 font-semibold text-lg">
                                    <span class="text-red-600">Valor Total = R$ <?= $soma ?></span>
                              </td>
                        </tr>
                  </tfoot>
            </table>

            <div class="flex justify-between w-full mt-6">
                  <a class="px-4 py-2 bg-amber-300 text-center rounded-md hover:bg-amber-200" href="../controllers/produtoController.php?vOpcao=3"><b>Continuar comprando</b></a>
                  <a class="px-4 py-2 bg-fuchsia-300 text-center rounded-md hover:bg-fuchsia-200" href="../controllers/carrinhoController.php?vOpcao=3"><b>Esvaziar carrinho</b></a>
                  <a class="px-4 py-2 bg-green-300 text-center rounded-md hover:bg-green-200" href="../controllers/carrinhoController.php?vOpcao=5&total=<?= $soma ?>"><b>Seguir para a compra</b></a>
            </div>
      </div>
</main>

<?php
require_once 'includes/footer.php';
?>