<div class="row">
  <div class="col s1 m1 l3"></div>
  <div class="col s10 m10 l6 z-depth-2">
    <form class="col s12" id="formLogin">
      <div class="row" style="text-align: center; margin-top: 3%">
        <a href="/index.php"> <img src="/img/logo.png"> </a>
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
        <div class="col s1"></div>
        <div class="col s10">
          <button class="btn waves-light" type="submit" name="confirmLogin" id="confirmLogin" style="width: 100%">Confirmar</button>
        </div>
        <div class="col s1"></div>
      </div>
      <br>
      <hr> <!-- LINHA HORIZONTAL -->
      <br>
      <div class="row">
        <div class="col s6" style="text-align: left; padding-left: 5%">
          <a href="/views/forgotPassword.php" style="color: #6A5ACD; font-size: 17px">Esqueceu a senha?</a>
        </div>
        <div class="col s6" style="text-align: right; padding-right: 5%">
          <a href="/views/register.php" style="color: #6A5ACD; font-size: 17px">Registre-se</a>
        </div>
      </div>
    </form>
  </div>
  <div class="col s1 m1 l3"></div>
</div>
<div id="resposta"></div>