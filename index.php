<?php 
require "./vendor/autoload.php";
use app\dao\HistoriaDAO;
$historias = new HistoriaDAO;
$resultado = $historias->read();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sims History - Leia</title>
</head>
<body>
    <h1>Pagina Inicial</h1>
    <?php foreach($resultado as $r): ?>
    <a href="./historias/historia.php?id=<?= $r['id']?>">
    <p><?= $r['titulo']?></p>
    <img src="imagens/<?= $r['foto'] ?>" alt="">
    <p><?= strip_tags(str_replace("../", "",substr($r['corpo'], 0, 230)))?></p>
    <hr>
    </a>
    <?php endforeach; ?>
</body>
</html>