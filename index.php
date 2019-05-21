<?php
session_start();
require 'config.php';

if(empty($_SESSION['logado'])) {  // se não estiver logado
    header("Location: login.php");
    exit;
} 

$email = '';
$code = '';

$sql = "SELECT email, code FROM users2 WHERE id = '".addslashes($_SESSION['logado'])."'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
    $info = $sql->fetch();
    $email = $info['email'];
    $code = $info['code'];
}
?>

<h1>Area interna do sistema</h1>
<p>Usuário: <?php echo $email; ?> - <a href="logout.php">Logout</a></p>
<p>Link: http://localhost/project2/register.php?codigo=<?php echo $code; ?>