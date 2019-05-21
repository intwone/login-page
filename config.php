<?php
try {
    $dsn = "mysql:dbname=blog;host=localhost";
    $dbuser = "root";
    $dbpassword = "";

    $pdo = new PDO($dsn, $dbuser, $dbpassword);

} catch(PDOexception $e) {
    echo "ERROR: ".$e->getMessage();
    exit;
}
?>