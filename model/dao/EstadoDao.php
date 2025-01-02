<?php
include_once 'Dao.php';
class EstadoDao extends Dao
{
    public function selectAll()
    {
        $this->sql = 'SELECT * FROM estado ORDER BY descricao';
        $this->prepare();
        return $this->fetchAllStmtObj('Estado');
    }
    
    public function findById($id)
    {
        $this->sql = 'SELECT * FROM estado WHERE id=?';
        $this->prepare();
        $this->setParam($id);
        return $this->fetchStmtObj('Estado');
    }
    
    public function findBySigla($sigla)
    {
        $this->sql = 'SELECT * FROM estado WHERE LOWER(sigla) = LOWER(?)';
        $this->prepare();
        $this->setParam($sigla);
        return $this->fetchStmtObj('Estado');
    }
}
?>