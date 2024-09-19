function addRow(button) {
  // Encontra o container mais próximo
  const container = button.closest(
    "#services-container, [id^='services-container']"
  );

  // Obtém os valores dos campos do formulário de tamanhos dentro do container correspondente
  const name = container.querySelector("input[name='name']").value;
  const price = container.querySelector("input[name='price']").value;

  if (name && price) {
    // Clona o template e preenche os dados
    const template = document.querySelector("#size-template"); // Se estiver dentro do mesmo container
    if (!template) {
      console.error("Template não encontrado.");
      return; // Saia se o template não for encontrado
    }

    const newRow = document.importNode(template.content, true);

    // Preenche os dados no novo template
    newRow.querySelector("td:nth-child(1)").textContent = -1; // Defina o ID conforme sua lógica
    newRow.querySelector("td:nth-child(2)").textContent = name;
    newRow.querySelector("td:nth-child(3)").textContent = price;

    // Adiciona a nova linha ao corpo da tabela do container correto
    container.querySelector("#services-table-body").appendChild(newRow);

    // Limpa os campos do formulário de tamanhos
    container.querySelector("input[name='name']").value = "";
    container.querySelector("input[name='price']").value = "";
  } else {
    alert("Por favor, preencha todos os campos.");
  }
}

// Função para remover a linha da tabela
function removeRow(button) {
  button.closest("tr").remove(); // Remove a linha da tabela
}

// Lida com o envio do formulário
document.getElementById("form").addEventListener("submit", function (event) {
  // Obtém todas as linhas da tabela em todos os containers
  const props = [];

  const serviceContainers = document.querySelectorAll(
    "#services-container, [id^='services-container']"
  );

  serviceContainers.forEach((container) => {
    const tableRows = container.querySelectorAll("#services-table-body tr");
    const tipoPropriedade = container
      .querySelector("#services-table-body")
      .getAttribute("data-tipo");

    tableRows.forEach((row) => {
      const cells = row.querySelectorAll("td");
      if (cells.length > 1) {
        props.push({
          id: cells[0].textContent,
          name: cells[1].textContent,
          price: cells[2].textContent,
          tipo: tipoPropriedade, // Adiciona o nome da propriedade
        });
      }
    });
  });

  // Cria um campo oculto para armazenar os tamanhos no formulário principal
  const sizesInput = document.createElement("input");
  sizesInput.type = "hidden";
  sizesInput.name = "props";
  sizesInput.value = JSON.stringify(props);
  this.appendChild(sizesInput);
});
