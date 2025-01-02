<?php
include_once 'Dao.php';
class InstrumentoDao extends Dao
{
    public function insert(Instrumento $instrumento)
    {
        $this->sql = "INSERT INTO instrumento (descricao) VALUES (?)";
        $this->prepare();
        
        $this->setParam($instrumento->getDescricao());
        
        return $this->queryIdStmt();
    }
    
    public function selectAll()
    {
        $this->sql = "SELECT * FROM instrumento ORDER BY descricao ASC";
        $this->prepare();
        return $this->fetchAllStmtObj('Instrumento');
    }
    
    public function findById($id)
    {
        $this->sql = "SELECT * FROM instrumento WHERE id = ?";
        $this->prepare();
        $this->setParam($id);
        
        return $this->fetchStmtObj('Instrumento');
    }
    
    public function findByDescricao($procura)
    {
        $this->sql = "SELECT * FROM instrumento WHERE TRIM(LOWER(instrumento.descricao)) = TRIM(LOWER(?))";
        $this->prepare();
        $this->setParam("$procura");
        
        return $this->fetchStmtObj('Instrumento');
    }
    
    public function findByInstrumento($procura)
    {
    	$this->sql = "SELECT * FROM instrumento WHERE instrumento.descricao LIKE ? ORDER BY instrumento.descricao";
    	$this->prepare();
    	$this->setParam("%$procura%");
    	
    	return $this->fetchAllStmtObj('Instrumento');
    }
    
    public function edit(Instrumento $instrumento)
    {
    	$this->sql = "UPDATE instrumento SET descricao = ? WHERE id = ?";
    	$this->prepare();
    	
    	$this->setParam($instrumento->getDescricao());
    	$this->setParam($instrumento->getId());
    	
    	return $this->executeStmt();
    }
    
    public function delete($idInstrumento)
    {
    	$this->sql = 'DELETE FROM instrumento WHERE id = ?';
    	$this->prepare();
    	$this->setParam($idInstrumento);
    	return $this->executeStmt();
    }

    public function editAtivo($id,$ativo)
    {
        $ativo = boolval($ativo) ? 'true' : 'false';
        $this->sql = "UPDATE instrumento SET ativo = ? WHERE id = ?";
        $this->prepare();

        $this->setParam($ativo);
        $this->setParam($id);

        return $this->executeStmt();
    }

    public function selectAllAtivo()
    {
        $this->sql = "SELECT * FROM instrumento WHERE ativo = true ORDER BY descricao ASC";
        $this->prepare();
        return $this->fetchAllStmtObj('Instrumento');
    }
}
?>