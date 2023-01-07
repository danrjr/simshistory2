<?php
require "../vendor/autoload.php";
use app\dao\HistoriaDAO;

if(isset($_GET['id'])){
    $id = FILTER_INPUT(INPUT_GET, "id", FILTER_DEFAULT);
    $historia = new HistoriaDAO;
    $result = $historia->selectHistoryByCategory($id);
}

?>

<?php require "../templates/header.php"; ?>
    <div class="history-list">
    <?php foreach($result as $r): ?>
            <a href="../historias/historia.php?id=<?= $r['id']?>"><?php echo $r['titulo']?></a>  
            <br> 
    <?php endforeach; ?>
    </div>    
<?php require "../templates/footer.php"; ?>
