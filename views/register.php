<?php
include '../header.php';
?>
<div class="row">
    <div class="col s1 m1 l3"></div>
    <div class="col s10 m10 l6 z-depth-2">
        <form name="register" class="col s12" id="formRegister">
            <div class="row" style="text-align: center; margin-top: 3%">
                <a href="/index.php"> <img src="/../img/logo.png"> </a>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="fieldUser" type="text" class="validate" required name="fieldUser">
                    <label for="fieldUser">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="fieldPassword" type="password" class="validate" required name="fieldPassword">
                    <label for="fieldPassword">Senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 tooltipped" data-tooltip="Palavra/frase usada para<br>recuperar a conta." >
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="fieldWordKey" type="text" class="validate" required name="fieldWordKey">
                    <label for="fieldWordKey">Palavra/frase chave</label>
                </div>
            </div>
            <div class="row">
                <div class="col s1"></div>
                <div class="col s10">
                    <button class="btn waves-light" type="submit" name="confirmRegister" style="width: 100%">Confirmar</button>
                </div>
                <div class="col s1"></div>
            </div>

            <br>
            <hr> <!-- LINHA HORIZONTA -->
            <br>
            <div class="row">
                <div class="col s12" style="text-align: left; padding-left: 5%; font-size: 17px">
                    <a href="../index.php" style="color: #6A5ACD; font-size: 17px">Loga-se</a>
                </div>
            </div>

        </form>
    </div>
    <div class="col s1 m1 l3"></div>
</div>

<div id="resposta"></div>
<?php
include '../footer.php';