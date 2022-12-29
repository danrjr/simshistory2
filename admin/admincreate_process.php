<?php

require "../vendor/autoload.php";

use app\dao\AdminDAO;
use app\models\Admin;


if(isset($_POST['email'])){
    $email = FILTER_INPUT(INPUT_POST, "email", FILTER_DEFAULT);
    $password = FILTER_INPUT(INPUT_POST, "password", FILTER_DEFAULT);
    $cpassword = FILTER_INPUT(INPUT_POST, "cpassword", FILTER_DEFAULT);

    $admin = new Admin;
    $adminDAO = new AdminDAO;

    $admin->setEmail($email);
    $admin->setPassword($password);

    if($adminDAO->checkIfEmailExists($admin->getEmail())){
        echo "Email ja cadastrado";
    }
    if($password != $cpassword){
        echo "Senhas nao conferem";
    }
    else{
        $adminDAO->create($admin);
    }
}
?>
