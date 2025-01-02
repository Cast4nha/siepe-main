<?php
include_once 'Controller.php';
class ControllerAcampamento extends Controller
{
    public function getAction()
    {
        if ($this->action == null)
        {
            include_once '../../model/action/ActionAcampamento.php';
            $this->action = new ActionAcampamento();
        }
        return $this->action;
    }

    public function cadastrar($nome,$nomePesqueiro,$idPesca)
    {
        return $this->getAction()->cadastrar($nome,$nomePesqueiro,$idPesca);
    }
    public function ListAllAcampamento()
    {
        return $this->getAction()->getAll();
    }
    public function ListAllNomeAcampamento()
    {
        return $this->getAction()->getAllNomeAcampamento();
    }
    public function ListAllNomePesqueiro()
    {
        return $this->getAction()->getAllNomePesqueiro();
    }
}
?>