<?php
include_once ('Dao.php');
class InstituicaoDao extends Dao
{
    public function insert(Instituicao $instituicao)
    {
        $this->sql = 'INSERT INTO instituicao (descricao) VALUES (?)';
        $this->prepare();
        $this->setParam($instituicao->getDescricao());
        return $this->executeStmt();
    }
    public function findById($idInstituicao)
    {
        $this->sql = 'SELECT * FROM instituicao WHERE id= ?';
        $this->prepare();
        $this->setParam($idInstituicao);
        return $this->fetchStmtObj('Instituicao');
    }
    public function findByDescricao($descricao)
    {
        $this->sql = 'SELECT * FROM instituicao WHERE descricao= ?';
        $this->prepare();
        $this->setParam("$descricao");
        return $this->fetchStmtObj('Instituicao');
    }
    public function selectAll()
    {
        $this->sql = 'SELECT * FROM instituicao ORDER BY descricao';
        $this->prepare();
        return $this->fetchAllStmtObj('Instituicao');
    }
    public function delete($idInstituicao)
    {
        $this->sql = 'DELETE FROM instituicao WHERE id = ?';
        $this->prepare();
        $this->setParam($idInstituicao);
        return $this->executeStmt();
    }
    public function edit(Instituicao $instituicao)
    {
        $this->sql = 'UPDATE instituicao SET descricao = ? WHERE id = ?';
        $this->prepare();
        $this->setParam($instituicao->getDescricao());
        $this->setParam($instituicao->getId());
        
        return $this->executeStmt();
    }
}

