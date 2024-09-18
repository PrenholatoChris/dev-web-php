<?php
require_once "../classes/address.inc.php";
require_once "../classes/usuario.inc.php";
include_once "includes/header.php";

$enderecos = array();
if (isset($_SESSION["enderecos"])) {
    $enderecos = $_SESSION["enderecos"];
}
?>
<form action="../controllers/enderecoController.php" method="post">
    <input type="hidden" name="vOpcao" value="7">

    <div class="flex justify-center w-full h-full mb-5 mt-5">
        <div class="h-full items-center flex flex-col gap-2">
            <span class="w-full mb-5">
                <p class="text-sm text-gray-500 mb-2">
                    <a href="userProfile.php">Sua conta</a> > <span class="text-pink-500"> Seus endereços</span>
                </p>
                <h1 class="text-2xl font-bold">Selecione o destino de entrega da compra</h1>
            </span>
            <div class="w-full f-full gap-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">

                <?php
                if (!empty($enderecos)) {
                    foreach ($enderecos as $end) {
                        echo "<div class='hover:bg-blue-200 flex justify-center shadow-sm border border-gray-500 gap-1 enderecos w-[100%]'>
                                <div class='flex justify-center w-[100%]'>
                                    <input class='hidden' type='radio' value='$end->id' name='vId' id='$end->id'>
                                    <label class='checked:bg-blue-300 font-bold text-center text-lg w-[100%]' for='$end->id'> $end->receiver</label>
                                </div>
                            </div>";
                    }
                } else {
                    echo "Cadastrar endereço...";
                }

                ?>
            </div>
            <style>
                .enderecos:has(input[type=radio]:checked) {
                    background-color: #93c5fd;
                }
            </style>
            <button class='px-4 py-2 text-gray-800 bg-green-300 rounded-md hover:bg-green-200 hover:text-black text-center' type="submit">Finalizar Compra</button>

        </div>
    </div>
</form>

<?php
include_once "includes/footer.php";
?>