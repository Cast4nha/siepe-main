<?php
include_once 'Action.php';
class ActionInstrumento extends Action
{
	public function ActionInstrumento()
	{
		if ($this->dao == null)
		{
			include_once '../../model/dao/InstrumentoDao.php';
			include_once '../../model/bean/Instrumento.php';
			$this->dao = new InstrumentoDao();
		}
	}
	
	public function cadastrar($descricao)
	{
		$instrumento = new Instrumento();
		
		$instrumento->setDescricao($descricao);
		
		return $this->dao->insert($instrumento);
	}
	
	public function getAll()
	{
		return $this->dao->selectAll();
	}

    public function getAllAtivo()
    {
        return $this->dao->selectAllAtivo();
    }
	
	public function getByDescricao($descricao)
	{
		return $this->dao->findByDescricao($descricao);
	}
	
	public function excluir($idInstrumento)
	{
		return $this->dao->delete($idInstrumento);
	}
	
	public function editar($id,$descricao)
	{
		$instrumento = new Instrumento();
		$instrumento->setId($id);
		$instrumento->setDescricao($descricao);
		return $this->dao->edit($instrumento);
	}
	public function getByIdInstrumento($idInstrumento)
	{
	    return $this->dao->findById($idInstrumento);
	}
    public function DesAtivarInstrumento($id,$ativo)
    {
        if($ativo == true)
            $ativo = false;
        else
            $ativo = true;
        return $this->dao->editAtivo($id,$ativo);
    }
}
?>