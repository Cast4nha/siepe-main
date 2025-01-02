<?php
include_once '../../controller/ControllerEspecie.php';
$controllerEspecie= new ControllerEspecie();
$resultado = $controllerEspecie->cadastrar();
$especies = $controllerEspecie->ListAllEspecie();
?>
<div class='container'>
	<form method="post" name="form">
		<div class="row">
			<div class="col s12 m12">
			<div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
			<br><h5>Cadastrar Peixe</h5><br>
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">Peixe</span>
					<div class= 'row'>
						<div class="input-field col s12 m12 l12">
							<input id="nomePopular" required aria-required="true" class="validate" type="text" name="nomePopular" size="100" maxlength="100" autofocus/>
							<label for="nomePopular">Nome Popular:</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m3 l3">
							<input id="genero" type="text" name="genero"/>
							<label for="genero">Gênero:</label>
						</div>
						<div class="input-field col s12 m3 l3">
							<input id="especie" type="text" name="especie"/>
							<label for="especie">Espécie:</label>
						</div>
						<div class="input-field col s12 m3 l3">
							<input id="ordem" type="text" name="ordem"/>
							<label for="ordem">Ordem:</label>
						</div>
						<div class="input-field col s12 m3 l3">
							<input id="familia" type="text" name="familia"/>
							<label for="familia">Família:</label>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<div class="center">
		<button class="btn waves-effect waves-light bt-default" type="submit" name="CadastrarEspecie" onclick="return verificar();">Cadastrar</button>
		</div>
	</form>
	<br>
	<div class="row">
		<div class="col s12 m12">
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">Lista de Espécies Cadastradas</span><br>
					<form method="post">
						<input type="hidden" name="operacao" id="operacao" value="-1"/>
						<input type="hidden" id="idEspecie" name="idEspecie" value="-1"/>
						<input type="hidden" id="editNomePopular" name="editNomePopular" value="-1"/>
						<input type="hidden" id="editGenero" name="editGenero" value="-1"/>
						<input type="hidden" id="editEspecie" name="editEspecie" value="-1"/>
						<input type="hidden" id="editOrdem" name="editOrdem" value="-1"/>
						<input type="hidden" id="editFamilia" name="editFamilia" value="-1"/>
						<table class="centered responsive-table">
							<thead>
								<tr>
									<th>Nome Popular</th>
									<th>Gênero</th>
									<th>Espécie</th>
									<th>Ordem</th>
									<th>Família</th>
									<th>Editar</th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($especies as $especie) { ?>
								<tr>
									<td><input type="text" id="editNomePopular<?php echo $especie->getId();?>" value="<?php echo $especie->getNomepopular(); ?>"/></td>
									<td><input type="text" id="editGenero<?php echo $especie->getId();?>" value="<?php if ($especie->getGenero()!=null) echo $especie->getGenero(); ?>"/></td>
									<td><input type="text" id="editEspecie<?php echo $especie->getId();?>" value="<?php if ($especie->getEspecie()!=null) echo $especie->getEspecie(); ?>"/></td>
									<td><input type="text" id="editOrdem<?php echo $especie->getId();?>" value="<?php if ($especie->getOrdem()!=null) echo $especie->getOrdem(); ?>"/></td>
									<td><input type="text" id="editFamilia<?php echo $especie->getId();?>" value="<?php if ($especie->getFamilia()!=null) echo $especie->getFamilia(); ?>"/></td>
									<td><button class="btn waves-effect waves-light green darken-4" type="submit" onclick="return verificarEnvio('editar','<?php echo $especie->getId();?>');"><i class="material-icons">edit</i></button></td>
									<td><button class="btn waves-effect waves-light red darken-4" type="submit" onclick=" return verificarEnvio('excluir','<?php echo $especie->getId();?>');"><i class="material-icons">delete_forever</i></button></td>
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
	    var nomePopular = 'editNomePopular' + y;
	    var genero = 'editGenero' + y;
	    var especie = 'editEspecie' + y;
	    var ordem = 'editOrdem' + y;
	    var familia = 'editFamilia' + y;
		document.getElementById('operacao').value=x;
		document.getElementById('idEspecie').value=y;
		document.getElementById('editNomePopular').value=document.getElementById(nomePopular).value;
		document.getElementById('editGenero').value=document.getElementById(genero).value;
		document.getElementById('editEspecie').value=document.getElementById(especie).value;
		document.getElementById('editOrdem').value=document.getElementById(ordem).value;
		document.getElementById('editFamilia').value=document.getElementById(familia).value;
		if (x=='excluir') texto = 'Tem certeza que deseja excluir essa espécie?';
		else texto = 'Tem certeza que deseja editar essa espécie?';
		if (confirm(texto)) return true;
		return false;
	}
</script>