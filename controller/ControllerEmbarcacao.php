<?php
include_once 'Controller.php';
class ControllerEmbarcacao extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
		{
			include_once '../../model/action/ActionEmbarcacao.php';
			$this->action = new ActionEmbarcacao();
		}
		return $this->action;
	}
	
	public function cadastrar()
	{
		if (isset($_POST['CadastrarEmbarcacao']))
		{
			extract($_POST);	
			$session = $this->LibSession();
			$result = $this->getAction()->cadastrar($descricao);
	
			if ($result[0])
			    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Cadastro de Embarcação Realizado com Sucesso!');
			    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no Cadastro da Embarcação.');
		}
		if (isset($_POST['operacao']))
		{
			if ($_POST['operacao']=='excluir') {
				$result = $this->getAction()->excluir($_POST['idEmbarcacao']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Embarcação Excluída com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Exlusão da Embarcação.');
			}
			if ($_POST['operacao']=='editar') {
				$result = $this->getAction()->editar($_POST['idEmbarcacao'],$_POST['editDescricao']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Embarcação Editada com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Edição da Embarcação.');
			}
		}
		
	}
	public function ListAllEmbarcacao()
	{
		return $this->getAction()->getAll();
	}
	public function ListAllDistinctEmbarcacao()
	{
		return $this->getAction()->getAllDistinct();
	}
}
?>