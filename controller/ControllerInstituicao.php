<?php
include_once 'Controller.php';
include_once 'ControllerUsuario.php';

class ControllerInstituicao extends Controller
{
    public function getAction()
    {
        if ($this->action == null)
        {
            include_once '../../model/action/ActionInstituicao.php';
            $this->action = new ActionInstituicao();
        }
        return $this->action;
    }
    
    public function cadastrar()
    {
        if (isset($_POST['CadastrarInstituicao']))
        {
            extract($_POST);
            
            $session = $this->LibSession();
            $result = $this->getAction()->cadastrar($descricao);
            if ($result)
                return array('card-panel center z-depth-3 white-text green darken-2 noselect','Cadastro de Instituição Realizado com Sucesso!');
                else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no Cadastro da Instituição.');
        }
        if (isset($_POST['operacao']))
        {
            if ($_POST['operacao']=='excluir') {
                $result = $this->getAction()->excluir($_POST['idInstituicao']);
                if ($result)
                    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Tipo de Local Excluído com Sucesso!');
                    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Exlusão do Tipo de Local.');
            }
            if ($_POST['operacao']=='editar') {
                $result = $this->getAction()->editar($_POST['idInstituicao'],$_POST['editDescricao']);
                if ($result)
                    return array('card-panel center z-depth-3 white-text green darken-2 noselect','Tipo de Local Editado com Sucesso!');
                    else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Edição do Tipo de Local.');
            }
        }
        
    }
    
    public function ListAllInstituicaoAdmin()
    {
        $instituicoes = $this->getAction()->getAll();
        $instituicao = new Instituicao();
        $instituicao->setId(0);
        $instituicao->setDescricao("Todas");
        array_unshift($instituicoes, $instituicao);
        return $instituicoes;
    }
    
    public function ListAllInstituicao()
    {
        $instituicoes = $this->getAction()->getAll();
        return $instituicoes;
    }
    
    public function listInstituicaoPorPerfil()
    {
        $contUsuario = new ControllerUsuario();
        $idUsuario = Session::get('idUsuario');
        $usuario = $contUsuario->getAction()->get($idUsuario);
        
        if($usuario->getIdperfil() == Perfil::ADMINISTRADOR)
            return $this->ListAllInstituicaoAdmin();
        
        $instituicao = $this->getAction()->findById($usuario->getIdinstituicao());
        
        return array(0 => $instituicao);
    }
}
?>