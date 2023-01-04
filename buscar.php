<?php 
require "./vendor/autoload.php";

use app\dao\HistoriaDAO;
if(isset($_POST['search'])){
    $historia = new HistoriaDAO();
    $search = FILTER_INPUT(INPUT_POST, "search", FILTER_DEFAULT);
    
    if(empty($search) && strlen($search) == 0){
        header("Location: index.php");
    }
    else{
        $result = $historia->findHistoryBySearchBar(rtrim($search));
    }
}
?>
<?php include "templates/header.php"?>
        <div class="c-container">
        <?php foreach($result as $r): ?>
            <div class="c-container-title">
                <a href="historias/historia.php?id=<?php echo $r['id'] ?>"><?php echo $r['titulo']?></a>
                <img src="imagens/<?php echo $r['foto']?>" width="200px" height="250px" alt="" >
            </div>
        <?php endforeach; ?> 
        </div>
<?php include "templates/footer.php"?>



