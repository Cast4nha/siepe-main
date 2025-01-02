<?php
class Estrategia implements JsonSerializable
{
	private $id;
	private $descricao;
	private $idinstrumento;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getDescricao()
	{
		return $this->descricao;
	}
	
	public function getIdinstrumento()
	{
		return $this->idinstrumento;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	
	public function setIdinstrumento($idinstrumento)
	{
		$this->idinstrumento= $idinstrumento;
	}
	
	public function jsonSerialize()
	{
		$vars = get_object_vars($this);
		return $vars;
	}
}
?>