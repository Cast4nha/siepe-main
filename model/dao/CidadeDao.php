<?php
include_once 'Dao.php';
include_once '../../library/LibProject.php';

class CidadeDao extends Dao
{
    public function selectAllByEstado($idEstado)
    {
        $this->sql = 'SELECT * FROM cidade WHERE idEstado = ? ORDER BY descricao';
        $this->prepare();
        $this->setParam($idEstado);
        
        return $this->fetchAllStmtObj('Cidade');
    }
    
    public function findById($id)
    {
        $this->sql = 'SELECT * FROM cidade WHERE id = ?';
        $this->prepare();
        $this->setParam($id);
        
        return $this->fetchStmtObj('Cidade');
    }
    
    public function findByNomeAndEstado($nome, $idEstado = null)
    {
        $this->sql = "SELECT * FROM cidade WHERE LOWER(descricao) = LOWER(?) OR LOWER(descricao) = LOWER(?)";
        
        if($idEstado)
            $this->sql .= ' AND idestado = ?';
        
        $this->prepare();
        $this->setParam(trim($nome));
        $this->setParam(LibProject::removerAcentos(trim($nome)));
        
        if($idEstado)
            $this->setParam($idEstado);
        return $this->fetchStmtObj('Cidade');
    }
}
?>