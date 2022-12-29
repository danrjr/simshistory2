<?php
require "../vendor/autoload.php";
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}

use app\dao\HistoriaDAO;
$historia = new HistoriaDAO;
$result = $historia->read();
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
<table>
<thead>
        <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Titulo</th>
            <th>Corpo</th>
            <th>Categoria</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
</thead>
<tbody>
    <?php foreach($result as $r):?>
        <tr>
            <td><?= $r['id']?></td>
            <td><img src="../imagens/<?= $r['foto'] ?>" alt=""></td>
            <td><?= $r['titulo'] ?></td>
            <td><?= $r['corpo']?></td>
            <td><?= $r['categoria_id']?></td>
            <td><a href="../historias/edithistory.php?id=<?= $r['id'] ?>">Editar</a></td>
            <td><a href="../historias/historypainel.php?id_del=<?= $r['id'] ?>">Deletar</a></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<?php 
    if(isset($_GET['id_del'])){
    $id_del = FILTER_INPUT(INPUT_GET, "id_del", FILTER_DEFAULT);
    $historia->delete($id_del);
    }
?>
</body>
</html>