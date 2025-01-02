<?php
include_once 'Dao.php';

class ComunidadeDao extends Dao
{

    public function insert(Comunidade $comunidade)
    {
        $this->sql = "INSERT INTO comunidade (descricao) VALUES (?)";
        $this->prepare();
        
        $this->setParam($comunidade->getDescricao());
        
        return $this->queryIdStmt();
    }
    
    public function selectAll()
    {
        $this->sql = "SELECT id, upper(descricao) as descricao FROM comunidade ORDER BY descricao ASC";
        $this->prepare();
        return $this->fetchAllStmtObj('Comunidade');
    }
    
    public function findById($id)
    {
        $this->sql = "SELECT * FROM comunidade WHERE id = ?";
        $this->prepare();
        
        $this->setParam($id);
        return $this->fetchStmtObj('Comunidade');
    }
    
    public function findByComunidade($procura)
    {
        $this->sql = "SELECT * FROM comunidade WHERE comunidade.descricao LIKE ? ORDER BY comunidade.descricao";
        $this->prepare();
        $this->setParam("%$procura%");
        
        return $this->fetchAllStmtObj('Comunidade');
    }
    
    public function findByDescricao($procura)
    {
    	$this->sql = "SELECT * FROM comunidade WHERE upper(descricao) = upper('$procura')";
    	$this->prepare();

    	return $this->fetchStmtObj('Comunidade');
    }
    
    public function findCpueComunidade()
    {
        $this->sql = "SELECT trim(c.descricao::varchar) as descricao, sum((pesoconsumido + pesovendido) / (numpescadores * ((dia_fim - dia_inicio) + 1))) / count(p.id) as cpue FROM pesca p LEFT JOIN pescador pc ON pc.id=p.idpescador LEFT JOIN comunidade c ON c.id=pc.idcomunidade 
            WHERE p.ativo = true GROUP BY trim(c.descricao) ORDER BY cpue DESC";
        $this->prepare();
        return $this->fetchAllStmtObj('Comunidade');
    }
    
    public function findCpueComunidadeById($id)
    {
        $this->sql = "SELECT trim(c.descricao::varchar) as descricao, sum((pesoconsumido + pesovendido) / (numpescadores * ((dia_fim - dia_inicio) + 1))) / count(p.id) as cpue FROM pesca p LEFT JOIN comunidade c ON c.id=p.idcomunidade 
            WHERE c.id = ? AND p.ativo = true GROUP BY trim(c.descricao) ORDER BY cpue DESC";
        $this->prepare();
        
        $this->setParam($id);
        
        return $this->fetchStmtObj('Comunidade');
    }
    
    public function edit(Comunidade $comunidade)
    {
    	$this->sql = "UPDATE comunidade SET descricao = ? WHERE id = ?";
    	$this->prepare();
    	
    	$this->setParam($comunidade->getDescricao());
    	$this->setParam($comunidade->getId());
    	
    	return $this->executeStmt();
    }
    
    public function delete($idComunidade)
    {
    	$this->sql = 'DELETE FROM comunidade WHERE id = ?';
    	$this->prepare();
    	$this->setParam($idComunidade);
    	return $this->executeStmt();
    }
}
?>