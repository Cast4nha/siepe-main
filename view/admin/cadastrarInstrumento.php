<?php
include_once '../../controller/ControllerInstrumento.php';
$controllerInstrumento= new ControllerInstrumento();
$resultado = $controllerInstrumento->cadastrar();
$instrumentos = $controllerInstrumento->ListAllInstrumento();
?>
<div class='container'>
	<form method="post" name="form">
		<div class="row">
			<div class="col s12 m12">
			<div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
			<br><h5>Cadastrar Instrumento</h5><br>
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">Instrumento</span>
					<div class="input-field">
						<input id="descricao" class="validate" type="text" name="descricao" size="100" maxlength="100" autofocus/>
						<label for="descricao">Descrição:</label>
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<div class="center">
		<button class="btn waves-effect waves-light bt-default" type="submit" name="CadastrarInstrumento" onclick="return verificar();">Cadastrar</button>
		</div>
	</form>
	<br>
	<div class="row">
		<div class="col s12 m12">
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">Lista de Instrumentos de Pesca Cadastrados</span><br>
					<form method="post">
						<input type="hidden" name="operacao" id="operacao" value="-1"/>
						<input type="hidden" id="idInstrumento" name="idInstrumento" value="-1"/>
						<input type="hidden" id="editDescricao" name="editDescricao" value="-1"/>
						<input type="hidden" id="editAtivo" name="editAtivo" value="-1"/>
						<table class="centered responsive-table">
							<thead>
								<tr>
									<th>Descrição</th>
									<th>Editar</th>
									<th>Ativo</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($instrumentos as $instrumento) { ?>
								<tr>
                                    <input type="hidden" id="editAtivo<?php echo $instrumento->getId();?>" value="<?php echo $instrumento->getAtivo();?>"/>
									<td><input type="text" id="editDescricao<?php echo $instrumento->getId();?>" value="<?php echo $instrumento->getDescricao(); ?>"/></td>
									<td><button class="btn waves-effect waves-light green darken-4" type="submit" onclick="return verificarEnvio('2','<?php echo $instrumento->getId();?>');"><i class="material-icons">edit</i></button></td>
									<td><button class="btn waves-effect waves-light orange darken-4" type="submit" onclick=" return verificarEnvio('1','<?php echo $instrumento->getId();?>');">
                                            <i class="material-icons"><?php echo $instrumento->getAtivo() ? "check_box" : "check_box_outline_blank"?></i>
                                        </button></td>
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
		document.getElementById('idInstrumento').value=y;
		document.getElementById('editAtivo').value=document.getElementById('editAtivo' + y).value;
		document.getElementById('editDescricao').value=document.getElementById(descricao).value;
		if (x=='1') texto = 'Tem certeza que deseja modificar esse instrumento?';
		else texto = 'Tem certeza que deseja editar esse instrumento?';
		if (confirm(texto)) return true;
		return false;
	}
</script>