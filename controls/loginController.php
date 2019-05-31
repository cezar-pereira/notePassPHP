<?php

include "../db.php";
include '../header.php';
include '../footer.php';

$name = $_POST['fieldUser'];
$pass = md5($_POST['fieldPassword']);

$sql_query = $connection->query((" SELECT *
               FROM usuarios
               WHERE nome = '$name' AND senha = '$pass'")) or die($connection->error);
$dados = $sql_query->fetch_assoc();

if (($sql_query->num_rows) == 0) {
	?>
        <script>
            M.toast({html: 'Usuário e/ou senha incorreto.'});
        </script>
<?php
} else {
	session_start();
	$_SESSION['login'] = true;
	$_SESSION['name'] = $dados['nome'];
	$_SESSION['id'] = $dados['id_usuario'];
	mysqli_close($connection);

	echo "<script>location.href='../views/table.php';</script>";
}
