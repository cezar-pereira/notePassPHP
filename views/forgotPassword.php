<?php
include '../header.php';
?>
<div class="row">
    <div class="col s1 m1 l3"></div>
    <div class="col s10 m10 l6 z-depth-2">
        <form class="col s12" id="formForgotPassword">
            <div class="row" style="text-align: center; margin-top: 3%">
                <a href="/index.php"> <img src="/../img/logo.png"> </a>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="fieldUser" type="text" class="validate" required name="fieldUser">
                    <label for="fieldUser">Nome de usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="worldKey" type="text" class="validate" required name="worldKey">
                    <label for="worldKey">Palavra/frase chave</label>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col s6" style="text-align: center">
                    <button class="btn waves-light" type="submit" name="confirmForgotPass" style="width: 100%">Confirmar</button>
                </div>
                <div class="col s6" style="text-align: center">
                    <a href="../index.php" class="btn waves-light" style="width: 100%">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col s1 m1 l3"></div>
</div>
<div id="resposta"></div>
<?php
include '../footer.php';
?>