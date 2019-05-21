<?php
session_start();
require 'config.php';

if(!empty($_GET['code'])) {
    $code = addslashes($_GET['code']);

    $sql = "SELECT * FROM users2 WHERE code = '$code'";
    $sql = $pdo->query($sql);
    
    if($sql->rowCount() == 0) {
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}

if(!empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM  users2 WHERE email = '$email'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() <= 0) {
        $inviteCode = md5(rand(0,99999).rand(0,99999));
        $sql = "INSERT INTO users2 (email, pass, code) VALUES ('$email', '$password', '$inviteCode')";
        $sql = $pdo->query($sql);

        unset($_SESSION['logado']);

        header("Location: index.php");
        exit;
    }
}
?>

<h3>Register</h3>

<form method="POST">
    E-mail:<br/>
    <input type="email" name="email" /><br/><br/>

    Password:<br/>
    <input type="password" name="password"><br/><br/>

    <input type="submit" value="Register" />
</form>
