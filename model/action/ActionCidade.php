<?php
include_once 'Action.php';

class ActionCidade extends Action
{

    public function ActionCidade()
    {
        if ($this->dao == null) {
            include_once '../../model/dao/CidadeDao.php';
            include_once '../../model/bean/Cidade.php';
            $this->dao = new CidadeDao();
        }
    }

    public function getAllByEstado($idEstado)
    {
        return $this->dao->selectAllByEstado($idEstado);
    }

    public function getById($id)
    {
        return $this->dao->findById($id);
    }
    
    public function getByNomeSiglaEstado($nome, $idEstado = null)
    {
        return $this->dao->findByNomeAndEstado($nome, $idEstado);
    }
}
?>