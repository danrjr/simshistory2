<?php
require "../vendor/autoload.php";
use app\dao\HistoriaDAO;
$historia = new HistoriaDAO;


if(isset($_GET['id'])){
    $id = FILTER_INPUT(INPUT_GET, "id", FILTER_DEFAULT);
    $result = $historia->getHistoryById($id);
}

?>

<?php include("../templates/header.php")?>

    <p><?= $result['titulo'] ?></p>
    <img src="../imagens/<?= $result['foto']?>" alt="">
    <p><?= $result['corpo'] ?></p>

<?php include("../templates/footer.php")?>