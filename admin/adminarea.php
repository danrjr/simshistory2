<?php

require "../vendor/autoload.php";
use app\dao\AdminDAO;

$adminDAO = new AdminDAO;
$result = $adminDAO->read();

print_r($result);

?>

