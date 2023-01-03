<?php
require "../vendor/autoload.php";
use app\dao\HistoriaDAO;

if(isset($_GET['id'])){
    $id = FILTER_INPUT(INPUT_GET, "id", FILTER_DEFAULT);
    $historia = new HistoriaDAO;
    $result = $historia->selectHistoryByCategory($id);
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
    <?php foreach($result as $r): ?>
        <a href="../historias/historia.php?id=<?= $r['id']?>"><?php echo $r['titulo']?></a>
    <?php endforeach; ?>
</body>
</html>

