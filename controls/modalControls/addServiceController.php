<?php
include '../../db.php';
include '../../header.php';
include '../../footer.php';

session_start();

if (isset($_SESSION['login'])) {
	$idUser = $_SESSION['id'];
	$user = $_POST['fieldUser'];
	$pass = $_POST['fieldPassword'];
	$description = $_POST['fieldDescription'];
	//ADICIONAR TABELA servico
	$sql = " INSERT INTO servicos (descricao, usuario, senha)
             VALUES ('$description','$user','$pass')";

	$connection->query($sql);
	
	//ADICIONAR TABELA usuario_servico
	$idService = mysqli_insert_id($connection);

	$sql = " INSERT INTO usuario_servico (id_usuario, id_servico)
		            VALUES ('$idUser', '$idService')";
	$connection->query($sql);
	mysqli_close($connection);

	echo "<script>location.href='../../index.php';</script>";
} else {
	echo "<script>location.href='../../index.php';</script>";
}
