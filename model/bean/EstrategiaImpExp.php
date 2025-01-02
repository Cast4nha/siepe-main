<?php
class EstrategiaImpExp {
	
	private $id;
	private $descricao;
	private $controller;
	private $ativo;

	public function setId($id)
	{
		$this->id = $id;
	}
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	public function setController($controller)
	{
	    $this->controller = $controller;
	}
	public function setAtivo($ativo)
	{
	    $this->ativo = $ativo;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getDescricao()
	{
		return $this->descricao;
	}
	public function getController()
	{
	    return $this->controller;
	}
	public function getAtivo()
	{
	    return $this->ativo;
	}
	
}
?>