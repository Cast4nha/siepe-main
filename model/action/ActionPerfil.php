<?php
include_once '../../library/Import.php';
Import::action('AbstractAction');
Import::dao('PerfilDao');
Import::bean('Perfil');
Import::exception('NoPersistException');

class ActionPerfil extends AbstractAction
{
	//USES
	protected function getDao()
	{
		if ($this->isNullDao())
			$this->dao = new PerfilDao();
			
			return $this->dao;
	}
	
	//USES
	public function getAll()
	{
		return $this->getDao()->selectAll();
	}
	
	public function getPerfil($idperfil)
	{
		$perfil = new Perfil();
		$perfil->setId($idperfil);
		return $this->getDao()->selectPerfil($perfil);
	}
	
	public function getDescricaoPerfil($idperfil)
	{
		$perfil = new Perfil();
		$perfil->setId($idperfil);
		$novoPerfil = $this->getDao()->selectPerfil($perfil);
		return $novoPerfil->getDescricao();
	}
	
}