<?php
include_once 'Action.php';

class ActionEstado extends Action
{

    public function ActionEstado()
    {
        if ($this->dao == null) {
            include_once '../../model/dao/EstadoDao.php';
            include_once '../../model/bean/Estado.php';
            $this->dao = new EstadoDao();
        }
    }

    public function getAll()
    {
        return $this->dao->selectAll();
    }

    public function getById($id)
    {
        return $this->dao->findById($id);
    }
    
    public function getBySigla($sigla)
    {
        return $this->dao->findBySigla($sigla);
    }
}
?>