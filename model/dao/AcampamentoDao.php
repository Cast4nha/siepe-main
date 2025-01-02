<?php
include_once 'Dao.php';
class AcampamentoDao extends Dao
{
    public function insert(Acampamento $acampamento)
    {
        $this->sql = 'INSERT INTO acampamento (nome, nome_pesqueiro, idpesca) VALUES (?,?,?)';
        $this->prepare();
        $this->setParam($acampamento->getNome());
        $this->setParam($acampamento->getNomePesqueiro());
        $this->setParam($acampamento->getIdPesca());
        return $this->queryIdStmt();
    }
    public function insertAcampamentoAmbiente($idAcampamento, $idAmbiente)
    {
        $this->sql = 'INSERT INTO acampamento_ambiente (idacampamento,idambiente) VALUES (?,?)';
        $this->prepare();
        $this->setParam($idAcampamento);
        $this->setParam($idAmbiente);
        return $this->queryIdStmt();
    }
    public function findById($idAcampamento)
    {
        $this->sql = 'SELECT * FROM acampamento  WHERE id= ?';
        $this->prepare();
        $this->setParam($idAcampamento);
        return $this->fetchStmtObj('Acampamento');
    }
    public function findAllByNome($nome)
    {
        $this->sql = 'SELECT * FROM acampamento WHERE TRIM(LOWER(nome))= TRIM(LOWER(?))';
        $this->prepare();
        $this->setParam("$nome");
        return $this->fetchAllStmtObj('Acampamento');
    }
    public function findAllAmbienteByIdAcampamento($idAcampamento)
    {
        {
            $this->sql = 'SELECT * FROM acampamento_ambiente WHERE idacampamento = ?';
            $this->prepare();
            $this->setParam($idAcampamento);
            return $this->fetchAllStmtObj('Acampamento');
        }
    }
    public function selectAll()
    {
        $this->sql = 'SELECT * FROM acampamento ORDER BY nome';
        $this->prepare();
        return $this->fetchAllStmtObj('Acampamento');
    }
    public function selectAllNomeAcampamento()
    {
        $this->sql = 'SELECT distinct upper(nome) as nome FROM acampamento ORDER BY upper(nome)';
        $this->prepare();
        return $this->fetchAllStmtObj('Acampamento');
    }
    public function selectAllNomePesqueiro()
    {
        $this->sql = 'SELECT distinct upper(nome_pesqueiro) as nome_pesqueiro FROM acampamento ORDER BY upper(nome_pesqueiro)';
        $this->prepare();
        return $this->fetchAllStmtObj('Acampamento');
    }
    public function delete($idAcampamento)
    {
        $this->sql = 'DELETE FROM ambiente WHERE id = ?';
        $this->prepare();
        $this->setParam($idAcampamento);
        return $this->executeStmt();
    }
    public function edit(Acampamento $acampamento)
    {
        $this->sql = 'UPDATE acampamento SET nome = ?, nome_pesqueiro = ?, idpesca = ? WHERE id = ?';
        $this->prepare();
        $this->setParam($acampamento->getNome());
        $this->setParam($acampamento->getNomePesqueiro());
        $this->setParam($acampamento->getIdPesca());
        $this->setParam($acampamento->getId());

        return $this->executeStmt();
    }
}
?>