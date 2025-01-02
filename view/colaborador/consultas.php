<?php
include_once '../../controller/ControllerAcampamento.php';
include_once '../../controller/ControllerAmbiente.php';
include_once '../../controller/ControllerComunidade.php';
include_once '../../controller/ControllerEmbarcacao.php';
include_once '../../controller/ControllerInstituicao.php';
include_once '../../controller/ControllerInstrumento.php';
include_once '../../controller/ControllerPesca.php';
$controllerAcampamento= new ControllerAcampamento();
$controllerAmbiente= new ControllerAmbiente();
$controllerComunidade= new ControllerComunidade();
$controllerEmbarcacao = new ControllerEmbarcacao();
$controllerInstituicao = new ControllerInstituicao();
$controllerInstrumento= new ControllerInstrumento();
$controllerPesca = new ControllerPesca();
$acampamentos = $controllerAcampamento->ListAllNomeAcampamento();
$pesqueiros = $controllerAcampamento->ListAllNomePesqueiro();
$pescadores = $controllerPesca->ListAllPescador();
$portos = $controllerPesca->ListAllPorto();
$rios = $controllerPesca->ListAllRio();
$comunidades = $controllerComunidade->ListAllComunidade();
$instrumentos = $controllerInstrumento->ListAllInstrumento();
$ambientes = $controllerAmbiente->ListAllAmbiente();
$embarcacoes = $controllerEmbarcacao->ListAllEmbarcacao();
$instituicoes = $controllerInstituicao->listInstituicaoPorPerfil();
$pescas = $controllerPesca->consultar();
?>
<div class='container'>
	<form method="post" name="form">
		<div class="row">
			<div class="col s12 m12">
			<br><h5>Consulta Geral</h5><br>
			<div class="card z-depth-3">
				<div class="card-content">
					<div class='row'>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byPescador' name='byPescador' disabled<?php if (isset($_POST["byPescador"]) && $_POST["byPescador"]!=null && $_POST["byPescador"]!="") echo " checked"; ?>>
							<label for='byPescador'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<input id="pescador" type="text" name="pescador" size="100" maxlength="100" autofocus autocomplete="off" value="<?php if (isset($_POST["pescador"])) echo $_POST["pescador"];?>"/>
							<label for="pescador">Pescador:</label>
						</div>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byComunidade' name='byComunidade' disabled<?php if (isset($_POST["byComunidade"]) && $_POST["byComunidade"]!=null && $_POST["byComunidade"]!="") echo " checked"; ?>/>
							<label for='byComunidade'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<input id="comunidade" type="text" name="comunidade" size="100" maxlength="100" autocomplete="off" value="<?php if (isset($_POST["comunidade"])) echo $_POST["comunidade"];?>"/>
							<label for="comunidade">Comunidade:</label>
						</div>
					</div>
					<div class='row'>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byPorto' name='byPorto' disabled<?php if (isset($_POST["byPorto"]) && $_POST["byPorto"]!=null && $_POST["byPorto"]!="") echo " checked"; ?>/>
							<label for='byPorto'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<input id="porto" type="text" name="porto" size="100" maxlength="100" autocomplete="off" value="<?php if (isset($_POST["porto"])) echo $_POST["porto"];?>"/>
							<label for="porto">Porto:</label>
						</div>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byRio' name='byRio' disabled<?php if (isset($_POST["byRio"]) && $_POST["byRio"]!=null && $_POST["byRio"]!="") echo " checked"; ?>/>
							<label for='byRio'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<input id="rio" type="text" name="rio" size="100" maxlength="100" autocomplete="off" value="<?php if (isset($_POST["rio"])) echo $_POST["rio"];?>"/>
							<label for="rio">Rio:</label>
						</div>
					</div>
                    <div class='row'>
                        <div class='col s1 m1 l1 xl1 input-field'>
                            <input type='checkbox' id='byAcampamento' name='byAcampamento' disabled<?php if (isset($_POST["byAcampamento"]) && $_POST["byAcampamento"]!=null && $_POST["byAcampamento"]!="") echo " checked"; ?>/>
                            <label for='byAcampamento'></label>
                        </div>
                        <div class="col s11 m11 l5 xl5 input-field">
                            <input id="acampamento" type="text" name="acampamento" size="100" maxlength="100" autocomplete="off" value="<?php if (isset($_POST["acampamento"])) echo $_POST["acampamento"];?>"/>
                            <label for="acampamento">Acampamento:</label>
                        </div>
                        <div class='col s1 m1 l1 xl1 input-field'>
                            <input type='checkbox' id='byPesqueiro' name='byPesqueiro' disabled<?php if (isset($_POST["byPesqueiro"]) && $_POST["byPesqueiro"]!=null && $_POST["byPesqueiro"]!="") echo " checked"; ?>/>
                            <label for='byPesqueiro'></label>
                        </div>
                        <div class="col s11 m11 l5 xl5 input-field">
                            <input id="pesqueiro" type="text" name="pesqueiro" size="100" maxlength="100" autocomplete="off" value="<?php if (isset($_POST["pesqueiro"])) echo $_POST["pesqueiro"];?>"/>
                            <label for="pesqueiro">Pesqueiro:</label>
                        </div>
                    </div>
					<div class="row">
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byQuantPescadores' name='byQuantPescadores' disabled<?php if (isset($_POST["byQuantPescadores"]) && $_POST["byQuantPescadores"]!=null && $_POST["byQuantPescadores"]!="") echo " checked"; ?>/>
							<label for='byQuantPescadores'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<input id="quant_pescadores" type="number" pattern="\d+" class='validate' name="quant_pescadores" step="1" min="0" value="<?php if (isset($_POST["quant_pescadores"])) echo $_POST["quant_pescadores"];?>"/>
							<label for="quant_pescadores">Quantidade de Pescadores:</label>
						</div>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byIdAmbiente' name='byIdAmbiente' disabled<?php if (isset($_POST["byIdAmbiente"]) && $_POST["byIdAmbiente"]!=null && $_POST["byIdAmbiente"]!="") echo " checked"; ?>/>
							<label for='byIdAmbiente'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<select name='idAmbiente' id='idAmbiente'>
								<option value=''>Selecione</option>
								<?php foreach ($ambientes as $ambiente) { ?>
								<option value='<?php echo $ambiente->getId(); ?>'<?php if (isset($_POST['idAmbiente']) && $_POST['idAmbiente']==$ambiente->getId()) echo ' selected'; ?>><?php echo $ambiente->getDescricao(); ?></option>
								<?php } ?>
							</select>
							<label for="idAmbiente">Ambiente:</label>
						</div>
					</div>
					<div class='row'>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byInstrumento' name='byInstrumento' disabled<?php if (isset($_POST["byInstrumento"]) && $_POST["byInstrumento"]!=null && $_POST["byInstrumento"]!="") echo " checked"; ?>/>
							<label for='byInstrumento'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<select name='instrumento' id='instrumento'>
								<option value=''>Selecione</option>
								<?php foreach ($instrumentos as $instrumento) { ?>
								<option value='<?php echo $instrumento->getId(); ?>'<?php if (isset($_POST['instrumento']) && $_POST['instrumento']==$instrumento->getId()) echo ' selected'; ?>><?php echo $instrumento->getDescricao(); ?></option>
								<?php } ?>
							</select>
							<label for="instrumento">Instrumento:</label>
						</div>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byEmbarcacao' name='byEmbarcacao' disabled<?php if (isset($_POST["byEmbarcacao"]) && $_POST["byEmbarcacao"]!=null && $_POST["byEmbarcacao"]!="") echo " checked"; ?>/>
							<label for='byEmarcacao'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<select name='embarcacao' id='embarcacao'>
								<option value='' selected>Selecione</option>
								<?php foreach ($embarcacoes as $embarcacao) { ?> 
								<option value='<?php echo $embarcacao->getId(); ?>'<?php if (isset($_POST['embarcacao']) && $_POST['embarcacao']==$embarcacao->getId()) echo ' selected'; ?>><?php echo $embarcacao->getDescricao(); ?></option>
								<?php } ?>
							</select>
							<label for="embarcacao">Embarcação:</label>
						</div>
					</div>
					<div class='row'>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byDataInicial' name='byDataInicial' disabled<?php if (isset($_POST["byDataInicial"]) && $_POST["byDataInicial"]!=null && $_POST["byDataInicial"]!="") echo " checked"; ?>/>
							<label for='byDataInicial'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<input id="data_inicial" type="date" name="data_inicial" value="<?php if (isset($_POST["data_inicial"])) echo $_POST["data_inicial"];?>"/>
							<label class='active' for="data_inicial">Data Inicial:</label>
						</div>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byDataFinal' name='byDataFinal' disabled<?php if (isset($_POST["byDataFinal"]) && $_POST["byDataFinal"]!=null && $_POST["byDataFinal"]!="") echo " checked"; ?>/>
							<label for='byDataFinal'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<input id="data_final" type="date" name="data_final" value="<?php if (isset($_POST["data_final"])) echo $_POST["data_final"];?>"/>
							<label class='active' for="data_final">Data Final:</label>
						</div>
					</div>
					<div class='row'>
                        <div class='col s1 m1 l1 xl1 input-field'>
                            <input type='checkbox' id='byAtivo' name='byAtivo' disabled checked="checked"/>
                            <label for='byAtivo'></label>
                        </div>
                        <div class="col s11 m11 l5 xl5 input-field">
                            <select name='pescaAtiva' id='pescaAtiva'>
                                <option value='true'<?php if (isset($_POST['pescaAtiva']) && $_POST['pescaAtiva']=='true') echo ' selected'; ?>>Ativadas</option>
                                <option value='false'<?php if (isset($_POST['pescaAtiva']) && $_POST['pescaAtiva']=='false') echo ' selected'; ?>>Desativadas</option>
                                <option value='t'<?php if (isset($_POST['pescaAtiva']) && $_POST['pescaAtiva']=='t') echo ' selected'; ?>>Todas</option>
                            </select>
                            <label for="pescaAtiva">Status:</label>
                        </div>
						<div class='col s1 m1 l1 xl1 input-field'>
							<input type='checkbox' id='byInstituicao' name='byInstituicao' disabled checked="checked"/>
							<label for='byInstituicao'></label>
						</div>
						<div class="col s11 m11 l5 xl5 input-field">
							<select name='idInstituicao' id='idInstituicao'>
								<?php foreach ($instituicoes as $instituicao) { ?>
								<option value='<?php echo $instituicao->getId(); ?>'<?php if (isset($_POST['idInstituicao']) && $_POST['idInstituicao']==$instituicao->getId()) echo ' selected'; ?>><?php echo $instituicao->getDescricao(); ?></option>
								<?php } ?>
							</select>
							<label for="idInstituicao">Instituição:</label>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<div class="center">
		<button class="btn waves-effect waves-light bt-default" type="submit" onclick='habilitaCheckbox();' name="ConsultarPesca">Buscar</button>
		</div>
	</form>
	<br>
	<div class="row">
		<div class="col s12 m12">
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">
						<div class='row'>
							<div class='col s12 m7 l8 xl9'>Pescas Encontradas (<?php if (!isset($pescas)) { echo '0'; } else { echo sizeof($pescas); } ?>)</div>
							<div class='col s12 m5 l4 xl3 right'>
								<form method="post" action='../inicio/exportacao.php'>
									<input type="hidden" name="pescador" value="<?php echo $_POST['pescador']?>">
									<input type="hidden" name="byPescador" value="<?php echo $_POST['byPescador']?>">
									<input type="hidden" name="comunidade" value="<?php echo $_POST['comunidade']?>">
									<input type="hidden" name="byComunidade" value="<?php echo $_POST['byComunidade']?>">
									<input type="hidden" name="porto" value="<?php echo $_POST['porto']?>">
									<input type="hidden" name="byPorto" value="<?php echo $_POST['byPorto']?>">
									<input type="hidden" name="rio" value="<?php echo $_POST['rio']?>">
									<input type="hidden" name="byRio" value="<?php echo $_POST['byRio']?>">
                                    <input type="hidden" name="acampamento" value="<?php echo $_POST['acampamento']?>">
									<input type="hidden" name="byAcampamento" value="<?php echo $_POST['byAcampamento']?>">
									<input type="hidden" name="pesqueiro" value="<?php echo $_POST['pesqueiro']?>">
									<input type="hidden" name="byPesqueiro" value="<?php echo $_POST['byPesqueiro']?>">
									<input type="hidden" name="quant_pescadores" value="<?php echo $_POST['quant_pescadores']?>">
									<input type="hidden" name="byQuantPescadores" value="<?php echo $_POST['byQuantPescadores']?>">
									<input type="hidden" name="idAmbiente" value="<?php echo $_POST['idAmbiente']?>">
									<input type="hidden" name="byIdAmbiente" value="<?php echo $_POST['byIdAmbiente']?>">
									<input type="hidden" name="instrumento" value="<?php echo $_POST['instrumento']?>">
									<input type="hidden" name="byInstrumento" value="<?php echo $_POST['byInstrumento']?>">
									<input type="hidden" name="embarcacao" value="<?php echo $_POST['embarcacao']?>">
									<input type="hidden" name="byEmbarcacao" value="<?php echo $_POST['byEmbarcacao']?>">
									<input type="hidden" name="data_inicial" value="<?php echo $_POST['data_inicial']?>">
									<input type="hidden" name="byDataInicial" value="<?php echo $_POST['byDataInicial']?>">
									<input type="hidden" name="data_final" value="<?php echo $_POST['data_final']?>">
									<input type="hidden" name="byDataFinal" value="<?php echo $_POST['byDataFinal']?>">
									<input type="hidden" name="byInstituicao" value="<?php echo $_POST['byInstituicao']?>">
									<input type="hidden" name="idInstituicao" value="<?php echo $_POST['idInstituicao']?>">
                                    <input type="hidden" name="byAtivo" value="<?php echo $_POST['byAtivo']?>">
									<input type="hidden" name="pescaAtiva" value="<?php echo $_POST['pescaAtiva']?>">
									<input type="hidden" name="ConsultarPesca" value="1">
									<button type="submit" class="btn waves-effect waves-light bt-default" name="downloadBusca" <?php if (!isset($pescas) || sizeof($pescas) <= 0) echo 'disabled'; ?>>
										<i class="material-icons right">cloud_download</i>Download
									</button>
								</form>
							</div>
						</div>
					</span><br>
					<?php if (isset($pescas) && sizeof($pescas)>0) { ?>
					<form method="post" action="index.php?action=detalhes">
						<input type="hidden" id="idPesca" name="idPesca" value="-1"/>
                        <input type="hidden" name="pescador" value="<?php echo $_POST['pescador']?>">
                        <input type="hidden" name="byPescador" value="<?php if (isset($_POST['byPescador'])) echo $_POST["byPescador"]; ?>">
                        <input type="hidden" name="comunidade" value="<?php echo $_POST['comunidade']?>">
                        <input type="hidden" name="byComunidade" value="<?php if (isset($_POST['byComunidade'])) echo $_POST["byComunidade"]; ?>">
                        <input type="hidden" name="porto" value="<?php echo $_POST['porto']?>">
                        <input type="hidden" name="byPorto" value="<?php if (isset($_POST['byPorto'])) echo $_POST["byPorto"]; ?>">
                        <input type="hidden" name="rio" value="<?php echo $_POST['rio']?>">
                        <input type="hidden" name="byRio" value="<?php if (isset($_POST['byRio'])) echo $_POST["byRio"]; ?>">
                        <input type="hidden" name="acampamento" value="<?php echo $_POST['acampamento']?>">
                        <input type="hidden" name="byAcampamento" value="<?php if (isset($_POST['byAcampamento'])) echo $_POST["byAcampamento"]; ?>">
                        <input type="hidden" name="pesqueiro" value="<?php echo $_POST['pesqueiro']?>">
                        <input type="hidden" name="byPesqueiro" value="<?php if (isset($_POST['byPesqueiro'])) echo $_POST["byPesqueiro"]; ?>">
                        <input type="hidden" name="quant_pescadores" value="<?php echo $_POST['quant_pescadores']?>">
                        <input type="hidden" name="byQuantPescadores" value="<?php if (isset($_POST['byQuantPescadores'])) echo $_POST["byQuantPescadores"]; ?>">
                        <input type="hidden" name="idAmbiente" value="<?php echo $_POST['idAmbiente']?>">
                        <input type="hidden" name="byIdAmbiente" value="<?php if (isset($_POST['byIdAmbiente'])) echo $_POST["byIdAmbiente"]; ?>">
                        <input type="hidden" name="instrumento" value="<?php echo $_POST['instrumento']?>">
                        <input type="hidden" name="byInstrumento" value="<?php if (isset($_POST['byInstrumento'])) echo $_POST["byInstrumento"]; ?>">
                        <input type="hidden" name="embarcacao" value="<?php echo $_POST['embarcacao']?>">
                        <input type="hidden" name="byEmbarcacao" value="<?php if (isset($_POST['byEmbarcacao'])) echo $_POST["byEmbarcacao"]; ?>">
                        <input type="hidden" name="data_inicial" value="<?php echo $_POST['data_inicial']?>">
                        <input type="hidden" name="byDataInicial" value="<?php if (isset($_POST['byDataInicial'])) echo $_POST["byDataInicial"]; ?>">
                        <input type="hidden" name="data_final" value="<?php echo $_POST['data_final']?>">
                        <input type="hidden" name="byDataFinal" value="<?php if (isset($_POST['byDataFinal'])) echo $_POST["byDataFinal"]; ?>">
                        <input type="hidden" name="byInstituicao" value="<?php if (isset($_POST['byInstituicao'])) echo $_POST["byInstituicao"]; ?>">
                        <input type="hidden" name="idInstituicao" value="<?php echo $_POST['idInstituicao']?>">
                        <input type="hidden" name="byAtivo" value="<?php echo $_POST['byAtivo']?>">
                        <input type="hidden" name="pescaAtiva" value="<?php echo $_POST['pescaAtiva']?>">
						<table class="centered striped responsive-table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Data</th>
									<th>Pescador</th>
									<th>CPUE</th>
									<th>Visualizar</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach ($pescas as $pesca) {?>
									<tr>
										<td><?php echo $pesca->getId(); ?></td>
										<td><?php echo date_format(new DateTime($pesca->getDiaInicio()), 'd/m/Y'); ?></td>
										<td><?php echo $pesca->getNomePescador(); ?></td>
										<td><?php if ($pesca->getTempototal()!='00:00:00') echo number_format($pesca->getCpue(),3,',',''); ?></td>
										<td><button class="btn waves-effect waves-light green darken-4" type="submit" onclick="document.getElementById('idPesca').value='<?php echo $pesca->getId(); ?>';"><i class='material-icons'>zoom_in</i></button></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table>
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$('select').material_select();
$('#pescador').on("change", function () {
	if (this.value!=null && this.value!='') $('#byPescador').attr('checked',true);
	else $('#byPescador').attr('checked',false);
});
$('#comunidade').on("change", function () {
	if (this.value!=null && this.value!='') $('#byComunidade').attr('checked',true);
	else $('#byComunidade').attr('checked',false);
});
$('#porto').on("change", function () {
	if (this.value!=null && this.value!='') $('#byPorto').attr('checked',true);
	else $('#byPorto').attr('checked',false);
});
$('#rio').on("change", function () {
	if (this.value!=null && this.value!='') $('#byRio').attr('checked',true);
	else $('#byRio').attr('checked',false);
});
$('#acampamento').on("change", function () {
    if (this.value!=null && this.value!='') $('#byAcampamento').attr('checked',true);
    else $('#byAcampamento').attr('checked',false);
});
$('#pesqueiro').on("change", function () {
    if (this.value!=null && this.value!='') $('#byPesqueiro').attr('checked',true);
    else $('#byPesqueiro').attr('checked',false);
});
$('#quant_pescadores').on("change", function () {
	if (this.value!=null && this.value!='' && /^\d+$/.test(this.value)) $('#byQuantPescadores').attr('checked',true);
	else $('#byQuantPescadores').attr('checked',false);
});
$('#idAmbiente').on("change", function () {
	if (this.value!=null && this.value!='') $('#byIdAmbiente').attr('checked',true);
	else $('#byIdAmbiente').attr('checked',false);
});
$('#instrumento').on("change", function () {
	if (this.value!=null && this.value!='') $('#byInstrumento').attr('checked',true);
	else $('#byInstrumento').attr('checked',false);
});
$('#embarcacao').on("change", function () {
	if (this.value!=null && this.value!='') $('#byEmbarcacao').attr('checked',true);
	else $('#byEmbarcacao').attr('checked',false);
});
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
function habilitaCheckbox() {
	$('input[type=checkbox]').attr('disabled',false);
}

$(function () {
    $('#pescador').autocomplete({
        data: {
            <?php
            $stringPescadores = '';
            foreach ($pescadores as $unidadePescador)
                $stringPescadores .= '"' . $unidadePescador->getNomePescador() . '":null,';
            echo substr($stringPescadores, 0, -1);
            ?>
        },
        minLength: 1
    });
    $('#comunidade').autocomplete({
        data: {
            <?php
            $stringComunidade = '';
            foreach ($comunidades as $unidadeComunidade)
                $stringComunidade .= '"' . $unidadeComunidade->getDescricao() . '":null,';
            echo substr($stringComunidade, 0, -1);
            ?>
        },
        minLength: 1
    });
    $('#porto').autocomplete({
        data: {
            <?php
            $stringPorto = '';
            foreach ($portos as $porto)
                $stringPorto .= '"' . $porto->getNomePorto() . '":null,';
            echo substr($stringPorto, 0, -1);
            ?>
        },
        minLength: 1
    });
    $('#rio').autocomplete({
        data: {
            <?php
            $stringRios = '';
            foreach ($rios as $rio)
                $stringRios .= '"' . $rio->getNomeRio() . '":null,';
            echo substr($stringRios, 0, -1);
            ?>
        },
        minLength: 1
    });
    $('#acampamento').autocomplete({
        data: {
            <?php
            $stringAcampamento = '';
            foreach ($acampamentos as $acampamento)
                $stringAcampamento .= '"' . $acampamento->getNome() . '":null,';
            echo substr($stringAcampamento, 0, -1);
            ?>
        },
        minLength: 1
    });
    $('#pesqueiro').autocomplete({
        data: {
            <?php
            $stringPesqueiro = '';
            foreach ($pesqueiros as $pesqueiro)
                $stringPesqueiro .= '"' . $pesqueiro->getNomePesqueiro() . '":null,';
            echo substr($stringPesqueiro, 0, -1);
            ?>
        },
        minLength: 1
    });
});
</script>