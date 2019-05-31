<?php

include "../db.php";
include '../header.php';
include '../footer.php';

$name = $_POST['fieldUser'];
$pass = md5($_POST['fieldPassword']);

$query = " SELECT *
               FROM usuarios
               WHERE nome = '$name' AND senha = '$pass' limit 1";

$consulta = mysqli_query($connection, $query);

$dados = mysqli_fetch_array($consulta);

if (mysqli_num_rows(mysqli_query($connection, $query)) == 1) {
	session_start();
	$_SESSION['login'] = true;
	$_SESSION['name'] = $dados['nome'];
	$_SESSION['id'] = $dados['id_usuario'];
	mysqli_close($connection);

	echo "<script>location.href='../views/table.php';</script>";
} else {
	?>
        <script>
            M.toast({html: 'Usuário e/ou senha incorreto.'});
        </script>
<?php
}