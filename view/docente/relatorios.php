<?php
include_once '../../controller/ControllerComunidade.php';
$controllerComunidade = new ControllerComunidade();
$comunidades = $controllerComunidade->ListAllComunidade();
?>
<div class="container">
	<div class="row">
		<br>
		<h5 class="header">Relatórios</h5>
		<br>
		<ul class="collapsible">
			<li>
				<div class="collapsible-header">Quilos de Pescado por Rio</div>
				<div class="collapsible-body">
					<form method="post" target="_blank"
						action="../relatorios/relatorioQuilosPescaRio.php">
						<div class='row'>
							<div class='col s1 m1 l1 xl1 input-field'>
								<input type='checkbox' id='byDataInicial' name='byDataInicial'
									disabled /> <label for='byDataInicial'></label>
							</div>
							<div class="col s11 m11 l3 xl3 input-field">
								<input id="data_inicial" type="date" name="data_inicial" /> <label
									class='active' for="data_inicial">Data Inicial:</label>
							</div>
							<div class='col s1 m1 l1 xl1 input-field'>
								<input type='checkbox' id='byDataFinal' name='byDataFinal'
									disabled /> <label for='byDataFinal'></label>
							</div>
							<div class="col s11 m11 l3 xl3 input-field">
								<input id="data_final" type="date" name="data_final" /> <label
									class='active' for="data_final">Data Final:</label>
							</div>
							<div class='col s1 m1 l1 xl1 input-field'>
								<input type='checkbox' id='byRio' name='byRio' disabled /> <label
									for='byRio'></label>
							</div>
							<div class="col s11 m11 l3 xl3 input-field">
								<input id="rio" type="text" name="rio" size="100"
									maxlength="100" /> <label for="rio">Rio:</label>
							</div>
						</div>
						<div class="row">
							<div class="center">
								<button class="btn waves-effect waves-light bt-default"
									type="submit" id="gerarQuantPesca" name="gerarQuantPesca">Gerar</button>
							</div>
						</div>
					</form>
				</div>
			</li>
			<li>
				<div class="collapsible-header">CPUE por comunidade</div>
				<div class="collapsible-body">
					<form method="post" target="_blank"
						action="../relatorios/relatorioCpueComunidade.php">
						<div class='row'>
							<div class='input-field col s12 m12'>
								<select name='comunidades[]' id=comunidades multiple>
									<option value='' disabled selected>Escolha uma ou mais opções</option>
									<?php foreach ($comunidades as $comunidade) { ?>
									<option value='<?php echo $comunidade->getId(); ?>'><?php echo $comunidade->getDescricao(); ?></option>
									<?php } ?>
								</select> <label for='comunidades'>Comunidades:</label>
							</div>
						</div>
						<div class="row">
							<div class="center">
								<button class="btn waves-effect waves-light bt-default"
									type="submit" id="gerarCpueComunidade" name="gerarCpueComunidade">Gerar</button>
							</div>
						</div>
					</form>
				</div>
			</li>
			<!-- 			<li> -->
			<!-- 				<div class="collapsible-header">Second</div> -->
			<!-- 				<div class="collapsible-body"> -->
			<!-- 					<p>Lorem ipsum dolor sit amet.</p> -->
			<!-- 				</div> -->
			<!-- 			</li> -->
		</ul>
	</div>
</div>

<script>
$(document).ready(function() {
    $('select').material_select();
});

function validaDataMinMax() {
 	var dataInicial = document.getElementById("data_inicial").value;
 	var dataFinal = document.getElementById("data_final").value;
 	
 	if(dataFinal == "" && dataInicial != "") {
 		$('#data_final').attr('min', dataInicial);
 	} 
 	if (dataInicial == "") {
 		$('#data_final').removeAttr('min');
 	}
 	if(dataInicial == "" && dataFinal != "") {
		$('#data_inicial').attr('max', dataFinal);
	} 
	if (dataFinal == "") {
		$('#data_inicial').removeAttr('max');
	}
}

$('#data_inicial').on("change", function () {
	if (this.value!=null && this.value!='') $('#byDataInicial').attr('checked',true);
	else $('#byDataInicial').attr('checked',false);
});
$('#data_final').on("change", function () {
	if (this.value!=null && this.value!='') $('#byDataFinal').attr('checked',true);
	else $('#byDataFinal').attr('checked',false);
});
$('#data_inicial').on("blur", function() {
 	var di = new Date(this.value);
 	var df = new Date(document.getElementById('data_final').value);
 	if (di>df) {
 		this.value=document.getElementById('data_final').value;
 	}
 	validaDataMinMax();
 });
 
$('#data_final').on("blur", function() {
 	var di = new Date(document.getElementById('data_inicial').value);
 	var df = new Date(this.value);
 	if (df<di) {
 		this.value=document.getElementById('data_inicial').value;
 	}
 	validaDataMinMax();
});
$('#rio').on("change", function () {
	if (this.value!=null && this.value!='') $('#byRio').attr('checked',true);
	else $('#byRio').attr('checked',false);
});
function habilitaCheckbox() {
	$('input[type=checkbox]').attr('disabled',false);
}
</script>