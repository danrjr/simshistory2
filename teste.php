<?php
require "vendor/autoload.php";
use app\dao\HistoriaDAO;
$historia = new HistoriaDAO;

$result = $historia->findHistoryBySearchBar("bofe");
print_r($result);

?>
