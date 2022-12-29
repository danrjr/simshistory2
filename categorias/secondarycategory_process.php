<?php

require "../vendor/autoload.php";
use app\dao\CategoriaSecundariaDAO;
use app\models\CategoriaSecundaria;

if(isset($_POST['titulo'])){
    $categoriaSecundariaDAO = new CategoriaSecundariaDAO;
    $categoriaSecundaria = new CategoriaSecundaria;
    $titulo = FILTER_INPUT(INPUT_POST, "titulo", FILTER_DEFAULT);
    $foto = FILTER_INPUT(INPUT_POST, "foto", FILTER_DEFAULT);
    $categoria_id = FILTER_INPUT(INPUT_POST, "categoria_id", FILTER_DEFAULT);

    $categoriaSecundaria->setTitulo($titulo);
    $categoriaSecundaria->setCategoria_id($categoria_id);

}

if ($_FILES['foto']['type'] == 'image/jpeg') {
    $nome_arquivo = bin2hex($_FILES['foto']['name']).rand(1,999). ".jpg";
    if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
        move_uploaded_file($_FILES['foto']['tmp_name'], '../imagens/' . $nome_arquivo);
        echo "Imagem enviada com sucesso";
        $categoriaSecundaria->setFoto($nome_arquivo);
        $categoriaSecundariaDAO->create($categoriaSecundaria);
    }
}
else if ($_FILES['foto']['type'] == 'image/png') {
$nome_arquivo = bin2hex($_FILES['foto']['name']).rand(1,999) . ".png";
if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
   move_uploaded_file($_FILES['foto']['tmp_name'], '../imagens/' . $nome_arquivo);
    echo "Imagem enviada com sucesso";
    $categoriaSecundaria->setFoto($nome_arquivo);
    $categoriaSecundariaDAO->create($categoriaSecundaria);
}
}
else{
echo "Imagens precisam ser em formato PNG ou JPG";

}
?>
