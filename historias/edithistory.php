<?php
require "../vendor/autoload.php";
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}

use app\dao\CategoriaSecundariaDAO;
$categoria = new CategoriaSecundariaDAO;
$result = $categoria->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <p>
            <label>Titulo</label>
            <input type="text" name="titulo" id="">
        </p>
        <p>
            <label>Foto</label>
            <input type="file" name="foto" id="">
        </p>
        <p>
            <label>Corpo</label>
            <textarea name="corpo" id=""></textarea>
        </p>
        <p>
            <label>Categoria</label>
            <select name="categoria_id" id="">
                <?php foreach($result as $r):?>
                    <option value="<?php echo $r['id']?>"><?php echo $r['titulo']?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <input type="submit" value="Criar">
    </form>
</body>
</html>

<?php

use app\dao\HistoriaDAO;
use app\models\Historia;

if(isset($_POST['titulo'])){

    $historia = new Historia;
    $historiaDAO = new HistoriaDAO;
    $id = addslashes($_GET['id']);
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
        $historiaDAO->update($historia, $id);
    }
}
else if ($_FILES['foto']['type'] == 'image/png') {
$nome_arquivo = bin2hex($_FILES['foto']['name']).rand(1,999) . ".png";
if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
   move_uploaded_file($_FILES['foto']['tmp_name'], '../imagens/' . $nome_arquivo);
    echo "Imagem enviada com sucesso";
    $historia->setFoto($nome_arquivo);
    $historiaDAO->update($historia, $id);
}
}
else{
echo "Imagens precisam ser em formato PNG ou JPG";

}

?>
