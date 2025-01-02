<?php
include_once 'Controller.php';
class ControllerInstrumento extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
		{
			include_once '../../model/action/ActionInstrumento.php';
			$this->action = new ActionInstrumento();
		}
		return $this->action;
	}
	
	public function cadastrar()
	{
		if (isset($_POST['CadastrarInstrumento']))
		{
			extract($_POST);
			$session = $this->LibSession();
			$result = $this->getAction()->cadastrar($descricao);
			
			if ($result)
			    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Cadastro de Instrumento Realizado com Sucesso!');
			    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no Cadastro de Instrumento.');
		}
		if (isset($_POST['operacao']))
		{
			if ($_POST['operacao']=='1') {
				$result = $this->getAction()->DesAtivarInstrumento($_POST['idInstrumento'],$_POST['editAtivo']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Instrumento Atualizado com Sucesso!');
				else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Atualização de Instrumento.');
			}
			if ($_POST['operacao']=='2') {
				$result = $this->getAction()->editar($_POST['idInstrumento'],$_POST['editDescricao']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Instrumento Editado com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Edição de Instrumento.');
			}
		}
		
	}
	public function ListAllInstrumento()
	{
		return $this->getAction()->getAll();
	}
    public function ListAllInstrumentoAtivo()
    {
        return $this->getAction()->getAllAtivo();
    }
}
?>