<?php
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
    echo "Restricted area";
} else {
    header("Location: login.php");
}
?>