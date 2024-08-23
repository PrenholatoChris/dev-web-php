document.addEventListener('DOMContentLoaded', () => {
    const cepInput = document.getElementById('cep');
    const cepForm = document.getElementById('form');

    // Função para formatar o CEP enquanto o usuário digita
    cepInput.addEventListener('input', (event) => {
        let value = cepInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos
        let formattedValue = '';

        if (value.length > 0) {
            formattedValue += value.slice(0, 5); // Primeiros 5 dígitos
        }
        if (value.length > 5) {
            formattedValue += '-' + value.slice(5, 8); // Últimos 3 dígitos com hífen
        }

        cepInput.value = formattedValue;
    });

    // Função para remover os caracteres especiais ao enviar o formulário
    cepForm.addEventListener('submit', (event) => {
        cepInput.value = cepInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    });
});
