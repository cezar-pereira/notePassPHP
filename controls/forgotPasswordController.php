<?php
include '../db.php';
include '../header.php';
include '../footer.php';
$name = $_POST['fieldUser'];
$keyWord = $_POST['keyWord'];

if (verifyUser($name, $keyWord)) {
	openModal($name);
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

function verifyUser($name, $keyWord) {
	include '../db.php';
	$sql = " SELECT * FROM usuarios WHERE nome = '$name' AND palavraChave = '$keyWord' limit 1";
	if ($connection->query($sql)->num_rows == 1) {
		mysqli_close($connection);
		return true;
	} else {
		mysqli_close($connection);
		return false;
	}
}

function openModal($name) {
?>

	<div id="modalForgotPassword" class="modal">
		<div class="modal-content">
			<form style="margin-top: 10%" id="formModalForgotPassword">
	            <div class="row">
	                <div class="input-field col s12">
	                    <i class="material-icons prefix">lock</i>
	                     <input name="fieldModalName" type="hidden" value="<?php echo $name ?>">
	                    <input id="fieldModalPassword" type="password" class="validate" required name="fieldModalPassword">
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