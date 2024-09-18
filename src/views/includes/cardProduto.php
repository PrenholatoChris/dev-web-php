<?php 
function cardProd($id,$nome,$descricao,$preco,$ref){
  echo "
  <div
    class='flex flex-col w-60 h-96 bg-transparent justify-between rounded-md shadow-md shadow-zinc-800 min-w-60'
  >
    <div class='border'>
        <img
          class='object-contain w-60 h-44'
          src='../assets/images/$ref.jpg'
          alt='Foto do produto $id'
        />
    </div>
    <div class='cursor-default pl-2 '>
        <p class='text-black font-semibold text-lg mb-1'>$nome</p>
        <p class='text-black mb-0.5'>$descricao</p>
        <span class='text-black w-full flex flex-row'>
          <span
            class='text-black h-fit font-bold text-xs relative top-1 mr-0.5'
          >
            R$
          </span>
          <span class='text-black h-fit font-bold text-2xl'> $preco </span>
        </span>
    </div>
    
    <div class='flex justify-center w-full h-fit mt-3 mb-2'>
      <a href='../controllers/carrinhoController.php?vOpcao=1&id=$id' class='text-black text-center py-2 w-4/5 bg-orange-300 rounded-2xl text-sm hover:bg-orange-200'>
        Adicionar ao Carrinho</a>
    </div>
  </div>";
}
?>