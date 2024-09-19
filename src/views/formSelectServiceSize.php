<?php 
    require_once "../classes/service.inc.php";
    require_once "includes/header.php";
    $servico = $_SESSION["servico"];
?>
<div class="w-screen items-center flex justify-center ">
    <div class="bg-gray-300 w-[50vw] h-[50vh] p-4 shadow-2xl shadow-black border rounded-3xl border-gray-700">
        <form action="../controllers/carrinhoController.php" class="flex flex-col justify-between h-full" method="post">
            <input type="hidden" name="vOpcao" value="7">
            <input type="hidden" name="id" value="<?=$servico->id?>">
            
            <div>
                <h1 class="font-bold text-xl text-center" >Descrição</h1>
                <p class="text-xl text-center mt-4"><?=$servico->description?></p>
            </div>

            <div>
                <h2>Escolha um dos tipos serviço</h2>
                <?php 
                    $sizes = $servico->sizes;
                    foreach($sizes as $size){
                ?>
                    <input type="radio" name="size_id" value="<?=$size->id?>" id="<?=$size->id?>"><label for=""><?=$size->name ?></label><br>
                <?php 
                }
                ?>
            </div>

            <div class="text-center">
                <input class="text-xl bg-green-300 px-4 rounded-md" type="submit" value="Adicionar ao Carrinho">
            </div>
        </form>

        <!-- <A> OU FORM -->
        
        <!-- <a class="w-36 h-64" href="../controllers/carrinhoController.php?vOpcao=1&id=<?=$servico->id?>"> -->
    </div>
</div>

<?php require_once "includes/footer.php";?>
