<?php
include_once 'Dao.php';
class EstrategiaDao extends Dao
{
	public function insert(Estrategia $estrategia)
	{
		$this->sql = 'INSERT INTO estrategia (descricao,idinstrumento) VALUES (?,?)';
		$this->prepare();
		$this->setParam($estrategia->getDescricao());
		$this->setParam($estrategia->getIdinstrumento());
		return $this->queryIdStmt();
	}
	public function findById($idEstrategia)
	{
	    $this->sql = 'SELECT * FROM estrategia WHERE id= ?';
	    $this->prepare();
	    $this->setParam($idEstrategia);
	    return $this->fetchStmtObj('Estrategia');
	}
	public function findByDescricao($descricao)
	{
		$this->sql = 'SELECT * FROM estrategia WHERE descricao= ?';
		$this->prepare();
		$this->setParam("$descricao");
		return $this->fetchStmtObj('Estrategia');
	}
	public function findByDescricaoInstrumento($descricao,$idinstrumento)
	{
		$this->sql = 'SELECT * FROM estrategia WHERE LOWER(descricao) = LOWER(?) and idinstrumento=?';
		$this->prepare();
		$this->setParam("$descricao");
		$this->setParam($idinstrumento);
		return $this->fetchStmtObj('Estrategia');
	}
	public function selectAll()
	{
		$this->sql = 'SELECT * FROM estrategia ORDER BY descricao';
		$this->prepare();
		return $this->fetchAllStmtObj('Estrategia');
	}
	public function delete($idEstrategia)
	{
		$this->sql = 'DELETE FROM estrategia WHERE id = ?';
		$this->prepare();
		$this->setParam($idEstrategia);
		return $this->executeStmt();
	}
	public function edit(Estrategia $estrategia)
	{
		$this->sql = 'UPDATE estrategia SET descricao = ?, idinstrumento = ? WHERE id = ?';
		$this->prepare();
		$this->setParam($estrategia->getDescricao());
		$this->setParam($estrategia->getIdinstrumento());
		$this->setParam($estrategia->getId());

		return $this->executeStmt();
	}
	public function findByInstrumento($idInstrumento)
	{
	    $this->sql = 'SELECT * FROM estrategia WHERE idinstrumento= ?';
	    $this->prepare();
	    $this->setParam("$idInstrumento");
	    return $this->fetchAllStmtObj('Estrategia');
	}
}
?>
