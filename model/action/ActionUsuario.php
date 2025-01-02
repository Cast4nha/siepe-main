<?php
include_once '../../library/Import.php';
Import::action('AbstractAction');
Import::dao('UsuarioDao');
Import::bean('Usuario');
Import::exception('NoPersistException');

class ActionUsuario extends AbstractAction
{
	//USES
	protected function getDao()
	{
		if ($this->isNullDao())
			$this->dao = new UsuarioDao();
		
		return $this->dao;
	}
	
	//USES
	public function getAll()
	{
		return $this->getDao()->selectAll();
	}
	
	public function getAllUsuarioSubUnidade( $idUnidade , $idPerfil )
	{
		$usuario = new Usuario();
		
		$usuario->setIdUnidade($idUnidade);
		$usuario->setIdperfil($idPerfil);
		
		return $this->getDao()->selectAllUsuarioSubUnidade($usuario);
	}
		
	public function get($id)
	{
		$usuario = new Usuario();
		$usuario->setId($id);
		
		return $this->getDao()->selectUsuario($usuario);
	}
	
	//USES
	public function login($login,$senha)
	{
		$usuario = new Usuario();
		$usuario->setLogin($login);
		$usuario->setSenha($senha);

		return $this->getDao()->selectLogin($usuario);
	}
	
	//USES
	public function saveUsuario(IRequest $request)
	{
		$usuario = $request->getObject(new Usuario());
		echo var_dump($usuario); die();
		$idUsuario = $this->getDao()->insertUsuario($usuario);

		if(!$idUsuario)
			throw new NoPersistException('createFail');

		$usuario->setId($idUsuario);
		
		return $usuario;
	}
	
	//USES
	public function inactivateUsuario($idUsuario,$idPerfil)
	{
		$usuario = new Usuario();
		$usuario->setId($idUsuario);
		$usuario->setIdperfil($idPerfil);
		$usuario->setAtivo(false);

		if (!$this->getDao()->updateUsuarioAtivo($usuario))
			throw new NoPersistException();		
	}

	//action do excluir usuário
	public function excluir($id)
	{
		$usuario = new Usuario();
		
		$usuario->setId($id);
		
		return $this->getDao()->delete($usuario);
		
	}
	
	//Provavelmente será apagado
	//USES
	public function editPerfil(IRequest $request)
	{
		$usuario = $request->getObject(new Usuario());
		$this->getDao()->updatePerfil($usuario);
	}
	
	//USES
	public function editUsuario(IRequest $request)
	{
		$usuario = $request->getObject(new Usuario());
		
		if ($usuario->getSenha())
			$this->getDao()->updateUsuario($usuario);
		else
			$this->getDao()->updateUsuarioNotSenha($usuario);
	}
	
	public function editar($usuario)
	{
		if ( ($usuario->getSenha()==null) || (($usuario->getSenha())=='') ) return $this->getDao()->updateSemSenha($usuario);
		else return $this->getDao()->update($usuario);
	}
	
	public function validaSenhaUsuario($idUsuario,$senha)
	{
		$usuario = new Usuario();
		
		$usuario->setId($idUsuario);
		$usuario->setSenha($senha);

		return $this->getDao()->selectUsuarioSenha($usuario);
	}
	
	public function getAllUsuarioPorUnidadePerfil($idUnidade,$idPerfil)
	{
		$usuario = new Usuario();
		
		$usuario->setIdUnidade($idUnidade);
		$usuario->setIdperfil($idPerfil);
		
		return $this->getDao()->selectAllUsuarioPorUnidadePerfil($usuario);
	}

	//USES
	public function getAllUsuarioPorPerfil($idPerfil)
	{
		$usuario = new Usuario();
		$usuario->setIdperfil($idPerfil);
		
		return $this->getDao()->selectAllUsuarioPerfil($usuario);
	}
	
	public function editarSenhaUsuario($idUsuario,$senha)
	{
		$usuario = new Usuario();
		$usuario->setId($idUsuario);
		$usuario->setSenha($senha);
		
		return $this->getDao()->updateSenha($usuario);
	}
	
	
	public function isSenhaUsuario($idUsuario,$senha)
	{
		$usuario = new Usuario();
		$usuario->setId($idUsuario);
		$usuario->setSenha($senha);
		
		$usuarioSenha = $this->getDao()->selectSenhaUsuario($usuario);
		
		if ($usuarioSenha)
			return true;
		
		return false;
	}
	
	public function getUsuarioByLogin($login)
	{
		$usuario = new Usuario();
		$usuario->setLogin($login);
		
		return $this->getDao()->selectUsuarioByLogin($usuario);
	}
	
	public function getPerfilByLogin($usuario)
	{
	
		return $this->getDao()->selectPerfilByLogin($usuario);
	}
	
	public function getUsuarioPorEmail($email2)
	{
		$usuario = new Usuario();
		$usuario->setEmail2($email2);
		return $this->getDao()->selectUsuarioByEmail2($usuario);
	}

	public function cadastrar(Usuario $usuario)
	{	
		return $this->getDao()->insertUsuario($usuario);
	}
	
}


?>