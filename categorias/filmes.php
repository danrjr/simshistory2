<?php
require "../vendor/autoload.php";
use app\dao\CategoriaSecundariaDAO;
$categorias = new CategoriaSecundariaDAO;

$result = $categorias->selectSecondaryCategoryByPrimaryCategory(1);
?>
<?php include "../templates/header.php"?>
        <div class="c-container">
        <?php foreach($result as $r): ?>
            <div class="c-container-title">
                <a href="../categorias/filme.php?id=<?php echo $r['id'] ?>"><?php echo $r['titulo']?></a>
                <img src="../imagens/<?php echo $r['foto']?>" width="200px" height="250px" alt="" >
            </div>
        <?php endforeach; ?>     
        </div>
<?php include "../templates/footer.php"?>
