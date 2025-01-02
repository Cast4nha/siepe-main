<?php
include_once 'Action.php';
class ActionTipoComprador extends Action
{
	public function ActionTipoComprador()
	{
		if ($this->dao == null)
		{
			include_once '../../model/dao/TipoCompradorDao.php';
			include_once '../../model/bean/TipoComprador.php';
			$this->dao = new TipoCompradorDao();
		}
	}
	
	public function cadastrar($descricao)
	{
		$tipoComprador = new TipoComprador();
		
		$tipoComprador->setDescricao($descricao);
		
		return $this->dao->insert($tipoComprador);
	}
	
	public function getAll()
	{
		return $this->dao->selectAll();
	}
	
	public function getByDescricao($descricao)
	{
		return $this->dao->findByDescricao($descricao);
	}
	
	public function excluir($idTipoComprador)
	{
		return $this->dao->delete($idTipoComprador);
	}
	
	public function editar($id,$descricao)
	{
		$tipoComprador = new TipoComprador();
		$tipoComprador->setId($id);
		$tipoComprador->setDescricao($descricao);
		return $this->dao->edit($tipoComprador);
	}
	
	public function getById($idtipocomprador)
	{
		return $this->dao->findById($idtipocomprador);
	}
}
?>