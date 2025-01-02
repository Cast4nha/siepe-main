<?php
include_once '../../library/Import.php';
include_once '../../controller/ControllerSistema.php';
$controllerSistema = new ControllerSistema();
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

			<div class="parallax-container">
				<div class="parallax">
					<img src="../../images/riotauiri.jpg">
				</div>
			</div>
			

			<div class="row">
				<div class="col s12 m12 l10 offset-l1">
					<div class="card">
						<div class="card">
							<div class="card-content">
								<h4 class="header">Sistema Integrado de Estatística Pesqueira</h4>
								<blockquote>O Sistema Integrado de Estatística Pesqueira visa
									subsidiar os dados coletados no âmbito do monitoramento da
									pesca de modo a produzir banco de dados relacional e com menor
									espaço de armazenamento de informações. Permitindo o trabalho
									em rede de modo a descentralizar a entrada de informações por
									diferentes usuários que estejam em diferentes localidades, a
									realização de relatórios, tabelas e gráficos de forma simples e
									leve, tendo como foco principal a análise de captura e esforço
									da pescaria.</blockquote>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l10 offset-l1">
					<div class="card">
						<div class="card">
							<div class="card-content">
								<h4 class="header">Desenvolvedores</h4>
								<div class="row">
									<div class="center">
										<div class="col s12 m12 l4">
											<img src="../../images/renato.png" class="img-dev">
											<div style="font-weight: bold; font-size: 18px;">Renato
												Sabino da Silva</div>
											<div style="font-size: 14px;">Estagiário</div>
											<div style="font-size: 14px;">Laboratório de Computação
												Científica - LCC</div>
											<div style="font-size: 14px;">Universidade Federal do Sul e
												Sudeste do Pará - UNIFESSPA</div>
										</div>
										<div class="col s12 m12 l4">
											<img src="../../images/romulo.png" class="img-dev">
											<div style="font-weight: bold; font-size: 18px;">Rogério
												Romulo da Silva</div>
											<div style="font-size: 14px;">Analista de Tecnologia da
												Informação</div>
											<div style="font-size: 14px;">Laboratório de Computação
												Científica - LCC</div>
											<div style="font-size: 14px;">Universidade Federal do Sul e
												Sudeste do Pará - UNIFESSPA</div>
										</div>
										<div class="col s12 m12 l4">
											<img src="../../images/marcilio.jpeg" class="img-dev">
											<div style="font-weight: bold; font-size: 18px;">Marcílio
												Douglas Silva Marques</div>
											<div style="font-size: 14px;">Analista de Tecnologia da
												Informação</div>
											<div style="font-size: 14px;">Laboratório de Computação
												Científica - LCC</div>
											<div style="font-size: 14px;">Universidade Federal do Sul e
												Sudeste do Pará - UNIFESSPA</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="parallax-container">
				<div class="parallax">
					<img src="../../images/unifesspa.jpg">
				</div>
			</div>
			
		</div>
	</div>
	</main>
			<?php Import::view('template/rodape')?>
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.parallax').parallax();
  });
</script>
</html>