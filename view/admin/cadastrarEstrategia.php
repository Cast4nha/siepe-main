<?php
include_once '../../controller/ControllerEstrategia.php';
include_once '../../controller/ControllerInstrumento.php';
$controllerEstrategia= new ControllerEstrategia();
$controllerInstrumento= new ControllerInstrumento();
$resultado = $controllerEstrategia->cadastrar();
$estrategias = $controllerEstrategia->ListAllEstrategia();
$instrumentos = $controllerInstrumento->ListAllInstrumento();
?>
<div class='container'>
	<form method="post" name="form">
		<div class="row">
			<div class="col s12 m12">
				<div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
				<br><h5>Cadastrar Estratégia</h5><br>
				<div class="card z-depth-3">
					<div class="card-content">
						<span class="card-title">Estratégia</span>
						<div class='row'>
							<div class="input-field col s12 m6">
								<input id="descricao" class="validate" type="text" name="descricao" size="100" maxlength="100" autofocus/>
								<label for="descricao">Descrição:</label>
							</div>
							<div class="input-field col s12 m6">
								<select id="idinstrumento" name="idinstrumento">
									<option value="" disabled selected>Escolha uma das opções</option>
									<?php foreach ($instrumentos as $instrumento) { ?>
									<option value="<?php echo $instrumento->getId(); ?>"><?php echo $instrumento->getDescricao(); ?></option>
									<?php } ?>
								</select>
								<label for="idinstrumento">Instrumento:</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="center">
		<button class="btn waves-effect waves-light bt-default" type="submit" name="CadastrarEstrategia">Cadastrar</button>
		</div>
	</form>
	<br>
	<div class="row">
		<div class="col s12 m12">
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">Lista de Estratégias Cadastradas</span><br>
					<form method="post">
						<input type="hidden" name="operacao" id="operacao" value="-1"/>
						<input type="hidden" id="idEstrategia" name="idEstrategia" value="-1"/>
						<input type="hidden" id="editIdinstrumento" name="editIdinstrumento" value="-1"/>
						<input type="hidden" id="editDescricao" name="editDescricao" value="-1"/>
						<table class="centered responsive-table">
							<thead>
								<tr>
									<th>Descrição</th>
									<th>Instrumento</th>
									<th>Editar</th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($estrategias as $estrategia) { ?>
								<tr>
									<td><input type="text" id="editDescricao<?php echo $estrategia->getId();?>" value="<?php echo $estrategia->getDescricao(); ?>"/></td>
									<td>
										<select id="editIdinstrumento<?php echo $estrategia->getId();?>">
											<?php foreach ($instrumentos as $instrumento) { ?>
											<option value="<?php echo $instrumento->getId(); ?>"<?php if ($estrategia->getIdinstrumento()==$instrumento->getId()) echo ' selected'; ?>><?php echo $instrumento->getDescricao(); ?></option>
											<?php } ?>
										</select>
									</td>
									<td><button class="btn waves-effect waves-light green darken-4" type="submit" onclick="return verificarEnvio('editar','<?php echo $estrategia->getId();?>');"><i class="material-icons">edit</i></button></td>
									<td><button class="btn waves-effect waves-light red darken-4" type="submit" onclick=" return verificarEnvio('excluir','<?php echo $estrategia->getId();?>');"><i class="material-icons">delete_forever</i></button></td>
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
	$(document).ready(function() {
		$('select').material_select();
	});
	function verificarEnvio(x, y) {
	    var texto = '';
	    var descricao = 'editDescricao' + y;
	    var editinstrumento = 'editIdinstrumento' + y;
		document.getElementById('operacao').value=x;
		document.getElementById('idEstrategia').value=y;
		document.getElementById('editDescricao').value=document.getElementById(descricao).value;
		document.getElementById('editIdinstrumento').value=document.getElementById(editinstrumento).value;
		if (x=='excluir') texto = 'Tem certeza que deseja excluir essa estratégia de pesca?';
		else texto = 'Tem certeza que deseja editar essa estratégia de pesca?';
		if (confirm(texto)) return true;
		return false;
	}
</script>