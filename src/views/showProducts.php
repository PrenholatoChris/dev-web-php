<?php        
      require_once '../classes/product.inc.php';
      require_once 'includes/header.php';   
?>
<h1 class="text-center text-xl font-bold">Produtos do estoque</h1>
<div class="flex justify-center">
      <table class="table table-light table-hover">
            <thead class="table-primary">
                  <tr class="align-middle" style="text-align: center">
                  <th witdh="10%">ID</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Preço unitário</th>
                  <th>Em Estoque</th>
                  <th>Operação</th>
                  </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php
                  $produtos = [];
                  if(isset($_SESSION["produtos"])){
                        $produtos = $_SESSION["produtos"];
      
                  foreach ($produtos as $prd) {
                        echo "<tr align='center'>";
                        echo "<td class='border'>"."$prd->id"."</td>";
                        echo "<td class='border'><strong>"."$prd->name"."</strong></td>";
                        echo "<td class='border'>"."$prd->description"."</td>";
                        echo "<td class='border'>"."$prd->price"."</td>";
                        echo "<td class='border'>"."$prd->stock"."</td>";
                        echo "<td class='border'>";
                              echo "<a href='../controllers/produtoController.php?vOpcao=2&vId=$prd->id' class='btn btn-success btn-sm'>A</a> ";
                              echo "<a href='../controllers/produtoController.php?vOpcao=4&vId=$prd->id' class='btn btn-danger btn-sm'>X</a>
                        </td>";
                        echo "</tr>";
                        }
                  }
            ?>
            </tbody>  
      </table>
</div>

<?php
       require_once 'includes/footer.php';
?>

