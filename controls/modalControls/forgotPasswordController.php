<?php

include '../../db.php';
include '../../header.php';
include '../../footer.php';

$name = $_POST['fieldModalNome'];
$pass = $_POST['fieldModalPassword'];

$pass = md5($pass);
$sql = " UPDATE usuarios SET senha = '$senha' WHERE nome = '$nome' ";

if (mysqli_query($connection, $sql) == 1) {
	mysqli_close($connection);
	echo "<script>location.href='../../index.php?msg=1';</script>";
} else {
	echo "<script>alert('ERRO');</script>";}
exit;
