<?php
    require_once "../classes/usuario.inc.php";
    require_once "./includes/header.php";

    $usuario = $_SESSION["user"];
?>

<div class="flex w-full h-[calc(100vh-3.5rem)] justify-center items-center">
    <form action="../controllers/usuarioController.php" method="post" class="flex flex-row h-fit mt-4 justify-center bg-slate-100 rounded-lg py-4 items-center shadow-lg">
        <div class="flex flex-col w-1/4 h-full mx-20 rounded-full justify-center items-center">
            <div class="w-40 h-40 cursor-pointer relative group">
                <img class="relative bg-slate-400 rounded-full w-full h-full hover:after:block" src="../assets/user.png" alt="">
                <button type="button" class="rounded-full absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 bg-blur text-white opacity-0 group-hover:opacity-100">
                    Alterar imagem
                </button>
            </div>
        </div>
        <div class="flex flex-col w-full max-w-96 h-full gap-3 pr-4">
            <h1 class="mb-2 font-bold text-4xl">Editar perfil</h1>
            <div class="flex flex-row gap-2">
                <label for="vName">Nome</label>
                <input name="vName" type="text" class="px-2 rounded-lg" value="<?= $usuario->username ?>"></input>
            </div>
            <div class="flex flex-row gap-2">
                <label for="vEmail">Email</label>
                <input name="vEmail" type="text" class="px-2 rounded-lg" value="<?= $usuario->email ?>"></input>
            </div>
            <!-- <label for="vPhone">Phone</label> -->
            <!-- <input name="vPhone" type="text" class="" value="<?= $usuario->phone ?>"></input> -->
            <input name="vOpcao" type="text" value="5" hidden>
            <button type="submit" class="bg-green-400 py-0.5 px-4 rounded-xl hover:bg-green-300">Atualizar</button>
        </div>
    </form>
</div>

<?php
    require_once "./includes/footer.php";
?>