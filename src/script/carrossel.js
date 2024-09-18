const prevButton = document.getElementById("prev");
const nextButton = document.getElementById("next");
const carousel = document.getElementById("carousel");

prevButton.addEventListener("click", () => {
  carousel.scrollBy({
    left: -200, // Ajuste o valor conforme necessário
    behavior: "smooth",
  });
});

nextButton.addEventListener("click", () => {
  carousel.scrollBy({
    left: 200, // Ajuste o valor conforme necessário
    behavior: "smooth",
  });
});
