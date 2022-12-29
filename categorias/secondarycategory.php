<?php 
require "../vendor/autoload.php";
session_start();

use app\dao\CategoriaPrimariaDAO;
$categoria = new CategoriaPrimariaDAO;

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}

$result = $categoria->read();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="secondarycategory_process.php" method="post" enctype="multipart/form-data">
        <p>
            <label>Titulo</label>
            <input type="text" name="titulo" id="">
        </p>
        <p>
            <label>Banner</label>
            <input type="file" name="foto" id="">
        </p>
        <p>
        <label>Categoria</label>
            <select name="categoria_id" id="">
                <?php foreach($result as $r):?>
                    <option value="<?php echo $r['id']?>"><?php echo $r['titulo']?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>