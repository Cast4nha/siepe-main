<?php
include_once 'Controller.php';
class ControllerEspecie extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
		{
			include_once '../../model/action/ActionEspecie.php';
			$this->action = new ActionEspecie();
		}
		return $this->action;
	}
	
	public function cadastrar()
	{
		if (isset($_POST['CadastrarEspecie']))
		{
			extract($_POST);
			$session = $this->LibSession();
			$result = $this->getAction()->cadastrar($nomePopular,$genero,$especie,$ordem,$familia);
			
			if ($result)
			    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Cadastro de Espécie Realizado com Sucesso!');
			    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no Cadastro da Espécie.');
		}
		if (isset($_POST['operacao']))
		{
			if ($_POST['operacao']=='excluir') {
				$result = $this->getAction()->excluir($_POST['idEspecie']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Espécie Excluído com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Exlusão de Espécie.');
			}
			if ($_POST['operacao']=='editar') {
				$result = $this->getAction()->editar($_POST['idEspecie'],$_POST['editNomePopular'],$_POST['editGenero'],$_POST['editEspecie'],$_POST['editOrdem'],$_POST['editFamilia']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Espécie Editado com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Edição de Espécie.');
			}
		}
		
	}
	public function ListAllEspecie()
	{
		return $this->getAction()->getAll();
	}
}
?>