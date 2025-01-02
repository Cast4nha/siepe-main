<?php
include_once 'Controller.php';

class ControllerSistema extends Controller {

	public function index()
	{
		if (isset($_GET['action']))
			$file = $_GET['action'] . '.php';
		else
			$file = 'inicio.php';

		if (file_exists($file))
			include "$file";
		else
			$this->LibMessage()->msgAtencao('Página inválida.', 500);
	}
}
?>