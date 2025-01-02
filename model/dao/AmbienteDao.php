<?php
include_once 'Dao.php';
class AmbienteDao extends Dao
{
	public function insert(Ambiente $ambiente)
	{
		$this->sql = 'INSERT INTO ambiente (descricao) VALUES(?)';
		$this->prepare();
		$this->setParam($ambiente->getDescricao());
		return $this->queryIdStmt();
	}
	public function findById($idAmbiente)
	{
	    $this->sql = 'SELECT * FROM ambiente  WHERE id= ?';
	    $this->prepare();
	    $this->setParam($idAmbiente);
	    return $this->fetchStmtObj('Ambiente');
	}
	public function findByDescricao($descricao)
	{
		$this->sql = 'SELECT * FROM ambiente WHERE TRIM(LOWER(descricao))= TRIM(LOWER(?))';
		$this->prepare();
		$this->setParam("$descricao");
		return $this->fetchStmtObj('Ambiente');
	}
	public function selectAll()
	{
		$this->sql = 'SELECT * FROM ambiente ORDER BY descricao';
		$this->prepare();
		return $this->fetchAllStmtObj('Ambiente');
	}
    public function selectAllByIdAcampamento($idAcampamento)
    {
        $this->sql = 'SELECT a.* FROM ambiente a JOIN acampamento_ambiente aa ON aa.idambiente=a.id WHERE aa.idacampamento = ? ORDER BY descricao';
        $this->prepare();
        $this->setParam($idAcampamento);
        return $this->fetchAllStmtObj('Ambiente');
    }
	public function delete($idAmbiente)
	{
		$this->sql = 'DELETE FROM ambiente WHERE id = ?';
		$this->prepare();
		$this->setParam($idAmbiente);
		return $this->executeStmt();
	}
	public function edit(Ambiente $ambiente)
	{
		$this->sql = 'UPDATE ambiente SET descricao = ? WHERE id = ?';
		$this->prepare();
		$this->setParam($ambiente->getDescricao());
		$this->setParam($ambiente->getId());
		
		return $this->executeStmt();
	}
}
?>