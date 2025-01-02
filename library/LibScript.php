<?php
include_once '../../config/Configuracao.php';

class LibScript
{
	public function scriptAlert($alert)
	{
		if (Configuracao::isAlerts())
		{
			echo '<script language="JavaScript">';
			echo "alert('$alert');";
			echo '</script>';
		}
	}

	public function redirect($url)
	{
		echo "<meta http-equiv='refresh' content='0; url=$url'>";
		die();
	}
	
	public function getView()
	{
		$url = $_SERVER['REQUEST_URI'];
		
		$posicaoRaizView = strpos($url, 'view/');
		
		$posicaoLocalView = $posicaoRaizView + 5;
		
		$stringParcialView = substr($url, $posicaoLocalView);		
		
		$posicaoBarraFinal =  strpos($stringParcialView,'/');
		
		return substr($stringParcialView,0,$posicaoBarraFinal) ;
	}

	public function scriptLocationAlert($action,$msg)
	{
		$this->scriptAlert($msg);
		
		$this->scriptWindow($this->getView(),$action);
	}

	public function scriptWindow($view,$action)
	{
		$url = Configuracao::getHostAplication()."view/$view/index.php?action=$action";
		
		$this->redirect($url);
	}

	public function scriptLocationIndex($msg)
	{
		$this->scriptAlert($msg);
		
		$url = Configuracao::getHostAplication();

		$this->redirect($url);
	}
	
	public function scriptLocationAlertBack($alert)
	{
		echo '<script language="JavaScript">';
		
		if (Configuracao::isAlerts())
			echo "alert('$alert');";
			
		echo 'window.history.back(-1);';
		echo '</script>';
		die();
	}

}

?>