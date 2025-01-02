<?php
include_once '../../controller/ControllerPesca.php';
$controllerPesca = new ControllerPesca();
$anosBanco = $controllerPesca->getAction()->selectAnosPesca();

$ano = date('Y');

if(isset($_POST['anoDash']))
    $ano = $_POST['anoDash'];

?>
<div class="container">
	<div class="row">
		<div class="col s12 m12">
			<div class="card z-depth-3">
				<div class="card-content">
					<span class="card-title">Bem vindo ao Sistema Integrado de
						Estatística Pesqueira</span><br />

                    <form method="post" action="">
                        <div class="row wrapper center center-block" >
                            <div class="input-field col s3">
                                <select id="anoDash" name="anoDash" onchange="this.form.submit()">
                                    <?php foreach ($anosBanco as $anoBanco){ ?>
                                        <option value="<?=$anoBanco['ano']?>" <?php echo $ano == $anoBanco['ano'] ? 'selected' : '';?> ><?=$anoBanco['ano']?></option>
                                    <?php } ?>
                                </select>
                                <label for="anoDash">Selecione o Ano: </label>
                            </div>
                        </div>
                    </form>

					<div class="row">
						<div class="col s12 m12 l6">
							<div class="card z-depth-1">
								<div class="card-content">
									<span class="card-title" style="font-size: 20px;">Quilos de pescado por mês - <?php echo 'Ano: '.$ano;?></span>
									<!-- <div id="chart_quantmes" class="chart"></div> -->
									<canvas id="chart_quantmes"></canvas>
								</div>
							</div>
						</div>
						<div class="col s12 m12 l6">
							<div class="card z-depth-1">
								<div class="card-content">
									<span class="card-title" style="font-size: 20px;">Quilos de pescado por comunidade - <?php echo 'Ano: '.$ano;?></span>
									<!-- <div id="chart_quantuser" class="chart"></div> -->
									<canvas id="chart_quantuser"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12 l12">
							<div class="card z-depth-1">
								<div class="card-content">
									<span class="card-title" style="font-size: 20px;">CPUE por comunidade - <?php echo 'Ano: '.$ano;?></span>
									<canvas id="chart_cpuecomunidade"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
<!--						<div class="col s12 m12 l4">-->
<!--							<div class="card z-depth-1">-->
<!--								<div class="card-content">-->
<!--									<span class="card-title" style="font-size: 20px;">Quant. de Peixes Ovados - --><?php //echo 'Ano: '.date('Y');?><!--</span>-->
<!--									<canvas id="chart_peixes_ovados"></canvas>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
						<div class="col s12 m12 l6">
							<div class="card z-depth-1">
								<div class="card-content">
									<span class="card-title" style="font-size: 20px;">CPUE por ano</span>
									<canvas id="chart_cpueano"></canvas>
								</div>
							</div>
						</div>

						<div class="col s12 m12 l6">
							<div class="card z-depth-1">
								<div class="card-content">
									<span class="card-title" style="font-size: 20px;">Quilos de pescado por espécie -  <?php echo 'Ano: '.$ano;?></span>
									<canvas id="chart_peixes"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type='text/javascript'>
    var ano = <?=$ano?>;
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
<script src="../../scripts/Chart.min.js"></script>
<script src="../../scripts/siepe-charts.js"></script>
