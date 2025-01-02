<?php
include_once 'Action.php';

class ActionComunidade extends Action
{

    public function ActionComunidade()
    {
        if ($this->dao == null) {
            include_once '../../model/dao/ComunidadeDao.php';
            include_once '../../model/bean/Comunidade.php';
            $this->dao = new ComunidadeDao();
        }
    }

    public function cadastrar($descricao)
    {
        $comunidade = new Comunidade();
        
        $comunidade->setDescricao($descricao);
        
        return $this->dao->insert($comunidade);
    }

    public function getAll()
    {
        return $this->dao->selectAll();
    }

    public function excluir($idComunidade)
    {
        return $this->dao->delete($idComunidade);
    }

    public function editar($id, $descricao)
    {
        $comunidade = new Comunidade();
        $comunidade->setId($id);
        $comunidade->setDescricao($descricao);
        return $this->dao->edit($comunidade);
    }

    public function getById($idComunidade)
    {
        return $this->dao->findById($idComunidade);
    }

    public function getByDescricao($descricao)
    {
        return $this->dao->findByDescricao($descricao);
    }

    public function getCpueComunidade($id)
    {
        return $this->dao->findCpueComunidadeById($id);
    }
    
    public function getAllCpueComunidade()
    {
        return $this->dao->findCpueComunidade();
    }
}
?>