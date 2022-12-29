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
    <form action="createhistory_process.php" method="post" enctype="multipart/form-data">
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