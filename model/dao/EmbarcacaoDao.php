<?php
include_once 'Dao.php';
class EmbarcacaoDao extends Dao
{
	public function insert(Embarcacao $embarcacao)
	{
		$this->sql = 'INSERT INTO embarcacao(descricao) VALUES(?)';
		$this->prepare();
		$this->setParam($embarcacao->getDescricao());
		return $this->queryIdStmt();
	}
	
	public function insertPescaEmbarcacao(PescaEmbarcacao $pescaEmbarcacao)
	{
		$this->sql = 'INSERT INTO pesca_embarcacao(idpesca, idembarcacao, tamanho, motorpotencia) VALUES(?, ?, ?, ?)';
		$this->prepare();
		$this->setParam($pescaEmbarcacao->getIdpesca());
		$this->setParam($pescaEmbarcacao->getIdembarcacao());
		$this->setParam($pescaEmbarcacao->getTamanho());
		$this->setParam($pescaEmbarcacao->getMotorpotencia());
		return $this->queryIdStmt();
	}
	
	public function selectAllEmbarcacao() 
	{
	    $this->sql = 'SELECT * FROM embarcacao';
	    $this->prepare();
	    return $this->fetchAllStmtObj('Embarcacao');
	}
	
	public function selectAllPescaEmbarcacao()
	{
	    $this->sql = 'SELECT * FROM pesca_embarcacao';
	    $this->prepare();
	    return $this->fetchAllStmtObj('PescaEmbarcacao');
	}
	
	public function findById($id)
	{
	    $this->sql = 'SELECT * FROM embarcacao WHERE id = ?';
	    $this->prepare();
	    $this->setParam($id);
	    return $this->fetchStmtObj('Embarcacao');
	}
	
	public function findByDescricao($descricao)
	{
		$this->sql = 'SELECT * FROM embarcacao WHERE descricao ilike ?';
		$this->prepare();
		$this->setParam("$descricao");
		return $this->fetchStmtObj('Embarcacao');
	}
	
	public function selectPescaEmbarcacaoById($id)
	{
	    $this->sql = 'SELECT * FROM PescaEmbarcacao WHERE id = ?';
	    $this->prepare();
	    $this->setParam($id);
	    return $this->fetchStmtObj('PescaEmbarcacao');
	}
	
	public function selectPescaEmbarcacaoByPesca($idPesca)
	{
	    $this->sql = 'SELECT * FROM PescaEmbarcacao WHERE idpesca = ?';
	    $this->prepare();
	    $this->setParam($idPesca);
	    return $this->fetchStmtObj('PescaEmbarcacao');
	}
	
	public function selectPescaEmbarcacaoByEmbarcacao($idEmbarcacao)
	{
	    $this->sql = 'SELECT * FROM PescaEmbarcacao WHERE idembarcacao = ?';
	    $this->prepare();
	    $this->setParam($idEmbarcacao);
	    return $this->fetchStmtObj('PescaEmbarcacao');
	}
	
	public function selectPescaEmbarcacaoByTamanho($tamanho)
	{
	    $this->sql = 'SELECT * FROM PescaEmbarcacao WHERE tamanho = ?';
	    $this->prepare();
	    $this->setParam($tamanho);
	    return $this->fetchStmtObj('PescaEmbarcacao');
	}
	
	public function selectPescaEmbarcacaoByMotorPotencia($motorPotencia)
	{
	    $this->sql = 'SELECT * FROM PescaEmbarcacao WHERE motorpotencia = ?';
	    $this->prepare();
	    $this->setParam($motorPotencia);
	    return $this->fetchStmtObj('PescaEmbarcacao');
	}
	
	public function selectAllDistinctEmbarcacao()
	{
	    $this->sql = 'SELECT DISTINCT id FROM embarcacao';
	    $this->prepare();
	    return $this->fetchAllStmtObj('Embarcacao');
	}
	
	public function selectAllDistinctPescaEmbarcacao()
	{
		$this->sql = 'SELECT DISTINCT id FROM pescaembarcacao ORDER BY descricao';
		$this->prepare();
		return $this->fetchAllStmtObj('PescaEmbarcacao');
	}
	
	public function findEmbarcacaoBy(Embarcacao $embarcacao)
	{
		$this->sql = 'SELECT * FROM embarcacao WHERE id = ?, descricao = ?';
		$this->prepare();
		$this->setParam($embarcacao->getId());
		$this->setParam($embarcacao->getDescricao());
		return $this->fetchStmtObj('Embarcacao');
	}
	
	public function findPescaEmbarcacaoBy(PescaEmbarcacao $pescaEmbarcacao)
	{
	    $this->sql = 'SELECT * FROM embarcacao WHERE id = ?, idpesca = ?, idembarcacao = ?, tamanho = ?, motorpotencia = ?';
	    $this->prepare();
	    $this->setParam($pescaEmbarcacao->getId());
	    $this->setParam($pescaEmbarcacao->getIdpesca());
	    $this->setParam($pescaEmbarcacao->getIdembarcacao());
	    $this->setParam($pescaEmbarcacao->getTamanho());
	    $this->setParam($pescaEmbarcacao->getMotorpotencia());
	    return $this->fetchStmtObj('PescaEmbarcacao');
	}
	
	
	public function delete($idEmbarcacao)
	{
		$this->sql = 'DELETE FROM embarcacao WHERE id = ?';
		$this->prepare();
		$this->setParam($idEmbarcacao);
		return $this->executeStmt();
	}
	
	public function deletePescaEmbarcacao($idPesca)
	{
	    $this->sql = 'DELETE FROM pesca_embarcacao WHERE idpesca = ?';
	    $this->prepare();
	    $this->setParam($idPesca);
	    return $this->executeStmt();
	}
	
	public function edit(Embarcacao $embarcacao)
	{
		$this->sql = 'UPDATE embarcacao SET descricao = ? WHERE id = ?';
		$this->prepare();
		$this->setParam($embarcacao->getDescricao());
		$this->setParam($embarcacao->getId());
		return $this->executeStmt();
	}
}
?>