<?php
include "../db.php";
include "../header.php";
include "../footer.php";

function verifyUser($nome) {
	include "../db.php";

	$query = " SELECT * FROM usuarios WHERE nome = '$nome' limit 1";

	if (mysqli_num_rows(mysqli_query($connection, $query)) == 1) {
		return true;
	} else {
		return false;
	}
}

$nome = $_POST["fieldUser"];
$senha = $_POST["fieldPassword"];
$palavraChave = $_POST["fieldWordKey"];

if (!verifyUser($nome)) {
	$senha = md5($senha);
	$sql = "INSERT INTO usuarios (nome, senha, palavraChave)
						  		  VALUES ('$nome', '$senha', '$palavraChave')";

	mysqli_query($connection, $sql);
	mysqli_close($connection);
	echo "<script>location.href='../index.php?msg=2';</script>";
} else {
	?>
			<script>
				M.toast({html: 'Usuário já cadastrado no sistema!', displayLength: 8000});
			</script>
		<?php
}

/*
<div id="modal_register" class="modal" style="text-align: center;">

<div class="modal-content">
<h5 style="color: green;">Cadastrado com sucesso!</h5>
</div>

<div class="modal-footer" style="text-align: center;">
<a href="#!" class="waves-effect modal-close waves-green btn-flat">OK</a>
</div>

</div>
 */