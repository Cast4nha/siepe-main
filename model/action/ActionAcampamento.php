<?php
include_once 'Action.php';
class ActionAcampamento extends Action
{
    public function ActionAcampamento()
    {
        if ($this->dao == null)
        {
            include_once '../../model/dao/AcampamentoDao.php';
            include_once '../../model/bean/Acampamento.php';
            $this->dao = new AcampamentoDao();
        }
    }

    public function cadastrar($nome,$nomePesqueiro,$idPesca)
    {
        $acampamento = new Acampamento();

        $acampamento->setNome($nome);
        $acampamento->setNomePesqueiro($nomePesqueiro);
        $acampamento->setIdPesca($idPesca);

        return $this->dao->insert($acampamento);
    }

    public function cadastrarAcampamentoAmbiente($idAcampamento,$idAmbiente) {
        return $this->dao->insertAcampamentoAmbiente($idAcampamento,$idAmbiente);
    }

    public function getAll()
    {
        return $this->dao->selectAll();
    }

    public function getAllByNome($nome)
    {
        return $this->dao->findAllByNome($nome);
    }

    public function getAmbienteByIdAcampamento($idAcampamento)
    {
        return $this->dao->findAllAmbienteByIdAcampamento($idAcampamento);
    }

    public function getAllNomeAcampamento()
    {
        return $this->dao->selectAllNomeAcampamento();
    }

    public function getAllNomePesqueiro()
    {
        return $this->dao->selectAllNomePesqueiro();
    }

    public function excluir($idAcampamento)
    {
        return $this->dao->delete($idAcampamento);
    }

    public function editar($id,$nome,$nomePesqueiro,$idPesca)
    {
        $acampamento = new Acampamento();
        $acampamento->setId($id);
        $acampamento->setNome($nome);
        $acampamento->setNomePesqueiro($nomePesqueiro);
        $acampamento->setIdPesca($idPesca);

        return $this->dao->edit($acampamento);
    }
    public function findById($idAcampamento)
    {
        return $this->dao->findById($idAcampamento);
    }
}
?>