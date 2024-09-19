document.getElementById("form").addEventListener("submit", function (event) {
  const propsIds = [];

  // Obtém todos os grupos de tamanhos
  const sizeGroups = document.querySelectorAll("input[type='radio']");

  sizeGroups.forEach((group) => {
    // Verifica se um botão de opção está selecionado nesse grupo
    if (group.checked) {
      const selectedSize = group.value; // ID do tamanho selecionado

      propsIds.push({
        id: selectedSize,
      });
    }
  });

  // Cria um campo oculto para armazenar os tamanhos no formulário principal
  const sizesInput = document.createElement("input");
  sizesInput.type = "hidden";
  sizesInput.name = "propsIds";
  sizesInput.value = JSON.stringify(propsIds);
  this.appendChild(sizesInput);

  // Agora envia o formulário
  this.submit();
});
