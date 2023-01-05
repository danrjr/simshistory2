<?php 
require "./vendor/autoload.php";

use app\dao\CategoriaSecundariaDAO;
use app\dao\HistoriaDAO;

if(isset($_GET['search'])){
    $historia = new HistoriaDAO();
    $categoria = new CategoriaSecundariaDAO();
    $search = FILTER_INPUT(INPUT_GET, "search", FILTER_DEFAULT);
    
    if(empty($search) && strlen($search) == 0){
        header("Location: index.php");
    }
    else{
        $result = $categoria->selectTituloBySearchBar(rtrim($search));
    }
}
?>
<?php include "templates/header.php"?>
        <div class="c-container">
            <?php foreach($result as $r): ?>
                <?php if($r['cid'] == 1): ?>
                <div class="c-container-title">
                    <a href="categorias/filme.php?id=<?php echo $r['i'] ?>"><?php echo $r['t']?></a>
                    <img src="imagens/<?php echo $r['f']?>" width="200px" height="250px" alt="" >
                </div>
                <?php elseif($r['cid'] == 2): ?>
                <div class="c-container-title">
                    <a href="categorias/novela.php?id=<?php echo $r['i'] ?>"><?php echo $r['t']?></a>
                    <img src="imagens/<?php echo $r['f']?>" width="200px" height="250px" alt="" >
                </div>
                <?php elseif($r['cid'] == 3): ?>
                <div class="c-container-title">
                    <a href="categorias/reality.php?id=<?php echo $r['i'] ?>"><?php echo $r['t']?></a>
                    <img src="imagens/<?php echo $r['f']?>" width="200px" height="250px" alt="" >
                </div>
                <?php else: ?>
                <div class="c-container-title">
                    <a href="categorias/serie.php?id=<?php echo $r['i'] ?>"><?php echo $r['t']?></a>
                    <img src="imagens/<?php echo $r['f']?>" width="200px" height="250px" alt="" >
                </div>
                <?php endif; ?>
            <?php endforeach; ?> 
        </div>
<?php include "templates/footer.php"?>



