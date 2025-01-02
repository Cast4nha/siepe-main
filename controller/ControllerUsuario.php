<?php

include_once '../../library/Import.php';
Import::library('Map');
Import::library('Navigation');
Import::controller('Controller');
Import::controller('ControllerPerfil');
Import::action('ActionUsuario');
Import::bean('Usuario');
Import::bean('Perfil');

class ControllerUsuario extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
			$this->action = new ActionUsuario();

		return $this->action;
	}
	
	//USES /inicio/index
	public function acessar()
	{
		if (isset($_POST['Acessar']))
		{
			extract($_POST);
			
			$usuario = $this->getAction()->login($email, $senha);

			if ($usuario)
			{	
			$user = new Usuario();
			$user->setIdperfil($usuario->getIdperfil());
			$user->setId($usuario->getId());
			$user->setLogin($usuario->getLogin());
			$this->redirectAcessar($user);
					
			}else {
				//Navigation::goToAction(new Page('inicio','login.fail'));
			    return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Falha no Login! Verifique o Email e Senha informado!!!');
			}
		}
	}
	
	private function buscarPerfil($usuario)
	{
		$controllerUsuario = new ControllerUsuario();
		$actionUsuario = $this->getAction();
		$idperfil=$actionUsuario->getPerfilByLogin($usuario);
		//$perfil=$controllerUsuario->getPerfil($idperfil);
		return $idperfil;
	}
	
	private function isUsuarioProeg($idUnidade)
	{
		return in_array($idUnidade, array(18,25,26));
	}
	
	
	private function isUsuarioSeplan($idUnidade)
	{
		return in_array($idUnidade, array(4,5,6,7));
	}
	
	
	private function redirectAcessar(Usuario $usuario)
	{
		Session::start();
		Session::set('idperfil',$usuario->getidperfil());
		Session::set('idUsuario',$usuario->getId());
		Session::set($this->getTokenSecurity(),true);
		Session::close();
	
		$page = new Page('inicio');

		switch ($usuario->getidperfil())
		{
			case Perfil::ADMINISTRADOR:
				{
					$page->setView('admin');
					Navigation::goToActionView($page);
					break;
				}
			case Perfil::DOCENTE:
				{
					$page->setView('docente');
					Navigation::goToActionView($page);
					break;
				}
			case Perfil::COLABORADOR:
				{
					$page->setView('colaborador');
					Navigation::goToActionView($page);
					break;
				}
			case Perfil::BOLSISTA:
				{
					$page->setView('bolsista');
					Navigation::goToActionView($page);
					break;
				}

			default:
				{
					$this->LibScript()->scriptLocationAlert('inicio','','Falha na Autenticação do Perfil');
					break;
				}
		}
	}

	public function getPerfil($idperfil)
	{
		$controllerPerfil = new ControllerPerfil();
		return $controllerPerfil->getAction()->getDescricaoPerfil($idperfil);
	}
	
	public function getTokenSecurity()
	{
		return '72033f2bbd0a0891df6f24ee5eebfa6e';
	}
	
	public function showGridUsuarioUnidadeManager()
	{
		$html = $this->LibHtml();
		
		$usuarios = $this->getAction()->getAllUsuarioPorPerfil(Perfil::UNIDADE);
		
		if ($usuarios)
		{
			$grid = new GridHtml(array(40,30,10,10,10));
			$grid->header(array('Nome','Unidade','Editar','Excluir','Reenviar acesso'));	
			
			foreach ($usuarios as $usuario)
			{
				$edit = $html->alinkImage('editarUsuarioUnidade&id='.$usuario->getId(),'Modify.png','Editar Usuário da Unidade','editarUsuario'.$usuario->getId());
				$delete = $html->linkImageOnClick('?action=gerenciarUsuarioUnidade&inactivate&id='.$usuario->getId(), 'excluir', 'Delete.png', 'Editar Usuário da Unidade');
				$sendAccess = $html->alinkImage('gerenciarUsuarioUnidade&sendAccess&id='.$usuario->getId(),'sendMail.png','Enviar email com acesso para o Usuário','sendMailUsuario'.$usuario->getId());
				
				$grid->line(array(
						$usuario->getNome(),
						$usuario->nomeUnidade,
						$edit, 
						$delete,
						$sendAccess
						));
			}
			
		}else
			BoxMessage::notice('Não existem usuários');
	}
	
	//USES
	public function showAllUsuarioUnidade()
	{
		$usuarios = $this->getAction()->getAllUsuarioPorPerfil(Perfil::UNIDADE);
		
		if ($usuarios)
		{
			$grid = new GridHtml(array(25,25,25,25));
			$grid->header(array('Nome','Unidade','Email','Email alternativo'));
				
			foreach ($usuarios as $usuario)
			{
				$grid->line(array(
						$usuario->getNome(),
						$usuario->nomeUnidade,
						$usuario->getEmail(),
						$usuario->getEmail2()
				));
			}
				
		}else
			BoxMessage::notice('Não existem usuários');
	}
	
	//USES
	public function getUsuarioById(IRequest $request) 
	{
		if ($request->isElement('id'))
		{
			$usuario = $this->getAction()->get($request->get('id'));
			
			if ($usuario)
				return $usuario;
		}
		
		Navigation::goToBackAlert('Selecione o usuário');
	}
	
	public function exibeAllUsuario()
	{
		$result = $this->getAction()->getAll();
	
		if ($result)
		{
			$style = $this->LibStyle();
// 			$width = array(30,15,15,25,15);
	
// 			$style->cabecalhoLista($width,array('Nome','Perfil','Login','Email','Excluir'));
// 			$btn='<a href="#"><img src="../../images/Remove_16.png" align="top"/></a>';
// 			$i = 0;
			$cabecalho = array('Nome','Perfil','Login','Senha','E-mail','Editar','Excluir');
			$dados = array();
			foreach ($result as $usuario)
			{
				array_push($dados, array(utf8_encode($usuario->getNome()),$this->getPerfil($usuario->getidperfil()),$usuario->getLogin(),'',utf8_encode($usuario->getEmail()),$usuario->getId()));
			}
			$style->listaEdicaoExclusao($cabecalho,$dados);
		}else $this->LibMessage()->msgAtencao('Não Existem Usuários Cadastrados',500);
	}
	
	public function excluirUsuario()
	{
		if (isset($_GET['excluir']) && isset($_GET['id']))
		{
			extract($_GET);
			
			$result = $this->getAction()->excluir($id);
			
			if ($result)
				$this->LibMessage()->msgSucesso('Exclusão do Usuário Realizada com Sucesso!',500);
		}
	}
	
	
	public function editarSenha()
	{
		$map = new Map();
		$map->loadArray($_POST);
		
		if ($map->isElement('EditarSenha'))
		{
			$idUsuario = $this->LibSession()->getSession('idUsuario');

			$script = $this->LibScript();
			
			if ($this->getAction()->isSenhaUsuario($idUsuario, $map->get('senhaAtual')))
			{
				$atualizarSenha = $this->getAction()->editarSenhaUsuario($idUsuario, $map->get('novaSenha'));
				
				if ($atualizarSenha)
					$script->scriptLocationAlert('editarSenha', 'Senha Atualizada com Sucesso \nNova Senha: '.$map->get('novaSenha'));
				else 
					$script->scriptLocationAlert('editarSenha', 'Falha na Atualização da Senha');
				
			}else $script->scriptLocationAlert('editarSenha', 'Senha Atual não Confere!');
		}
	}

	public function cadastrar()
	{
		if (isset($_POST['cadastrarUsuario']))
		{
			extract($_POST);
			$session = $this->LibSession();
			$usuario = new Usuario();
			$usuario->setLogin($login);
			$usuario->setSenha($senha);
			$usuario->setIdperfil($idperfil);
			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setIdComunidade($idComunidade);
			$usuario->setIdInstituicao($idInstituicao);

			$result = $this->getAction()->cadastrar($usuario);
	
			if ($result)
				$this->LibScript()->scriptLocationAlert('gerenciarUsuario','Cadastro de Usuário Realizado com Sucesso!');
			else $this->LibScript()->scriptLocationAlert('gerenciarUsuario','Falha no Cadastro do Usuário.');
		}
		if (isset($_POST['operacao']))
		{
			if ($_POST['operacao']=='1')
			{
				$usuarioExcluido = $this->getAction()->excluir($_POST['idUsuario']);
				if ($usuarioExcluido)
					$this->LibScript()->scriptLocationAlert('gerenciarUsuario', 'Usuário excluído com sucesso!');
				else $this->LibScript()->scriptLocationAlert('gerenciarUsuario', 'Falha na exclusão do usuário!');
			}
			if ($_POST['operacao']=='2')
			{
				$usuario = new Usuario();
				$usuario->setId($_POST['idUsuario']);
				$usuario->setNome($_POST['editNome']);
				$usuario->setIdperfil($_POST['editIdperfil']);
				$usuario->setLogin($_POST['editLogin']);
				$usuario->setSenha($_POST['editSenha']);
				$usuario->setEmail($_POST['editEmail']);
				$usuario->setIdComunidade($_POST['editIdComunidade'] == "" ? null : $_POST['editIdComunidade']) ;
				$usuario->setIdInstituicao($_POST['editIdInstituicao'] == "" ? null : $_POST['editIdInstituicao']);
				
				$usuarioEditado = $this->getAction()->editar($usuario);
				if ($usuarioEditado)
					$this->LibScript()->scriptLocationAlert('gerenciarUsuario', 'Usuário editado com sucesso!');
				else $this->LibScript()->scriptLocationAlert('gerenciarUsuario', 'Falha na edição do usuário!');
			}
		}
	}

}
?>