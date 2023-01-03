<?php 
require "./vendor/autoload.php";
use app\dao\HistoriaDAO;
$historias = new HistoriaDAO;
$resultado = $historias->getHistoryLimitBy6();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <?php include "templates/header.php"?>
<div class="below-header">
        <p>Ultimas Historias</p>
    </div>
    <?php foreach($resultado as $r): ?>
   <div class="historias">
        
        <div class="h-img">
                <img src="imagens/<?= $r['foto'] ?>" width="250px" height="180px" alt="">
            </div>
            <div class="h-conteudo">
                <p class="h-titulo"><?= $r['titulo'] ?></p>
                <p class="h-corpo"><?= strip_tags(str_replace("../", "",substr($r['corpo'], 0, 184))) . " ..." ?><p>
                <a href="historias/historia.php?id=<?= $r['id']?>"><button type="button">LEIA MAIS</button></a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php include ("templates/footer.php") ?>
</body>
</html>
    
