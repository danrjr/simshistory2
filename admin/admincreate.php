<?php
require "../vendor/autoload.php";
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
    <form action="admincreate_process.php" method="post">
        <p>
            <label for="">Email</label>
            <input type="text" name="email" id="">
        </p>
        <p>
            <label>Password</label>
            <input type="password" name="password" id="">
        </p>
        <p>
            <label>Confirm Password</label>
            <input type="password" name="cpassword" id="">
        </p>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>