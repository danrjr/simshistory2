<?php

require "../vendor/autoload.php";
use app\dao\AdminDAO;
use app\models\Admin;

if(isset($_POST['email'])){

    $email = FILTER_INPUT(INPUT_POST, "email", FILTER_DEFAULT);
    $password = FILTER_INPUT(INPUT_POST, "password", FILTER_DEFAULT);
    $admin = new Admin;
    $adminDAO = new AdminDAO;

    $admin->setEmail($email);
    $admin->setPassword($password);

    if($adminDAO->verifyPassword($admin->getEmail(), $admin->getPassword())){
        return true;
    }
    else{
        header("Location: ../admin/adminlogin.php");
        echo "<p>Login e Senha não conferem </p>";
    }
}
?>