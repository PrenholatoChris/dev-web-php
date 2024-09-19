<a class="w-36 h-64" href="../controllers/serviceController.php?vOpcao=7&vId=<?=$servico->id?>"> 
    <!-- TO MODAL -->
    <div class="relative group shadow-md w-full h-full rounded-2xl overflow-hidden cursor-pointer">
        <img src="../assets/images/<?= $servico->reference ?>.jpg" alt="<?= $servico->name ?>" class="w-full h-full object-fit">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-end justify-start opacity-100 group-hover:opacity-0 transition-opacity duration-300">
            <span class="text-white text-xl font-bold ml-2 mb-4"><?= $servico->name ?></span>
        </div>
    </div>
</a>
