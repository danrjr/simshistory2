<?php
require "../vendor/autoload.php";
use app\dao\CategoriaSecundariaDAO;
$categorias = new CategoriaSecundariaDAO;

$result = $categorias->selectSecondaryCategoryByPrimaryCategory(4);

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
<?php foreach($result as $r): ?>
    <a href="../categorias/serie.php?id=<?php echo $r['id'] ?>"><?php echo $r['titulo']?></a>
    <br>
    <img src="../imagens/<?php echo $r['foto']?>" alt="">
    <hr>
    <?php endforeach; ?>
</body>
</body>
</html>