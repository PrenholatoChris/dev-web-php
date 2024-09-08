<div class="flex flex-col w-80 h-64 p-4 shadow-sm border border-gray-500 gap-1 justify-between">
    <div class="mb-4">
        <h1 class="font-bold text-lg">
            <?php echo ($end->receiver); ?>
        </h1>
        <p>
            <?php 
                echo $end->street . " " . $end->number;
            ?>
        </p>
        <p>
            <?php 
                if($end->complement != null && $end->complement != "")
                {
                    echo $end->complement . " " . $end->neighborhood;
                }
                else
                {
                    echo $end->complement . " " . $end->neighborhood;
                }
            ?>
        </p>
        <p>
            <?php
                echo $end->city . ", " . $end->uf . " " . $end->postal_code;
            ?>
        </p>
        <p>
            <?php
                echo "Telefone: " . $end->phone;
            ?>
        </p>
    </div>
    <div class="flex flex-row gap-2 w-full h-fit">
        <a class="text-blue-600 hover:text-amber-400 hover:underline hover:underline-offset-2)" href="../controllers/enderecoController.php?vOpcao=2&vId=<?php echo $end->id ?>">Editar</a>
        <hr class="w-px h-full bg-black">
        <a class="text-blue-600 hover:text-amber-400 hover:underline hover:underline-offset-2)" href="../controllers/enderecoController.php?vOpcao=4&vId=<?php echo $end->id ?>">Exluir</a>
    </div>
</div>