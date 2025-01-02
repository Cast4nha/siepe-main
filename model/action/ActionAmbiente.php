<?php
include_once 'Action.php';
class ActionAmbiente extends Action
{
	public function ActionAmbiente()
	{
		if ($this->dao == null)
		{
			include_once '../../model/dao/AmbienteDao.php';
			include_once '../../model/bean/Ambiente.php';
			$this->dao = new AmbienteDao();
		}
	}
	
	public function cadastrar($descricao)
	{
        $ambiente = new Ambiente();

        $ambiente->setDescricao($descricao);
		
		return $this->dao->insert($ambiente);
	}
	
	public function getAll()
	{
		return $this->dao->selectAll();
	}

    public function getAllByIdAcampamento($idAcampamento)
    {
        return $this->dao->selectAllByIdAcampamento($idAcampamento);
    }

	public function getByDescricao($descricao)
	{
		return $this->dao->findByDescricao($descricao);
	}
	
	public function excluir($idAmbiente)
	{
		return $this->dao->delete($idAmbiente);
	}
	
	public function editar($id,$descricao)
	{
        $ambiente = new Ambiente();
        $ambiente->setId($id);
        $ambiente->setDescricao($descricao);
		return $this->dao->edit($ambiente);
	}
	public function findById($idAmbiente)
	{
	    return $this->dao->findById($idAmbiente);
	}
}
?>