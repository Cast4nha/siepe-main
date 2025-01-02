<?php
include_once 'Controller.php';

class ControllerEstado extends Controller
{

    public function getAction()
    {
        if ($this->action == null) {
            include_once '../../model/action/ActionEstado.php';
            $this->action = new ActionEstado();
        }
        return $this->action;
    }

    public function listAllEstados()
    {
        return $this->getAction()->getAll();
    }

    public function getEstado($id)
    {
        return $this->getAction()->getById($id);
    }
    
    public function getEstadoBySigla($sigla)
    {
        return $this->getAction()->getBySigla($sigla);
    }
}

?>