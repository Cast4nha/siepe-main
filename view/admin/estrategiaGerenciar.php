<?php

include_once '../../library/Import.php';
Import::controller("ControllerEstrategiaImpExp");

$controllerImpExp = new ControllerEstrategiaImpExp();
$resultado = $controllerImpExp->atualizarEstrategia();

$estrategias = $controllerImpExp->getAction()->getAll();

?>

<div class='container'>
	<form method="post" name="form" id="form-salvar">
				
	<div class="row">
		<div class="col s12 m12">
		
		<div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
		
		<div class="card z-depth-3">
			<div class="card-content">
				<span class="card-title">Estratégia de Importação/Exportação</span>
				
				<div class='row'>
				
				<div class="input-field col s12 m12">
                	<select id="idEstrategia" name="idEstrategia" class='validate'>
                    	<option value="" disabled>Escolha uma das opções</option>
                    	<?php foreach ($estrategias as $estrategia) { ?>
                    		<option value="<?php echo $estrategia->getId(); ?>" <?php if ($estrategia->getAtivo()) echo 'selected'; ?>><?php echo $estrategia->getDescricao(); ?></option>
                    	<?php } ?>
                    </select>
    							
					<label for="idEstrategia">Selecione uma Estratégia de Importação/Exportação:</label>
				</div>
				</div>
				
				<div class="row">
            		<div class="center">
                    		<button class="btn waves-effect waves-light bt-default" type="submit" id="salvar" name="salvar-estrategia">Salvar</button>
            		</div>
                </div>
			</div>
		</div>
		</div>
	</div>
	</form>
</div>

<script type="text/javascript" src="../../scripts/Validate.js"></script>
<script type="text/javascript" src="../../scripts/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../scripts/materialize.min.js"></script>
<script type="text/javascript" src="../../scripts/combo.js"></script>

