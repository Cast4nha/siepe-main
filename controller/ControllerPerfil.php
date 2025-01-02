<?php
include_once '../../library/Import.php';
Import::library('Map');
Import::library('Navigation');
Import::controller('Controller');
Import::action('ActionPerfil');
Import::bean('Perfil');

class ControllerPerfil extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
			$this->action = new ActionPerfil();
			
			return $this->action;
	}
	public function getAllPerfis()
	{
		return $this->getAction()->getAll();
	}
	public function getPerfil($idperfil)
	{
		return $this->getAction()->getPerfil($idperfil);
	}
}