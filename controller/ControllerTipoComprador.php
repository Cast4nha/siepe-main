<?php
include_once 'Controller.php';
class ControllerTipoComprador extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
		{
			include_once '../../model/action/ActionTipoComprador.php';
			$this->action = new ActionTipoComprador();
		}
		return $this->action;
	}
	
	public function cadastrar()
	{
		if (isset($_POST['CadastrarTipoComprador']))
		{
			extract($_POST);
			$session = $this->LibSession();
			$result = $this->getAction()->cadastrar($descricao);
			
			if ($result)
			    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Cadastro de Tipo de Comprador Realizado com Sucesso!');
			    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no Cadastro da Tipo de Comprador.');
		}
		if (isset($_POST['operacao']))
		{
			if ($_POST['operacao']=='1') {
				$result = $this->getAction()->excluir($_POST['idTipoComprador']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Tipo de Comprador Excluído com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Exlusão de Tipo de Comprador.');
			}
			if ($_POST['operacao']=='2') {
				$result = $this->getAction()->editar($_POST['idTipoComprador'],$_POST['editDescricao']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Tipo de Comprador Editado com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselectt','Falha na Edição de Tipo de Comprador.');
			}
		}
		
	}
	public function ListAllTipoComprador()
	{
		return $this->getAction()->getAll();
	}
}
?>