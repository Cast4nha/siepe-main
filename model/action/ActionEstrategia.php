<?php
include_once 'Action.php';
class ActionEstrategia extends Action
{
	public function ActionEstrategia()
	{
		if ($this->dao == null)
		{
			include_once '../../model/dao/EstrategiaDao.php';
			include_once '../../model/bean/Estrategia.php';
			$this->dao = new EstrategiaDao();
		}
	}
	
	public function cadastrar($descricao,$idinstrumento)
	{
		$estrategia = new Estrategia();
		
		$estrategia->setDescricao($descricao);
		$estrategia->setIdinstrumento($idinstrumento);
		
		return $this->dao->insert($estrategia);
	}
	
	public function getAll()
	{
		return $this->dao->selectAll();
	}
	
	public function getByDescricao($descricao)
	{
		return $this->dao->findByDescricao($descricao);
	}
	
	public function getByDescricaoInstrumento($descricao,$idInstrumento)
	{
		return $this->dao->findByDescricaoInstrumento($descricao,$idInstrumento);
	}
	
	public function excluir($idEstrategia)
	{
		return $this->dao->delete($idEstrategia);
	}
	
	public function editar($id,$descricao,$idinstrumento)
	{
		$estrategia = new Estrategia();
		$estrategia->setId($id);
		$estrategia->setDescricao($descricao);
		$estrategia->setIdinstrumento($idinstrumento);
		return $this->dao->edit($estrategia);
	}
	public function findById($idEstrategia)
	{
	    return $this->dao->findById($idEstrategia);
	}
	public function findByInstrumento($idInstrumento) {
	    return $this->dao->findByInstrumento($idInstrumento);
	}
}
?>