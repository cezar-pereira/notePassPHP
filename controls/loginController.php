<?php

include "../db.php";
include '../header.php';
include '../footer.php';

$name = $_POST['fieldUser'];
$pass = md5($_POST['fieldPassword']);

$query = $connection->query(  (" SELECT *
                                 FROM usuarios
                                 WHERE nome = '$name' AND senha = '$pass'")  ) or die($connection->error);

$data = $query->fetch_assoc();

if ($query->num_rows == 0) {
?>
        <script>
            M.toast({html: 'Usuário e/ou senha incorreto.'});
        </script>
<?php
} else {
	session_start();
	$_SESSION['login'] = true;
	$_SESSION['name'] = $data['nome'];
	$_SESSION['id'] = $data['id_usuario'];
	mysqli_close($connection);

	echo "<script>location.href='../views/table.php';</script>";
}
