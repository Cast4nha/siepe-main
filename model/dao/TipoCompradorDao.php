<?php
include_once 'Dao.php';
class TipoCompradorDao extends Dao
{
	public function insert(TipoComprador $tipoComprador)
	{
		$this->sql = 'INSERT INTO tipocomprador(descricao) VALUES(?)';
		$this->prepare();
		$this->setParam($tipoComprador->getDescricao());
		return $this->queryIdStmt();
	}
	public function selectAll()
	{
		$this->sql = 'SELECT * FROM tipocomprador ORDER BY descricao';
		$this->prepare();
		return $this->fetchAllStmtObj('TipoComprador');
	}
	public function findByDescricao($descricao)
	{
		$this->sql = 'SELECT * FROM tipocomprador WHERE descricao = ?';
		$this->prepare();
		$this->setParam("$descricao");
		return $this->fetchStmtObj('TipoComprador');
	}
	public function findById($idtipocomprador)
	{
		$this->sql = 'SELECT * FROM tipocomprador WHERE id = ?';
		$this->prepare();
		$this->setParam($idtipocomprador);
		return $this->fetchStmtObj('TipoComprador');
	}
	public function delete($idTipoComprador)
	{
		$this->sql = 'DELETE FROM tipocomprador WHERE id = ?';
		$this->prepare();
		$this->setParam($idTipoComprador);
		return $this->executeStmt();
	}
	public function edit(TipoComprador $tipoComprador)
	{
		$this->sql = 'UPDATE tipocomprador SET descricao = ? WHERE id = ?';
		$this->prepare();
		$this->setParam($tipoComprador->getDescricao());
		$this->setParam($tipoComprador->getId());
		return $this->executeStmt();
	}
}
?>