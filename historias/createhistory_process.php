<?php

require "../vendor/autoload.php";
use app\dao\HistoriaDAO;
use app\models\Historia;

if(isset($_POST['titulo'])){
    $historia = new Historia;
    $historiaDAO = new HistoriaDAO;

    $titulo = FILTER_INPUT(INPUT_POST, "titulo", FILTER_DEFAULT);
    $corpo = FILTER_INPUT(INPUT_POST, "corpo", FILTER_DEFAULT);
    $categoria_id = FILTER_INPUT(INPUT_POST, "categoria_id", FILTER_DEFAULT);

    $historia->setTitulo($titulo);
    $historia->setCorpo($corpo);
    $historia->setCategoria_id($categoria_id);
}

if ($_FILES['foto']['type'] == 'image/jpeg') {
    $nome_arquivo = bin2hex($_FILES['foto']['name']).rand(1,999). ".jpg";
    if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
        move_uploaded_file($_FILES['foto']['tmp_name'], '../imagens/' . $nome_arquivo);
        echo "Imagem enviada com sucesso";
        $historia->setFoto($nome_arquivo);
        $historiaDAO->create($historia);
    }
}
else if ($_FILES['foto']['type'] == 'image/png') {
$nome_arquivo = bin2hex($_FILES['foto']['name']).rand(1,999) . ".png";
if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
   move_uploaded_file($_FILES['foto']['tmp_name'], '../imagens/' . $nome_arquivo);
    echo "Imagem enviada com sucesso";
    $historia->setFoto($nome_arquivo);
    $historiaDAO->create($historia);
}
}
else{
echo "Imagens precisam ser em formato PNG ou JPG";

}

?>
