<div class="flex flex-col w-full h-full p-4 shadow-sm border border-gray-500 gap-1 justify-between">
    <div>
        <h1 class="font-semibold">
            <?= $user->nome ?>
        </h1>
        <p>
            <?php 
                echo $endereco->rua . " " . $endereco->numero;
            ?>
        </p>
        <p>
            <?php 
                if($endereco->complemento != null && $endereco->complemento != "")
                {
                    echo $endereco->complemento . " " . $endereco->bairro;
                }
                else
                {
                    echo $endereco->complemento . " " . $endereco->bairro;
                }
            ?>
        </p>
        <p>
            <?php
                echo $endereco->cidade . ", " . $endereco->uf . " " . $endereco->cep;
            ?>
        </p>
    </div>
    <div class="felx flex-row gap-2 w-full h-fit">
        <a href="">Editar</a>
        <hr class="w-px h-4 bg-black">
        <a href="">Exluir</a>
    </div>
</div>