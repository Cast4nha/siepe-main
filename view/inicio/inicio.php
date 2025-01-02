<?php
include_once '../../controller/ControllerUsuario.php';
$controllerUsuario = new ControllerUsuario();

$resultado = $controllerUsuario->acessar();
?>


<div class="row">
	<div class="col s12 m12 l6 offset-l3">
		<div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
		<h4>Autenticação</h4>
		<div class="card z-depth-3">
			<div class="card">
				<div class="card-content">
					<span class="card-title">Acessar o sistema</span>
					<form action="" name="form" method="post">
						<div class="input-field">
							<input id="login" name="email"
								type="text" title="Login" validate="required;" size="40"
								autofocus disabled> <label for="login">Login</label> 
						</div>

						<div class="input-field">
							<input id="senha" name="senha"
								type="password" size="40" title="Senha" validate="required;"
								onkeypress="checar_caps_lock(event);" disabled> <label for="senha">Senha</label> 
						</div>
						<div id="aviso_caps_lock">capslock ativado</div>
						<div class="center">
							<button id="entrar" name="Acessar" type="submit" value="Entrar"
								class="btn waves-effect waves-light bt-default"
								onclick="return isValida();" disabled>Entrar</button>
							<!-- <input name="Acessar" type="submit" value="Entrar" class="btn waves-effect waves-light"
								onclick="return isValida();"> -->
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 
<fieldset>
<legend>Usuário</legend>
<a href="?action=recuperarSenha">Clique aqui para recuperar sua senha</a>
</fieldset>
-->
<!-- 
<fieldset>
<legend>Docente</legend>
Para acessar o seu plano individual de Trabalho (P.I.T) <a id="autenticarProfessor" href="?action=autenticacaoDocente">clique aqui</a>
</fieldset>
 -->
<script type="text/javascript" src="../../scripts/Validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#login").removeAttr("disabled");
	$("#senha").removeAttr("disabled");
	$("#entrar").removeAttr("disabled");
});

</script>