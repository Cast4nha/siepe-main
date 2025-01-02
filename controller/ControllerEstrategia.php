<?php
include_once 'Controller.php';
class ControllerEstrategia extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
		{
			include_once '../../model/action/ActionEstrategia.php';
			$this->action = new ActionEstrategia();
		}
		return $this->action;
	}
	
	public function cadastrar()
	{
		if (isset($_POST['CadastrarEstrategia']))
		{
			extract($_POST);
			$session = $this->LibSession();
			$result = $this->getAction()->cadastrar($descricao,$idinstrumento);
			
			if ($result)
			    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Cadastro de Estratégia de Pesca Realizado com Sucesso!');
			    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no Cadastro de Estratégia de Pesca.');
		}
		if (isset($_POST['operacao']))
		{
			if ($_POST['operacao']=='excluir') {
				$result = $this->getAction()->excluir($_POST['idEstrategia']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Estratégia de Pesca Excluída com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Exlusão de Estratégia de Pesca.');
			}
			if ($_POST['operacao']=='editar') {
				$result = $this->getAction()->editar($_POST['idEstrategia'],$_POST['editDescricao'],$_POST['editIdinstrumento']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Estratégia de Pesca Editada com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Edição de Estratégia de Pesca.');
			}
		}
		
	}
	public function ListAllEstrategia()
	{
		return $this->getAction()->getAll();
	}
}
?>