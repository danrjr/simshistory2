<?php
require "vendor/autoload.php";
use app\dao\CategoriaSecundariaDAO;
use app\dao\HistoriaDAO;
$historia = new HistoriaDAO;
$cS = new CategoriaSecundariaDAO;

$result = $cS->selectTituloBySearchBar("clotilde");
print_r($result);

?>
