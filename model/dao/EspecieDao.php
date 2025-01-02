<?php
include_once 'Dao.php';

class EspecieDao extends Dao
{

    public function insert(Peixe $especie)
    {
        $this->sql = "INSERT INTO peixe (nomepopular, genero, especie, ordem, familia) VALUES (?, ?, ?, ?, ?)";
        $this->prepare();
        
        $this->setParam($especie->getNomePopular());
        $this->setParam($especie->getGenero());
        $this->setParam($especie->getEspecie());
        $this->setParam($especie->getOrdem());
        $this->setParam($especie->getFamilia());
        
        return $this->queryIdStmt();
    }

    public function selectAll()
    {
        $this->sql = "SELECT * FROM peixe ORDER BY nomepopular ASC";
        $this->prepare();
        return $this->fetchAllStmtObj('Peixe');
    }

    public function findById($id)
    {
        $this->sql = "SELECT * FROM peixe WHERE id = ?";
        $this->prepare();
        
        $this->setParam($id);
        return $this->fetchStmtObj('Peixe');
    }
    
    public function findByDescricao($procura)
    {
    	$this->sql = "SELECT * FROM peixe WHERE nomepopular = ?";
    	$this->prepare();
    	$this->setParam("$procura");
    	
    	return $this->fetchStmtObj('Peixe');
    }
    
    public function findBy(Peixe $peixe)
    {
    	$this->sql = "SELECT * FROM peixe WHERE 1=1";
    	if ($peixe->getNomepopular()!=null) { $this->sql.= ' and nomepopular = ?'; }
    	if ($peixe->getGenero()!=null) { $this->sql.= ' and genero = ?'; }
    	if ($peixe->getEspecie()!=null) { $this->sql.= ' and especie = ?'; }
    	if ($peixe->getOrdem()!=null) { $this->sql.= ' and ordem = ?'; }
    	if ($peixe->getFamilia()!=null){ $this->sql.= 'and familia = ?'; }
    	$this->prepare();
    	if ($peixe->getNomepopular()!=null) { $this->setParam($peixe->getNomepopular());}
    	if ($peixe->getGenero()!=null) { $this->setParam($peixe->getGenero());}
    	if ($peixe->getEspecie()!=null) { $this->setParam($peixe->getEspecie()); }
    	if ($peixe->getOrdem()!=null) { $this->setParam($peixe->getOrdem()); }
    	if ($peixe->getFamilia()!=null) { $this->setParam($peixe->getFamilia()); }
    	
    	return $this->fetchStmtObj('Peixe');
    }
    
    public function findByPopular($procura)
    {
        $this->sql = "SELECT * FROM peixe WHERE nomepopular LIKE ? ORDER BY nomepopular";
        $this->prepare();
        $this->setParam("%$procura%");
        
        return $this->fetchAllStmtObj('Peixe');
    }
    
    public function findByCientifico($procura)
    {
        $this->sql = "SELECT * FROM peixe WHERE nomecientifico LIKE ? ORDER BY .cientifico";
        $this->prepare();
        $this->setParam("%$procura%");
        
        return $this->fetchAllStmtObj('Peixe');
    }
    
    public function findByOrdem($procura) { 
        $this->sql = "SELECT * FROM peixe WHERE ordem LIKE ? ORDER BY nomepopular";
        $this->prepare();
        $this->setParam("%$procura%");
        
        return $this->fetchAllStmtObj('Peixe');
    }
    
    public function findByFamilia($procura) {
        $this->sql = "SELECT * FROM peixe WHERE familia LIKE ? ORDER BY nomepopular";
        $this->prepare();
        $this->setParam("%$procura%");
        
        return $this->fetchAllStmtObj('Peixe');
    }
    
    public function edit(Peixe $especie)
    {
    	$this->sql = "UPDATE peixe SET nomePopular = ?, genero = ?, especie = ?, ordem = ?, familia = ? WHERE id = ?";
    	$this->prepare();
    	
    	$this->setParam($especie->getNomePopular());
    	$this->setParam($especie->getGenero());
    	$this->setParam($especie->getEspecie());
    	$this->setParam($especie->getOrdem());
    	$this->setParam($especie->getFamilia());
    	$this->setParam($especie->getId());
    	
    	return $this->executeStmt();
    }
    
    public function delete($idEspecie)
    {
    	$this->sql = 'DELETE FROM peixe WHERE id = ?';
    	$this->prepare();
    	$this->setParam($idEspecie);
    	return $this->executeStmt();
    }
    
    public function deletePescaEspecie($idPesca)
    {
        $this->sql = 'DELETE FROM pesca_especie WHERE idpesca = ?';
        $this->prepare();
        $this->setParam($idPesca);
        return $this->executeStmt();
    }
}
?>