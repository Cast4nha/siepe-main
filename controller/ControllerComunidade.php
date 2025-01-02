<?php
include_once 'Controller.php';
class ControllerComunidade extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
		{
			include_once '../../model/action/ActionComunidade.php';
			$this->action = new ActionComunidade();
		}
		return $this->action;
	}
	
	public function cadastrar()
	{
		if (isset($_POST['CadastrarComunidade']))
		{
			extract($_POST);
			$session = $this->LibSession();
			$result = $this->getAction()->cadastrar($descricao);
			
			if ($result)
				return array('card-panel center z-depth-3 white-text green darken-2 noselect','Cadastro de Comunidade Realizado com Sucesso!');
				else return array('card-panel center z-depth-3 white-text red darken-2','Falha no Cadastro da Comunidade.');
		}
		if (isset($_POST['operacao']))
		{
			if ($_POST['operacao']=='1') {
				$result = $this->getAction()->excluir($_POST['idComunidade']);
				if ($result)
					return array('card-panel center z-depth-3 white-text green darken-2 noselect','Comunidade Excluída com Sucesso!');
					else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Exlusão de Comunidade.');
			}
			if ($_POST['operacao']=='2') {
				$result = $this->getAction()->editar($_POST['idComunidade'],$_POST['editDescricao']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Comunidade Editada com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Edição de Comunidade.');
			}
		}
		
	}
	public function ListAllComunidade()
	{
		return $this->getAction()->getAll();
	}
}
?>