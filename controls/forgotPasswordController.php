<?php
include '../db.php';
include '../header.php';
include '../footer.php';
$nome = $_POST['fieldUser'];
$palavraChave = $_POST['worldKey'];

if (verifyUser($nome, $palavraChave)) {
	openModal($nome);
	?>
		<script>
			M.toast({html: 'Usuário encontrado.', displayLength: 6000});
		</script>
<?php
} else {
	?>
	<script>
		M.toast({html: 'Não foi possível recuperar.', displayLength: 6000});
	</script>
	<?php
}

function verifyUser($nome, $palavraChave) {
	include '../db.php';
	$query = " SELECT * FROM usuarios WHERE nome = '$nome' AND palavraChave = '$palavraChave' limit 1";
	if (mysqli_num_rows(mysqli_query($connection, $query)) == 1) {
		mysqli_close($connection);
		return true;
	} else {
		mysqli_close($connection);
		return false;
	}
}

function openModal($nome) {
	?>

	<div id="modalForgotPassword" class="modal">
		<div class="modal-content">
			<form style="margin-top: 10%" id="formModalForgotPassword">
	            <div class="row">
	                <div class="input-field col s12">
	                    <i class="material-icons prefix">lock</i>
<?php
echo ('<input type="hidden" name="fieldModalNome" value="' . $nome . '" />'); //para enviar o nome que será usado na controller
	 ?>
	                    <input id="fieldModalPassword" type="password" class="validate"  required name="fieldModalPassword">
	                    <label for="fieldModalPassword">Digite a nova senha</label>
	                </div>
	            </div>
				<div class="row" style="text-align: center">
					<div class=" s12">
						<button class="btn waves-light" type="submit" name="confirmModalForgotPass">Confirmar</button>
						<a class="modal-close waves-light btn-small">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript">
		$('.modal').modal();
		$('#modalForgotPassword').modal('open');
	</script>
<?php
}