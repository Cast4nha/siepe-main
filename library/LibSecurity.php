<?php
include_once '../../library/Import.php';
include_once '../../library/LibScript.php';
include_once '../../library/LibSession.php';
Import::library('Session');


class LibSecurity
{
	
	/**
	 * @author Vitor Castro
	 * @desc Segurança das Páginas por Perfil
	 * @since 04/08/2009
	 */
	public function security($nivel)
	{
		$script = new LibScript();
		$session = new LibSession();
		
		Session::start();
		
		$chave = $session->getSession('72033f2bbd0a0891df6f24ee5eebfa6e');
		
		// criptografia security md5('%PROEG - AIT - SISPROL@');
		if (isset($chave)) 
		{	
			if ($_SESSION['idperfil'] != $nivel)
			{
				$session->sessionDestroy();
				$script->scriptLocationIndex('Acesso indevido.');
			}
		}
		else 
		{
			$session->sessionDestroy();
			$script->scriptLocationIndex('Área restrita somente a usuários do sistema.');
		}
	}


}
?>