<?php
session_start();

include '../db.php';
if (isset($_SESSION['login'])) {
	$id_user = $_SESSION['id'];
	$id_service = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	$sql = " DELETE FROM usuario_servico WHERE  id_usuario = '$id_user' AND id_servico = '$id_service' ";

	$query = mysqli_query($connection, $sql);

	if (mysqli_affected_rows($connection)) {
		$sql = " DELETE FROM servicos WHERE id_servico = '$id_service' ";
		$query = mysqli_query($connection, $sql);

		if (mysqli_affected_rows($connection)) {
			echo "<script>location.href='../views/table.php';</script>";
			mysqli_close($connection);
		} else {
			echo "<script>location.href='../views/table.php?msg=3';</script>";
			mysqli_close($connection);
		}
	} else {
		echo "<script>location.href='../views/table.php?msg=3';</script>";
		mysqli_close($connection);
	}

} else {
	header("location: ../index.php");
}