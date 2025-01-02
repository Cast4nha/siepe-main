<?php
include_once 'Dao.php';
class PerfilDao extends Dao
{
	public function selectAll()
	{
		$this->sql = 'SELECT * FROM perfil';
		$this->prepare();
		return $this->fetchAllStmtObj('Perfil');
	}
	
	public function selectPerfil(Perfil $perfil)
	{
		$this->sql = 'SELECT * FROM perfil WHERE id = ?';
		$this->prepare();
		$this->setParam($perfil->getId());
		
		return $this->fetchStmtObj('Perfil');
	}
}