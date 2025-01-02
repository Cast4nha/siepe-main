<?php
include_once 'Controller.php';

class ControllerCidade extends Controller
{

    public function getAction()
    {
        if ($this->action == null) {
            include_once '../../model/action/ActionCidade.php';
            $this->action = new ActionCidade();
        }
        return $this->action;
    }
    
    public function getCidadesByEstado($idEstado)
    {
        return $this->getAction()->getAllByEstado($idEstado);
    }
    
    public function getById($idCidade) {
        return $this->getAction()->getById($idCidade);
    }
   
}
?>