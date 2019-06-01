<?php
include "../db.php";
include "../header.php";
include "../footer.php";

function verifyUser($name) {
	include "../db.php";

	$sql = " SELECT * FROM usuarios WHERE nome = '$nome' limit 1";

	if ($connection->query($sql)->num_rows == 1) {
		return true;
	} else {
		return false;
	}
}

$name = $_POST["fieldUser"];
$pass = $_POST["fieldPassword"];
$keyWord = $_POST["fieldKeyWord"];

if (!verifyUser($name)) {
	$pass = md5($pass);
	$sql = "INSERT INTO usuarios (nome, senha, palavraChave)
				   VALUES ('$name', '$pass', '$keyWord')";

	$connection->query($sql);
	mysqli_close($connection);
	echo "<script>location.href='../index.php?msg=2';</script>";
} else {
	?>
			<script>
				M.toast({html: 'Usuário já cadastrado no sistema!', displayLength: 8000});
			</script>
<?php
}