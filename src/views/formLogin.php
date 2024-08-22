<?php 
    require_once "./includes/header.php";
?>

<div class="w-full h-[calc(100vh-3.5rem)] flex flex-col justify-center items-center">
    <form action="../controllers/usuarioController.php?vOpcao=2" method="post" class="flex flex-col items-center rounded-lg bg-green-100 shadow-xl shadow-gray-300 max-h-fit w-1/3 px-2 py-3 gap-2">
        <h1 class="text-center font-bold text-2xl">Login</h1>
        <hr class="w-9/12 h-px shadow-sm">
        <div class="w-full flex flex-col mb-1">
            <label for="vLogin">Login</label>
            <?php
                if(isset($_SESSION["emailError"]))
                {
                    echo "<div class='flex flex-row bg-white rounded-md px-2 py-0.5 border border-red-500'>";
                }
                else
                {
                    echo "<div class='flex flex-row bg-white rounded-md px-2 py-0.5'>";
                }
                ?>
            <i class="bi-person-circle mr-2 text-slate-500"></i>
            <input type="text" name="vLogin" class="w-full text-slate-800 focus:outline-none focus:ring-0 focus:border-transparent focus:bg-transparent focus:shadow-none"  name="vEmail" placeholder="Email">
            </div> 
        <?php
            if(isset($_SESSION["emailError"]))
            { 
                echo "<p class='text-red-500 text-xs'>". $_SESSION["emailError"] . "</p>"; 
                unset($_SESSION["emailError"]);
            } 
        ?>
        </div>
        <div class="w-full flex flex-col mb-3">
            <label for="vSenha">Senha</label>
            <?php
                if(isset($_SESSION["senhaError"]))
                {
                    echo "<div class='flex flex-row bg-white rounded-md px-2 py-0.5 border border-red-500'>";
                }
                else
                {
                    echo "<div class='flex flex-row bg-white rounded-md px-2 py-0.5'>";
                }
                ?>
            <i class="bi-lock mr-2 text-slate-400"></i>
            <input type="text" name="vSenha" class="w-full text-slate-800 focus:outline-none focus:ring-0 focus:border-transparent focus:bg-transparent focus:shadow-none" placeholder="Senha">
        </div>
        <?php
            if(isset($_SESSION["senhaError"])) 
            { 
                echo "<p class='text-red-500 text-xs'>". $_SESSION["senhaError"] . "</p>"; 
                unset($_SESSION["senhaError"]);
            } 
        ?>
        </div>
        <input type="text" name="vOpcao" value="2" hidden>
        <button type="submit" class="mt-3 bg-green-400 py-0.5 px-4 rounded-2xl hover:bg-green-300">Entrar</button>
        <div class="flex flex-row text-blue-600 text-xs justify-between w-full h-fit mt-3">
            <a href="./formCadastrar.php">Nao tem conta?</a>
            <a href="">Esqueceu a senha?</a>
        </div>
    </form>
</div>

<?php require_once "./includes/footer.php" ?>