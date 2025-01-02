<?php 
include_once '../../library/Import.php';
Import::library('Security');
Import::library('LoadPage');
Import::controller('ControllerPlanoAcademico');
Security::restrictPerfilPage(Perfil::BOLSISTA);
Import::library('Navigation');
?>
<!DOCTYPE html>
<html>
<head>
	<?php Import::view('template/head'); ?>
	
</head>
<body class="grey lighten-5">
<main>
			<div class="principal">
			
				<div>
					<?php include '../../view/inicio/menu.php'; ?>
				</div>
			
			</div>
			
			<div class="content">
				<div id="content"  style="overflow:auto;height:84%">
				<?php LoadPage::load();	?>
				</div>
			</div>
</main>
			<?php
				Import::view('template/rodape');
			?>
</body>
</html>