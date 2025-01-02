<?php
class Perfil{
	
	const ADMINISTRADOR = 5;
	const DOCENTE = 6;
	const COLABORADOR = 7;
	const BOLSISTA = 8;
	
	private $id;
	private $descricao;

	public function setId($id)
	{
		$this->id = $id;
	}
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getDescricao()
	{
		return $this->descricao;
	}
		
}
?>