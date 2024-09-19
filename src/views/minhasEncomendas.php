<?php
    require_once '../classes/sale.inc.php';
    require_once './includes/header.php';

    $encomendas = $_SESSION["encomendas"];
?>

<div class="min-h-screen bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Minhas Encomendas</h1>
        <?php if (empty($encomendas)): ?>
            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <p class="text-gray-700">Você não tem nenhuma encomenda.</p>
            </div>
        <?php else: ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b text-left">ID</th>
                            <th class="py-2 px-4 border-b text-left">Data</th>
                            <th class="py-2 px-4 border-b text-left">Valor</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($encomendas as $encomenda): ?>
                            <tr class="hover:bg-gray-100 transition duration-200">
                                <td class="py-2 px-4 border-b"><?= $encomenda->id ?></td>
                                <td class="py-2 px-4 border-b"><?= $encomenda->date ?></td>
                                <td class="py-2 px-4 border-b"><?= $encomenda->totalValue ?></td>
                                <td class="py-2 px-4 border-b">Concluido</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>