<?php
include_once 'Action.php';

class ActionInstituicao extends Action
{
    public function ActionInstituicao()
    {
        if ($this->dao == null)
        {
            include_once '../../model/dao/InstituicaoDao.php';
            include_once '../../model/bean/Instituicao.php';
            $this->dao = new InstituicaoDao();
        }
    }
    
    public function cadastrar($descricao)
    {
        $instituicao = new Instituicao();
        
        $instituicao->setDescricao($descricao);
        
        return $this->dao->insert($instituicao);
    }
    
    public function getAll()
    {
        return $this->dao->selectAll();
    }
    
    public function getByDescricao($descricao)
    {
        return $this->dao->findByDescricao($descricao);
    }
    
    public function excluir($idInstituicao)
    {
        return $this->dao->delete($idInstituicao);
    }
    
    public function editar($id,$descricao)
    {
        $instituicao = new Instituicao();
        $instituicao->setId($id);
        $instituicao->setDescricao($descricao);
        return $this->dao->edit($instituicao);
    }
    public function findById($idInstituicao)
    {
        return $this->dao->findById($idInstituicao);
    }
}

