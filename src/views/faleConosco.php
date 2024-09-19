<?php 
    require_once "./includes/header.php";
?>
<div class="bg-gray-100">
    <header class="bg-blue-600 p-6 text-white">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-bold">Fale Conosco</h1>
            <p class="mt-2">Estamos aqui para te ajudar. Entre em contato!</p>
        </div>
    </header>

    <main class="container mx-auto mt-10 p-6">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-4">Envie uma mensagem</h2>
            <form action="#" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nome Completo</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label for="message" class="block text-gray-700 font-semibold mb-2">Mensagem</label>
                    <textarea id="message" name="message" rows="6" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Enviar</button>
                </div>
            </form>
        </div>
    </main>

</div>

<?php 
    require_once "./includes/footer.php";
?>
