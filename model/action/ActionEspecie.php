<?php
include_once 'Action.php';
class ActionEspecie extends Action
{
	public function ActionEspecie()
	{
		if ($this->dao == null)
		{
			include_once '../../model/dao/EspecieDao.php';
			include_once '../../model/bean/Peixe.php';
			$this->dao = new EspecieDao();
		}
	}
	
	public function cadastrar($nomePopular,$genero,$especie,$ordem,$familia)
	{
		$peixe = new Peixe();
		$peixe->setNomePopular($nomePopular);
		$peixe->setGenero($genero);
		$peixe->setEspecie($especie);
		$peixe->setOrdem($ordem);
		$peixe->setFamilia($familia);
		
		return $this->dao->insert($peixe);
	}
	
	public function getAll()
	{
		return $this->dao->selectAll();
	}
	
	public function getByDescricao($descricao)
	{
		return $this->dao->findByDescricao($descricao);
	}
	
	public function getBy($popular=null,$genero=null,$especie=null,$ordem=null,$familia=null)
	{
		$peixe = new Peixe();
		$peixe->setNomePopular($popular);
		$peixe->setGenero($genero);
		$peixe->setEspecie($especie);
		$peixe->setOrdem($ordem);
		$peixe->setFamilia($familia);
		return $this->dao->findBy($peixe);
	}
	
	public function getById($idespecie)
	{
		return $this->dao->findById($idespecie);
	}
	
	public function excluir($idEspecie)
	{
		return $this->dao->delete($idEspecie);
	}
	
	public function excluirPescaEspecie($idPesca)
	{
	    return $this->dao->deletePescaEspecie($idPesca);
	}
	
	public function editar($id,$nomePopular,$genero,$especie,$ordem,$familia)
	{
		$peixe= new Peixe();
		$peixe->setId($id);
		$peixe->setNomePopular($nomePopular);
		$peixe->setGenero($genero);
		$peixe->setEspecie($especie);
		$peixe->setOrdem($ordem);
		$peixe->setFamilia($familia);
		
		return $this->dao->edit($peixe);
	}
}
?>