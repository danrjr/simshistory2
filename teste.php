<?php
require "vendor/autoload.php";
use app\dao\CategoriaSecundariaDAO;
use app\dao\HistoriaDAO;
$historia = new HistoriaDAO;
$cS = new CategoriaSecundariaDAO;

$result = $cS->countSecondaryCategoryByPrimaryCategory(1);
print_r($result);

?>
