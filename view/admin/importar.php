<?php 
use PhpCsFixer\Config;

include_once '../../controller/ControllerEstrategiaImpExp.php';
Import::config();

$controller = new ControllerEstrategiaImpExp();
$resultado = $controller->importar();
?>

<div class='container'>
	<div class="row">
		<div class="col s12 m12">
			<div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
			<br><h5>Importar CSV</h5><br>
			
			<div class="card z-depth-3">
				<div class="card-content">
					<p>Baixe o modelo abaixo e substitua os dados pelos seus de acordo com o que está sugerido nele:</p>
					<a title="Modelo Para Importação" href="<?=Configuracao::getHostAplication().$controller->getModelo()?>">Modelo Para Importação</a>
				</div>
			</div>
			
			<form method="post" enctype="multipart/form-data">
				<div class="card z-depth-3">
					<div class="card-content">
						<div id="result"></div>
						<div class="file-field input-field">
							<div class="btn waves-effect waves-light bt-default">
								<span>Arquivo</span>
								<input type="file" name="arquivo" required aria-required="true" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" onchange="checkfile(this);">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
					</div>
				</div>
				<div class="center">
					<button class="btn waves-effect waves-light bt-default" type="submit" name="ImportarCSV" onclick="">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="../../scripts/Validate.js"></script>
<script type="text/javascript">
function checkfile(sender) {
    var validExts = new Array(".xlsx", ".xls");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("O arquivo selecionado é inválido. Os tipos de arquivos suportados são " + validExts.toString() + ".");
      sender.value=null;
      return false;
    }
    else return true;
}
</script>