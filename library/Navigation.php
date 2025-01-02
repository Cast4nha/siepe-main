<?php
include_once 'Import.php';
Import::config();
Import::library('MessageProperties');
Import::library('Page');


class Navigation
{
	public static function goToAction(IPage $page)
	{
		if ($page->isMessage())
		{
			if ($page->isParam())
				$message = MessageProperties::getMessageParam($page->getKeyMessageProperties(), $page->getParam());
			else
				$message = MessageProperties::getMessageItem($page->getKeyMessageProperties());
			
			self::sendLocationAlert($page->getAction(), $message);
		}
		else
			self::goToActionNotMessage($page);
	}
	
	public static function goToActionView(IPage $page)
	{
		if ($page->isMessage())
		{
			if ($page->isParam())
				$message = MessageProperties::getMessageParam($page->getKeyMessageProperties(), $page->getParam());
			else
				$message = MessageProperties::getMessageItem($page->getKeyMessageProperties());
				
			self::sendLocationViewAlert($page->getView(),$page->getAction(),$message);
				
		}
		else
			self::goToActionViewNotMessage($page);
	}
	
	private static function goToActionNotMessage(IPage $page)
	{
		$url = Configuracao::getHostAplication()."view/".self::getView()."/index.php?action=".$page->getAction();
		self::redirect($url);
	}
	
	private static function goToActionViewNotMessage(IPage $page)
	{
		$url = Configuracao::getHostAplication()."view/".$page->getView()."/index.php?action=".$page->getAction();
		self::redirect($url);
	}
	
	static function sendLocationViewAlert($view,$action,$msg)
	{
		self::scriptAlert($msg);
		
		$url = Configuracao::getHostAplication()."view/$view/index.php?action=$action";
		
		self::redirect($url);
		
	}
	
	static function sendLocationAlert($action,$msg)
	{
		self::scriptAlert($msg);
		$url = Configuracao::getHostAplication()."view/".self::getView()."/index.php?action=$action";
		self::redirect($url);
	
	}
	
	public static function goToBackAlert($msg)
	{
		self::script("alert('$msg'); window.back();");
	}
	
	
	private static function scriptAlert($alert)
	{
		if (Configuracao::isAlerts())
		{
			self::script("alert('$alert');");
		}
	}
	
	private static function script($clausula)
	{
		echo '<script language="JavaScript">';
		echo $clausula;
		echo '</script>';
	}
	
	public static function getView()
	{
		$url = $_SERVER['REQUEST_URI'];
		
		$posicaoRaizView = strpos($url, 'view/');
		
		$posicaoLocalView = $posicaoRaizView + 5;
		
		$stringParcialView = substr($url, $posicaoLocalView);		
		
		$posicaoBarraFinal =  strpos($stringParcialView,'/');
		
		return substr($stringParcialView,0,$posicaoBarraFinal) ;
	}

	private static function redirect($url)
	{
		echo "<meta http-equiv='refresh' content='0; url=$url'>";
		die();
	}
}

?>