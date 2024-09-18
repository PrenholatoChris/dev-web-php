<?php        
      require_once '../classes/service.inc.php';
      require_once 'includes/header.php';   

      $servicos = array();

      if(isset($_SESSION["servicos"])){
            $servicos = $_SESSION["servicos"];
      }
?>
<h1 class="text-center text-xl font-bold">Servicos cadastrados</h1>
<div class="flex justify-center">
      <table class="table table-light table-hover">
            <thead class="table-primary">
                  <tr class="align-middle" style="text-align: center">
                  <th witdh="10%">ID</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Preço base</th>
                  <th>Operação</th>
                  </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php 
                  foreach ($servicos as $servi) {
            ?>
                  <tr align='center'>
                  <td class='border'> <?= $servi->id ?> </td>
                  <td class='border'> <strong><?= $servi->name ?></strong> </td>
                  <td class='border'> <?= $servi->description ?> </td>
                  <td class='border'> <?= $servi->price ?> </td>
                  <td class='border'>
                        <a href='../controllers/serviceController.php?vOpcao=3&vId= <?= $servi->id ?> ' class='btn btn-success btn-sm'>A</a> 
                        <a href='../controllers/serviceController.php?vOpcao=5&vId= <?= $servi->id ?> ' class='btn btn-danger btn-sm'>X</a>
                  </td>
                  <tr>
            <?php
                  }
            ?>
            </tbody>  
      </table>
</div>

<?php
       require_once 'includes/footer.php';
?>

