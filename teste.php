<?php
require "vendor/autoload.php";
use app\dao\HistoriaDAO;
$historia = new HistoriaDAO;

$result = $historia->getHistoryLimitBy6();
print_r($result);

?>
