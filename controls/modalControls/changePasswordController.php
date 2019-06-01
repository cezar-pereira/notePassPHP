<?php

session_start();

include '../../db.php';
include '../../header.php';
include '../../footer.php';

$name = $_SESSION['name'];
$currentPass = md5($_POST['currentPassword']);
$newPass = md5($_POST['newPassword']);

$sql = " UPDATE usuarios SET senha = '$newPass' WHERE nome = '$name' AND senha = '$currentPass' ";

$connection->query($sql);

if (mysqli_affected_rows($connection) != 0) {
	mysqli_close($connection);
	echo "<script>location.href='../../views/table.php?msg=1';</script>";
} else {
	echo "<script>location.href='../../views/table.php?msg=2';</script>";

}
