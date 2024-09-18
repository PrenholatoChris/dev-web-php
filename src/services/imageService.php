<?php
    function uploadImage($ref){
        $image = $_FILES["vImage"];
        $nome = $ref;

        if($image != null){
            $temp_name = $image["tmp_name"];
            // $type = $_FILES['pImagem']['type'];
            copy($temp_name, "../assets/images/$nome.jpg");
        }else{
            echo "Voce nao realizou o upload de forma satisfatoria.";
        }
    }

    function deleteImage($ref){
            $arquivo = "../assets/images/$ref.jpg";
            
            if(file_exists( $arquivo )){ // verifica se o arquivo existe
                if (!unlink($arquivo)){ //aqui que se remove o arquivo retornando true, senão mostra mensagem
                    echo "Não foi possível deletar o arquivo!";
                }
            }
    }
?>