<?php
include_once 'Import.php';
Import::library('Session');
Import::library('Navigation');
Import::bean('Perfil');

class Security
{
	static function restrictPerfilPage($idPerfil)
	{
		
		$arrayPerfil = array($idPerfil);

		
		self::restrictPageByPerfis($arrayPerfil);
	}
	
	static function restrictPageByPerfis($arrayPerfil)
	{
		Session::start();
		if (Session::get('72033f2bbd0a0891df6f24ee5eebfa6e'))
		{
			if (!in_array(Session::get('idperfil'), $arrayPerfil))
			{
				Session::destroy();
				$page = new Page('inicio','accessFail',null,'inicio');
				Navigation::goToActionView($page);
			}

		}else
		{
			Session::destroy();
			$page = new Page('inicio','timeOutAccess',null,'inicio');
			Navigation::goToActionView($page);
		}
	}
}
?>