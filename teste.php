<?php
require "vendor/autoload.php";
use app\dao\HistoriaDAO;
$historia = new HistoriaDAO;

$result = $historia->findHistoryBySearchBar("Leva");
print_r($result);

?>
