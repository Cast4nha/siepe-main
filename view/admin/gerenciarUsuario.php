<?php
include_once '../../controller/ControllerUsuario.php';
include_once '../../controller/ControllerComunidade.php';
include_once '../../controller/ControllerInstituicao.php';
$controllerPerfil = new ControllerPerfil();
$controllerUsuario = new ControllerUsuario();
$controllerComunidade = new ControllerComunidade();
$controllerInstituicao = new ControllerInstituicao();

$resultado = $controllerUsuario->cadastrar();

$usuarios = $controllerUsuario->getAction()->getAll();
$perfis = $controllerPerfil->getAllPerfis();
$comunidades = $controllerComunidade->ListAllComunidade();
$instituicoes = $controllerInstituicao->ListAllInstituicao();
?>
<div class='container'>
	<form method="post" name="form" action="gerenciarUsuario.php">
		<div class="row">
			<div class="col s12 m12">
			<div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
				<br><h5>Cadastrar Usuário</h5><br>
				<div class="card z-depth-3">
					<div class="card-content">
						<span class="card-title">Novo Usuário</span>
						
						<div class="input-field">
							<input id="nome" type="text" name="nome" size="40" maxlength="40" autofocus/>
							<label for="nome">Nome:</label>
						</div>
						<div class='row'>
							<div class="input-field col s12 m6">
								<input id="login" type="text" name="login" size="40" maxlength="40"/>
								<label for="login">Login:</label>
							</div>
							
							<div class="input-field col s12 m6">
								<input id="senha" type="password" name="senha" size="40" maxlength="40"/>
								<label for="senha">Senha:</label>
							</div>
						</div>
						<div class='row'>
							<div class="input-field col s12 m6">
								<select id="idperfil" name="idperfil">
									<option value="" disabled selected>Escolha uma das opções</option>
									<?php foreach ($perfis as $perfil) { ?>
									<option value="<?php echo $perfil->getId(); ?>"><?php echo $perfil->getDescricao(); ?></option>
									<?php } ?>
								</select>
								<label>Perfil:</label>
							</div>
							
							<div class="input-field col s12 m6">
								<input id="email" type="text" name="email" size="40" maxlength="40"/>
								<label for="email">Email:</label>
							</div>
						</div>
						<div class='row'>
							<div class="input-field col s12 m6">
								<select id="idComunidade" name="idComunidade">
									<option value="" disabled selected>Escolha uma das opções</option>
									<?php foreach ($comunidades as $comunidade) { ?>
									<option value="<?php echo $comunidade->getId(); ?>"><?php echo $comunidade->getDescricao(); ?></option>
									<?php } ?>
								</select>
								<label>Comunidade:</label>
							</div>
							
							<div class="input-field col s12 m6">
								<select id="idInstituicao" name="idInstituicao">
									<option value="" disabled selected>Escolha uma das opções</option>
									<?php foreach ($instituicoes as $instituicao) { ?>
									<option value="<?php echo $instituicao->getId(); ?>"><?php echo $instituicao->getDescricao(); ?></option>
									<?php } ?>
								</select>
								<label>Instituição:</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="center">
		<button class="btn waves-effect waves-light bt-default" type="submit" name="cadastrarUsuario" onclick="return verificarUsuario();">Cadastrar</button>
		</div>
	
	</form>
	<br>
	<div class="row">
		<div class="col s12 m12">
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">Lista de Usuários Cadastrados</span><br>
					<form method="post">
						<input type="hidden" name="operacao" id="operacao" value="-1"/>
						<input type="hidden" id="idUsuario" name="idUsuario" value="-1"/>
						<input type="hidden" id="editNome" name="editNome" value="-1"/>
						<input type="hidden" id="editIdperfil" name="editIdperfil" value="-1"/>
						<input type="hidden" id="editLogin" name="editLogin" value="-1"/>
						<input type="hidden" id="editSenha" name="editSenha" value="-1"/>
						<input type="hidden" id="editEmail" name="editEmail" value="-1"/>
						<input type="hidden" id="editIdComunidade" name="editIdComunidade" value="-1"/>
						<input type="hidden" id="editIdInstituicao" name="editIdInstituicao" value="-1"/>
						<table class="centered responsive-table">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Perfil</th>
									<th>Login</th>
									<th>Senha</th>
									<th>E-mail</th>
									<th>Comunidade</th>
									<th>Instituição</th>
									<th>Editar</th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($usuarios as $usuario) { ?>
								<tr>
									<td><input type="text" id="editNome<?php echo $usuario->getId();?>" value="<?php echo $usuario->getNome(); ?>"/></td>
									<td>
										<select id="editIdperfil<?php echo $usuario->getId();?>">
											<?php foreach ($perfis as $perfil) { ?>
											<option value="<?php echo $perfil->getId(); ?>"<?php if ($usuario->getIdPerfil()==$perfil->getId()) echo ' selected'; ?>><?php echo $perfil->getDescricao(); ?></option>
											<?php } ?>
										</select>
									</td>
									<td><input type="text" id="editLogin<?php echo $usuario->getId();?>" value="<?php echo $usuario->getLogin();?>"/></td>
									<td><input type="password" id="editSenha<?php echo $usuario->getId();?>"/></td>
									<td><input type="text" id="editEmail<?php echo $usuario->getId();?>" value="<?php echo $usuario->getEmail();?>"/></td>
									<td>
										<select id="editIdComunidade<?php echo $usuario->getId();?>">
											<option value="" disabled selected>Escolha uma das opções</option>
											<?php foreach ($comunidades as $comunidade) { ?>
											<option value="<?php echo $comunidade->getId(); ?>"<?php if ($usuario->getIdcomunidade()==$comunidade->getId()) echo ' selected'; ?>><?php echo $comunidade->getDescricao(); ?></option>
											<?php } ?>
										</select>
									</td>
									<td>
										<select id="editIdInstituicao<?php echo $usuario->getId();?>">
											<option value="" disabled selected>Escolha uma das opções</option>
											<?php foreach ($instituicoes as $instituicao) { ?>
											<option value="<?php echo $instituicao->getId(); ?>"<?php if ($usuario->getIdinstituicao()==$instituicao->getId()) echo ' selected'; ?>><?php echo $instituicao->getDescricao(); ?></option>
											<?php } ?>
										</select>
									</td>
									<td><button class="btn waves-effect waves-light green darken-4" type="submit" onclick="return verificarEnvio('2','<?php echo $usuario->getId();?>');"><i class="material-icons">edit</i></button></td>
									<td><button class="btn waves-effect waves-light red darken-4" type="submit" onclick=" return verificarEnvio('1','<?php echo $usuario->getId();?>');"><i class="material-icons">delete_forever</i></button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</form>
				</div>
			</div><br><br><br>
		</div>
	</div>
</div>
<script type="text/javascript" src="../../scripts/Validate.js"></script>
<script type="text/javascript" src="../../scripts/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../scripts/materialize.min.js"></script>
<script type="text/javascript" src="../../scripts/combo.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
  });
function verificarEnvio(x, y) {
    var texto = '';
    var nome = 'editNome' + y;
    var idperfil = 'editIdperfil' + y;
    var login = 'editLogin' + y;
    var senha = 'editSenha' + y;
    var email = 'editEmail' + y;
    var instituicao = 'editIdInstituicao' + y;
    var comunidade = 'editIdComunidade' + y;
	document.getElementById('operacao').value=x;
	document.getElementById('idUsuario').value=y;
	document.getElementById('editNome').value=document.getElementById(nome).value;
	document.getElementById('editIdperfil').value=document.getElementById(idperfil).value;
	document.getElementById('editLogin').value=document.getElementById(login).value;
	document.getElementById('editSenha').value=document.getElementById(senha).value;
	document.getElementById('editEmail').value=document.getElementById(email).value;
	document.getElementById('editIdComunidade').value=document.getElementById(comunidade).value;
	document.getElementById('editIdInstituicao').value=document.getElementById(instituicao).value;
	if (x=='1') texto = 'Tem certeza que deseja excluir esse usuário?';
	else texto = 'Tem certeza que deseja editar esse usuário?';
	if (confirm(texto)) return true;
	return false;
}
</script>