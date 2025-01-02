<?php

include_once 'Dao.php';

class UsuarioDao extends Dao
{
	//INSERT
	public function insertUsuario(Usuario $usuario)
	{
		$this->sql = "INSERT INTO usuario (login, senha, idperfil, nome, email, idinstituicao, idcomunidade)
            VALUES (?, md5(?), ?, ?, ?, ?, ?)";
		
		$this->prepare();
	
		$this->setParam($usuario->getLogin());
		$this->setParam($usuario->getSenha());
		$this->setParam($usuario->getIdperfil());
		$this->setParam($usuario->getNome());
		$this->setParam($usuario->getEmail());
		$this->setParam($usuario->getIdinstituicao());
		$this->setParam($usuario->getIdcomunidade());
		
		return $this->queryIdStmt();
	}
	
	public function selectUsuario(Usuario $usuario)
	{
		$this->sql = 'SELECT * FROM usuario  WHERE id = ?';
		$this->prepare();
		$this->setParam($usuario->getId());
		
		return $this->fetchStmtObj('Usuario');
	}
	
	public function selectAll()
	{
		$this->sql = 'SELECT * FROM usuario ORDER BY idperfil, login';
		$this->prepare();
		return $this->fetchAllStmtObj('Usuario');
	}
	
	public function selectUsuarioSenha(Usuario $usuario)
	{
		$this->sql= "SELECT * FROM usuario WHERE id = ? AND senha = md5(?)";
		$this->prepare();
		
		$this->setParam($usuario->getId());
		$this->setParam($usuario->getSenha());
		
		return $this->fetchStmtObj('Usuario');
	}
	
	
	public function selectUsuarioByLogin(Usuario $usuario)
	{
		$this->sql = 'SELECT * FROM usuario WHERE login = ?';
		$this->prepare();
		$this->setParam($usuario->getLogin());
		
		return $this->fetchStmtObj('Usuario');
	}
	
	public function selectPerfilByLogin(Usuario $usuario)
	{
		$this->sql = 'SELECT idperfil FROM usuario WHERE login = ?';
		$this->prepare();
		$this->setParam($usuario->getLogin());
	
		return $this->fetchStmtObj('Usuario');
	}
	
	public function selectLogin(Usuario $usuario)
	{
		$this->sql = "SELECT * FROM usuario 
						WHERE login = ? AND senha = md5(?)";
		$this->prepare();

		$this->setParam($usuario->getLogin());
		$this->setParam($usuario->getSenha());

		// $this->getStmt()->bindParam(1,$usuario->getLogin());
		// $this->getStmt()->bindParam(2,$usuario->getSenha());
		
		return $this->fetchStmtObj('Usuario');		
	}
	
	//DELETE
	public function delete(Usuario $usuario)
	{
		$this->sql = 'DELETE FROM usuario WHERE id = ?';
		$this->prepare();
		$this->getStmt()->bindParam(1,$usuario->getId());
		
		return $this->fetchStmtObj('Usuario');
	}
	
	public function update(Usuario $usuario)
	{
		$this->sql = 'UPDATE usuario SET nome = ?, idperfil = ?, login = ?, senha = md5(?), email = ?, 
                        idinstituicao = ?, idcomunidade = ? WHERE id = ?';
		$this->prepare();
		$this->setParam($usuario->getNome());
		$this->setParam($usuario->getIdperfil());
		$this->setParam($usuario->getLogin());
		$this->setParam($usuario->getSenha());
		$this->setParam($usuario->getEmail());
		$this->setParam($usuario->getIdinstituicao());
		$this->setParam($usuario->getIdcomunidade());
		$this->setParam($usuario->getId());
		
		return $this->executeStmt();
	}
	
	public function updateSemSenha(Usuario $usuario)
	{
		$this->sql = 'UPDATE usuario SET nome = ?, idperfil = ?, login = ?, email = ?,
                    idinstituicao = ?, idcomunidade = ? WHERE id = ?';
		$this->prepare();
		$this->setParam($usuario->getNome());
		$this->setParam($usuario->getIdperfil());
		$this->setParam($usuario->getLogin());
		$this->setParam($usuario->getEmail());
		$this->setParam($usuario->getIdinstituicao());
		$this->setParam($usuario->getIdcomunidade());
		$this->setParam($usuario->getId());
		
		return $this->executeStmt();
	}
	
}


?>