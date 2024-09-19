document
  .getElementById("duplicate-button")
  .addEventListener("click", function () {
    // Obter o valor do input
    const tipoNovaPropriedade = document.getElementById(
      "tipoNovaPropriedade"
    ).value;

    if (tipoNovaPropriedade.trim() === "") {
      alert("Por favor, insira um nome para a nova propriedade.");
      return;
    }

    // Clonar o bloco de serviço inteiro
    const servicesContainer = document.getElementById("services-container");
    const clonedContainer = servicesContainer.cloneNode(true);

    // Gerar um novo ID para o container clonado para evitar IDs duplicados
    clonedContainer.id = `services-container-${Math.random()
      .toString(36)
      .substr(2, 9)}`;

    // Limpar os dados dentro da tabela do container clonado
    const tableBody = clonedContainer.querySelector("#services-table-body");
    if (tableBody) {
      tableBody.innerHTML = ""; // Remove todas as linhas da tabela
      tableBody.setAttribute("data-tipo", tipoNovaPropriedade);
    }

    // Modificar o conteúdo do clone: alterar o valor do input "name"
    const nameInput = clonedContainer.querySelector('input[name="name"]');
    if (nameInput) {
      nameInput.value = "";
    }

    // Alterar o título da nova seção com base no valor do input
    const clonedTitle = clonedContainer.querySelector("p");
    if (clonedTitle) {
      clonedTitle.textContent = `${tipoNovaPropriedade} do Serviço`;
    }

    // Adicionar o container clonado como irmão imediato
    servicesContainer.insertAdjacentElement("afterend", clonedContainer);

    // Limpar o input após a duplicação
    document.getElementById("tipoNovaPropriedade").value = "";
  });
