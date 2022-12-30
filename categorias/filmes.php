<?php
require "../vendor/autoload.php";
use app\dao\CategoriaSecundariaDAO;
$categorias = new CategoriaSecundariaDAO;

$result = $categorias->selectSecondaryCategoryByPrimaryCategory(1);
print_r($result);
?>