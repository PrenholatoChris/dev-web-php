document.getElementById("add-button").addEventListener("click", function () {
  // Obtém os valores dos campos do formulário de tamanhos
  const name = document.getElementById("name").value;
  const price = document.getElementById("price").value;

  if (name && price) {
    // Clona o template e preenche os dados
    const template = document.getElementById("size-template");
    const newRow = document.importNode(template.content, true);

    // Preenche os dados no novo template
    newRow.querySelector("td:nth-child(1)").textContent = -1;
    newRow.querySelector("td:nth-child(2)").textContent = name;
    newRow.querySelector("td:nth-child(3)").textContent = price;

    // Adiciona a nova linha ao corpo da tabela
    document.getElementById("services-table-body").appendChild(newRow);

    // Limpa os campos do formulário de tamanhos
    document.getElementById("name").value = "";
    document.getElementById("price").value = "";
  } else {
    alert("Por favor, preencha todos os campos.");
  }
});

function removeRow(button) {
  button.closest("tr").remove(); // Remove a linha da tabela
}

document.getElementById("form").addEventListener("submit", function (event) {
  // Obtém todas as linhas da tabela
  const tableRows = document.querySelectorAll("#services-table-body tr");
  const sizes = [];

  tableRows.forEach((row) => {
    const cells = row.querySelectorAll("td");
    if (cells.length > 1) {
      sizes.push({
        id: cells[0].textContent,
        name: cells[1].textContent,
        price: cells[2].textContent,
      });
    }
  });

  // Cria um campo oculto para armazenar os tamanhos no formulário principal
  const sizesInput = document.createElement("input");
  sizesInput.type = "hidden";
  sizesInput.name = "sizes";
  sizesInput.value = JSON.stringify(sizes);
  this.appendChild(sizesInput);
});
