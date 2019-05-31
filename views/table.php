<?php

include '../header.php';
include '../db.php';
include '../footer.php';

session_start();
if (isset($_SESSION['login'])) {
	$id = $_SESSION['id'];
	$nome = $_SESSION['name'];
	?>

 <div class="row">
    <div class="col s1 m1 l3"></div>
    <div class="col s10 m10 l6 z-depth-2" style="text-align: center;">
        <form class="col s12" style="text-align: left;" name="table">

            <div class="row" style="text-align: right; margin-top: 3%">
                <ul id = "dropdown" class = "dropdown-content">
                    <li><a href = "#modalChangePassword" class="modal-trigger">Alterar senha<span class = "badge"><i class="material-icons">lock</i></span></a></li>
                    <li><a href = "../controls/logoutController.php">Sair<span class = "badge"><i class="material-icons">exit_to_app</i></span></a></li>
                </ul>
                <a class = "btn dropdown-button" href = "#" data-activates = "dropdown">
                <?php echo 'Olá, ' . $nome; ?><i class="material-icons right">settings</i></i></a>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <input id="searchDescription" type="text" class="validate" name="searchDescription" >
                    <label for="searchDescription">Pesquisar pela descrição</label>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <table class="responsive-table striped" >
                        <thead style="font-weight: bold; font-size: 17px;">
                            <tr>
                                <td>Usuário</td>
                                <td>Senha</td>
                                <td>Descrição</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>

<?php

	$itemsPerPage = 10;
	$page = intval($_GET['page']);

	$sql = "  SELECT  U.nome, US.id_servico, S.usuario, S.senha, S.descricao
                FROM usuarios U
                JOIN usuario_servico US
                ON U.id_usuario = US.id_usuario
                JOIN servicos S
                ON US.id_servico = S.id_servico
                where US.id_usuario = $id LIMIT $page, $itemsPerPage";

	$query = $connection->query($sql);
	$countRows = $query->num_rows;

	$sqlNoLimit = " SELECT  U.nome, US.id_servico, S.usuario, S.senha, S.descricao
                FROM usuarios U
                JOIN usuario_servico US
                ON U.id_usuario = US.id_usuario
                JOIN servicos S
                ON US.id_servico = S.id_servico
                where US.id_usuario = $id ";

	$countRowsTotal = $connection->query($sqlNoLimit)->num_rows;
	$numPages = ceil($countRowsTotal / $itemsPerPage);

	while ($data = $query->fetch_assoc()) {
		if ($countRows > 0) {
			echo '<tr>';

			if (strlen($data['usuario']) > 15) {
				echo '<td><a href="#viewItemTable" class="modal-trigger itemView" name="' . $data['usuario'] . '">visualizar</a></td>';
			} else {
				echo '<td>' . $data['usuario'] . '</td>';
			}

			if (strlen($data['senha']) > 15) {
				echo '<td><a href="#viewItemTable" class="modal-trigger itemView" name="' . $data['senha'] . '">visualizar</a></td>';
			} else {
				echo '<td>' . $data['senha'] . '</td>';
			}

			if (strlen($data['descricao']) > 15) {
				echo '<td><a href="#viewItemTable" class="modal-trigger itemView" name="' . $data['descricao'] . '">visualizar</a></td>';
			} else {
				echo '<td>' . $data['descricao'] . '</td>';
			}

			echo '<td style="text-align: right; font-size: 20px; ">
        <a href="../controls/deleteServiceController.php?id=' . $data['id_servico'] . '" class="material-icons">delete</a>
              </td>';

			echo '</tr>';
		}
	}
	?>
                        </tbody>
                    </table>
                    <hr>
            </div>
<?php
if($countRowsTotal > $itemsPerPage){
?>
            <div class="row">
            <div class="col s12" style="text-align: center; margin-top: 1%">
                    <ul class="pagination">
                        <?php
                            
                            echo '<li><a href="table.php"><i class="material-icons">chevron_left</i></a></li>';
                            
                                $page = $page/$itemsPerPage;
                                if($page-1<=1){
                                    $page = 3;
                                }elseif ($page+3>$numPages) {
                                    $page = $numPages-2;
                                }
                                for($i = $page-3; $i <= $page+1 ; $i++){
                                        $styleActive = "";
                                        if($_GET['page']/10 == $i){
                                            $styleActive = 'class="active"';
                                        } 
                                    echo '<li '.$styleActive.'><a href="table.php?page=' . ($i * $itemsPerPage) . '">' . ($i+1) . '</a></li> ';
                                }                              

                            echo '<li><a href="table.php?page=' . ($countRowsTotal - $itemsPerPage) . '">
                                 <i class="material-icons">chevron_right</i>
                                 </a></li>';
                        ?>
                    </ul>
            </div>
            </div>

<?php
}
?>


            </div>
            <div class="row" style="margin-left: 1%">
                <a class="btn-floating btn-large waves-light cyan modal-trigger" href="#modalAddService">
                    <i class="material-icons">add</i>
                </a>
            </div>
        </form>
    </div>
    <div class="col s1 m1 l3"></div>
</div>
<?php
} else {
	echo "<script>location.href='../index.php';</script>";
}

?>
<!-- MODAL ADD_SERVICE -->
<div id="modalAddService" class="modal">
    <div class="modal-content">
        <form id="addService">
            <div class="row" style="text-align: center;">
                <div class="col s12">
                    <div class="row">
                        <h4>Adicionar serviço</h4>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="fieldUser" type="text" class="validate" required name="fieldUser">
                            <label for="fieldUser">Usuário</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="fieldPassword" type="text" class="validate" required name="fieldPassword">
                            <label for="fieldPassword">Senha</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="fieldDescription" type="text" class="validate" required name="fieldDescription">
                            <label for="fieldDescription">Descrição</label>
                        </div>
                    </div>
                    <div class="row" style="text-align: right;">
                        <button class="waves-light btn-small" type="submit" name="confirmAddService">Confirmar</button>
                        <a class="modal-close waves-light btn-small">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- MODAL MUDAR SENHA -->
<div id="modalChangePassword" class="modal">
    <div class="modal-content">
        <form id="changePassword">
            <div class="row" style="text-align: center;">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="currentPassword" type="password" class="validate" required name="currentPassword">
                            <label for="currentPassword">Senha atual</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="newPassword" type="password" class="validate" required name="newPassword">
                            <label for="newPassword">Nova senha</label>
                        </div>
                    </div>
                    <div class="row" style="text-align: right;">
                        <button class="waves-light btn-small" type="submit" name="confirmAddService">Confirmar</button>
                        <a class="modal-close waves-light btn-small">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDITAR ITEM -->
  <div id="viewItemTable" class="modal">
    <div class="modal-content" id="modalContent">
      <p id="descriptionModal"></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect btn-flat">Fechar</a>
    </div>
  </div>

<div id="resposta"></div>

<script>
    $(document).ready(function() {
      $(".itemView").on("click", function() {
          var name = this.name;
          document.getElementById('descriptionModal').innerHTML = name;
      });
});
</script>

<div id="lol"></div>




<?php

if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
	switch ($msg) {
	case 1:
		echo "<script>
                M.toast({html: 'Senha alterada com sucesso.'});
              </script>";
		break;
	case 2:
		echo "<script>
                M.toast({html: 'Senha atual incorreta.'});
              </script>";
		break;
	case 3:
		echo "<script>
                M.toast({html: 'ERRO ao deletar.'});
              </script>";
		break;
	default:
		break;
	}
}
