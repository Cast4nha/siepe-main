<?php 
include_once '../../library/Import.php';
include_once '../../controller/ControllerSistema.php';
$controllerSistema = new ControllerSistema();
date_default_timezone_set('America/Belem');
Import::library('Session');

Session::start();
?>
<!DOCTYPE html>
<html>
	<head>
	<?php Import::view('template/head'); ?>
	</head>

	<body class="grey lighten-5">
<main>
		<div id="geral">
			<?php Import::view('template/barraTopo')?>
			<div id="corpo">

					<div class="content" id="content">
					<?php $controllerSistema->index(); ?>
					</div>

			</div>

            <!--inicio graficos-->

            <div class="container">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card z-depth-3">
                            <div class="card-content">
					<span class="card-title"><strong>Estatísticas</strong></span><br />
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="card z-depth-1">
                                            <div class="card-content">
                                                <span class="card-title" style="font-size: 20px;">Quilos de pescado por mês - <?php echo 'Ano: '.date('Y');?></span>
                                                <!-- <div id="chart_quantmes" class="chart"></div> -->
                                                <canvas id="chart_quantmes"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="card z-depth-1">
                                            <div class="card-content">
                                                <span class="card-title" style="font-size: 20px;">Quilos de pescado por comunidade - <?php echo 'Ano: '.date('Y');?></span>
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
                                                <span class="card-title" style="font-size: 20px;">CPUE por comunidade - <?php echo 'Ano: '.date('Y');?></span>
                                                <canvas id="chart_cpuecomunidade"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!--                                <div class="row">-->
<!--                                    <div class="col s12 m12 l12">-->
<!--                                        <div class="card z-depth-1">-->
<!--                                            <div class="card-content">-->
<!--                                                <span class="card-title" style="font-size: 20px;">Quant. de Peixes Ovados - --><?php //echo 'Ano: '.date('Y');?><!--</span>-->
<!--                                                <canvas id="chart_peixes_ovados"></canvas>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="card z-depth-1">
                                            <div class="card-content">
                                                <span class="card-title" style="font-size: 20px;">CPUE por ano</span>
                                                <canvas id="chart_cpueano"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <div class="card z-depth-1">
                                            <div class="card-content">
                                                <span class="card-title" style="font-size: 20px;">Quilos de pescado por espécie -  <?php echo 'Ano: '.date('Y');?></span>
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

            <script type="application/javascript">
                var data = new Date();
                var ano = data.getFullYear();
            </script>
            <script src="../../scripts/Chart.min.js"></script>
            <script src="../../scripts/siepe-charts.js"></script>

            <!--fim graficos-->

		</div>
</main>
			<?php Import::view('template/rodape')?>
	</body>
</html>
