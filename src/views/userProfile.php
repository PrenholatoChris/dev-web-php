<?php
    require_once "../classes/usuario.inc.php";
    require_once "./includes/header.php";

    $usuario = $_SESSION["user"];
?>

<div class="flex w-full h-[calc(100vh-3.5rem)] justify-center items-center">
    <div class="flex flex-row h-fit mt-4 justify-center bg-slate-100 rounded-lg py-4 items-center shadow-lg">
        <div class="flex flex-col w-1/4 h-full mx-20 rounded-full justify-center items-center">
            <div class="w-40 h-40">
                <img class="relative bg-slate-400 rounded-full w-full h-full hover:after:block" src="../assets/user.png" alt="User profile image">
            </div>
        </div>
        <div class="flex flex-col w-full max-w-96 h-full gap-3 pr-4">
            <h1 class="mb-2 font-bold text-4xl">Seu perfil</h1>
            <p class="">Nome: <?= $usuario->username ?> </p>
            <p class="">Email: <?= $usuario->email ?> </p>
            <p class="">CPF: <?= $usuario->cpf ?> </p>
            <p class="flex gap-2">
                Endereços:
                <span class="text-gray-800 bg-amber-300 rounded-md px-1 hover:bg-amber-200 hover:text-black">
                    <a type="button"><a href="../controllers/enderecoController.php?vOpcao=3">Seus enderecos</a>
                </span>
            </p>
            <div class="flex gap-4">
                <a href="formAtualizarUsuario.php" class="text-gray-800 bg-fuchsia-300 rounded-md px-1 hover:bg-fuchsia-200 hover:text-black text-center">
                    Atualizar perfil
                </a>
                <a href="../controllers/usuarioController.php?vOpcao=6" class="text-gray-800 bg-red-300 rounded-md px-1 hover:bg-fuchsia-200 hover:text-black text-center">
                    Sair
                </a>
            </div>
        </div>
    </div>
</div>

<?php
    require_once "./includes/footer.php";
?>