<?php
require "../vendor/autoload.php";
use app\dao\CategoriaSecundariaDAO;
$categorias = new CategoriaSecundariaDAO;

$result = $categorias->selectSecondaryCategoryByPrimaryCategory(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<div class="above-header">
        <p>The Sims Historias</p>
</div>
    <header>
        <img src="https://www.alalasims.com/noticias/wp-content/uploads/2019/08/SIMS4_Plumbob_Primary_RGB.png" alt="">  
      <nav class="navigation">
            <ul><li><a href="filmes.php">Filmes</a></li></ul>
            <ul><li><a href="novelas.php">Novelas</a></li></ul>
            <ul><li><a href="series.php">Series</a></li></ul>
            <ul><li><a href="realities.php">Reality Shows</a></li></ul>
    </nav>
</header>
        <div class="c-container">
        <?php foreach($result as $r): ?>
            <div class="c-container-title">
                <a href="../categorias/reality.php?id=<?php echo $r['id'] ?>"><?php echo $r['titulo']?></a>
                <img src="../imagens/<?php echo $r['foto']?>" width="200px" height="250px" alt="" >
            </div>
        <?php endforeach; ?>     
        </div>
    <?php require "../templates/footer.php"?>
</body>
</body>
</html>