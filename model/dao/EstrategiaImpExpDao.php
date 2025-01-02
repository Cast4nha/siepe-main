<?php

include_once 'Dao.php';

class EstrategiaImpExpDao extends Dao
{

	public function selectAll()
	{
	    $this->sql = 'SELECT * FROM estrategia_imp_exp ORDER BY id';
	    $this->prepare();
	    return $this->fetchAllStmtObj('EstrategiaImpExp');
	}
	
	public function desativarEstrategias()
	{
	    $this->sql = 'UPDATE estrategia_imp_exp SET ativo = false';
	    $this->prepare();
	    return $this->executeStmt();
	}
	
	public function ativarEstrategia($idEstrategia)
	{
	    $this->sql = 'UPDATE estrategia_imp_exp SET ativo = true WHERE id = ?';
	    $this->prepare();
	    $this->setParam($idEstrategia);
	    return $this->executeStmt();
	}
	
	public function selectEstrategiaAtiva()
	{
	    $this->sql = 'SELECT * FROM estrategia_imp_exp WHERE ativo = true';
	    $this->prepare();
	    return $this->fetchStmtObj('EstrategiaImpExp');
	}
	
}


?>