document.addEventListener('DOMContentLoaded', () => {
    const phoneInput = document.getElementById('phone');
    const phoneForm = document.getElementById('form');

    phoneInput.addEventListener('input', (event) => {
        let value = phoneInput.value.replace(/\D/g, ''); // Remove non-digit characters
        let formattedValue = '';

        if (value.length > 0) {
            formattedValue += '(' + value.slice(0, 2);
        }
        if (value.length > 2) {
            formattedValue += ') ' + value.slice(2, 7);
        }
        if (value.length > 7) {
            formattedValue += ' ' + value.slice(7, 11);
        }
        
        phoneInput.value = formattedValue;
    });

    phoneForm.addEventListener('submit', (event) => {
        phoneInput.value = phoneInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    });
});