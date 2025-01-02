<?php
include_once '../../controller/ControllerAmbiente.php';
$controllerAmbiente= new ControllerAmbiente();
$resultado = $controllerAmbiente->cadastrar();
$ambientes = $controllerAmbiente->ListAllAmbiente();
?>
<div class='container'>
	<form method="post" name="form">
		<div class="row">
			<div class="col s12 m12">
			<div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
			<br><h5>Cadastrar Ambiente</h5><br>
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">Ambiente</span>
					<div class="input-field">
						<input id="descricao" class="validate" type="text" name="descricao" size="100" maxlength="100" autofocus/>
						<label for="descricao">Descrição:</label>
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<div class="center">
		<button class="btn waves-effect waves-light bt-default" type="submit" name="CadastrarAmbiente" onclick="return verificar();">Cadastrar</button>
		</div>
	</form>
	<br>
	<div class="row">
		<div class="col s12 m12">
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">Lista de Ambientes Cadastrados</span><br>
					<form method="post">
						<input type="hidden" name="operacao" id="operacao" value="-1"/>
						<input type="hidden" id="idAmbiente" name="idAmbiente" value="-1"/>
						<input type="hidden" id="editDescricao" name="editDescricao" value="-1"/>
						<table class="centered responsive-table">
							<thead>
								<tr>
									<th>Descrição</th>
									<th>Editar</th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($ambientes as $ambiente) { ?>
								<tr>
									<td><input type="text" id="editDescricao<?php echo $ambiente->getId();?>" value="<?php echo $ambiente->getDescricao(); ?>"/></td>
									<td><button class="btn waves-effect waves-light green darken-4" type="submit" onclick="return verificarEnvio('editar','<?php echo $ambiente->getId();?>');"><i class="material-icons">edit</i></button></td>
									<td><button class="btn waves-effect waves-light red darken-4" type="submit" onclick=" return verificarEnvio('excluir','<?php echo $ambiente->getId();?>');"><i class="material-icons">delete_forever</i></button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="../../scripts/Validate.js"></script>
<script type="text/javascript">
	function verificarEnvio(x, y) {
	    var texto = '';
	    var descricao = 'editDescricao' + y;
		document.getElementById('operacao').value=x;
		document.getElementById('idAmbiente').value=y;
		document.getElementById('editDescricao').value=document.getElementById(descricao).value;
		if (x=='excluir') texto = 'Tem certeza que deseja excluir esse ambiente?';
		else texto = 'Tem certeza que deseja editar esse ambiente?';
		if (confirm(texto)) return true;
		return false;
	}
</script>