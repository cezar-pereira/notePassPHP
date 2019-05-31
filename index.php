<?php

include 'header.php';
include 'footer.php';

session_start();
if (isset($_SESSION['login'])) {
	echo "<script>location.href='/views/table.php';</script>";
} else {
	include 'views/login.php';
}

if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];

	switch ($msg) {
	case 1:
		echo "<script>M.toast({html: 'Senha alterada com sucesso.'});</script>";
		break;
	case 2:
		echo "<script>M.toast({html: 'Usuário cadastrado com sucesso.'}); </script>";
		break;
	default:
		break;
	}
}
