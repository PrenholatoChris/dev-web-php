<?php require_once "./includes/header.php" ?>

<div class="w-full h-[calc(100vh-4rem)] flex flex-col justify-center items-center">
    <form action="../controllers/usuarioController.php" method="post" class="flex flex-col items-center rounded-lg bg-green-100 shadow-xl shadow-gray-300 max-h-fit w-1/3 px-2 py-3 gap-2">
        <h1 class="text-center font-bold text-2xl">Cadastrar</h1>
        <input type="hidden" name="vOpcao" value="1">
        <hr class="w-9/12 h-px shadow-sm">
        <div class="w-full flex flex-col mb-1">
            <label for="vNome">Nome</label>
            <div class="flex flex-row bg-white rounded-md px-2 py-0.5">
               <i class="bi-person-circle mr-2 text-slate-500"></i>
               <input type="text" name="vNome" class="w-full text-slate-800 focus:outline-none focus:ring-0 focus:border-transparent focus:bg-transparent focus:shadow-none" placeholder="Nome">
            </div> 
        </div>
        <div class="w-full flex flex-col mb-1">
            <label for="vEmail">Email</label>
            <div class="flex flex-row bg-white rounded-md px-2 py-0.5">
               <i class="bi-envelope mr-2 text-slate-500"></i>
               <input type="text" name="vEmail" class="w-full text-slate-800 focus:outline-none focus:ring-0 focus:border-transparent focus:bg-transparent focus:shadow-none" placeholder="seuEmail@email.com">
            </div> 
        </div>
        <div class="w-full flex flex-col mb-1">
            <label for="vSenha">Senha</label>
            <div class="flex flex-row bg-white rounded-md px-2 py-0.5">
                <i class="bi-lock mr-2 text-slate-400"></i>
                <input type="text" name="vSenha" class="w-full text-slate-800 focus:outline-none focus:ring-0 focus:border-transparent focus:bg-transparent focus:shadow-none" placeholder="Senha">
            </div>
        </div>
        <div class="w-full flex flex-col mb-6">
            <label for="vSenhaConf">Confirmar Senha</label>
            <div class="flex flex-row bg-white rounded-md px-2 py-0.5">
                <i class="bi-lock mr-2 text-slate-400"></i>
                <input type="text" name="vSenhaConf" class="w-full text-slate-800 focus:outline-none focus:ring-0 focus:border-transparent focus:bg-transparent focus:shadow-none" placeholder="Senha">
            </div>
        </div>
        <input type="text" name="vOpcao" value="1" hidden>
        <button type="submit" class="bg-blue-400 py-0.5 px-4 rounded-2xl hover:bg-blue-300">Cadastrar</button>
        <div class="flex flex-row justify-center text-stone-600 text-xs w-full h-fit underline">
            <a href="./formLogin.php">Ja tenho conta</a>
        </div>
    </form>
</div>

<?php require_once "./includes/footer.php" ?>