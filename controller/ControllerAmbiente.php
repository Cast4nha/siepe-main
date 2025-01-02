<?php
include_once 'Controller.php';
class ControllerAmbiente extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
		{
			include_once '../../model/action/ActionAmbiente.php';
			$this->action = new ActionAmbiente();
		}
		return $this->action;
	}
	
	public function cadastrar()
	{
		if (isset($_POST['CadastrarAmbiente']))
		{
			extract($_POST);
			$session = $this->LibSession();
			$result = $this->getAction()->cadastrar($descricao);
			
			if ($result)
			    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Cadastro de Ambiente Realizado com Sucesso!');
			    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no Cadastro do Tipo de Local.');
		}
		if (isset($_POST['operacao']))
		{
			if ($_POST['operacao']=='excluir') {
				$result = $this->getAction()->excluir($_POST['idAmbiente']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Tipo de Local Excluído com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Exlusão do Tipo de Local.');
			}
			if ($_POST['operacao']=='editar') {
				$result = $this->getAction()->editar($_POST['idAmbiente'],$_POST['editDescricao']);
				if ($result)
				    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Tipo de Local Editado com Sucesso!');
				    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Edição do Tipo de Local.');
			}
		}
		
	}
	public function ListAllAmbiente()
	{
		return $this->getAction()->getAll();
	}

	public function ListAllByIdAcampamento($idAcampamento)
    {
        return $this->getAction()->getAllByIdAcampamento($idAcampamento);
    }
}
?>