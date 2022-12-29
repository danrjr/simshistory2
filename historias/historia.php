<?php
require "../vendor/autoload.php";
use app\dao\HistoriaDAO;
$historia = new HistoriaDAO;


if(isset($_GET['id'])){
    $id = FILTER_INPUT(INPUT_GET, "id", FILTER_DEFAULT);
    $result = $historia->getHistoryById($id);
}

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
    <p><?= $result['titulo'] ?></p>
    <img src="../imagens/<?= $result['foto']?>" alt="">
    <p><?= $result['corpo'] ?></p>
</body>
</html>