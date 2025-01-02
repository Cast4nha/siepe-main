<?php
/*
 * Classe Responável pelos Getter e Setter da Documento
 * @class Documento
 * @start 12/03/2009
 * @author: Vitor Castro, vitor006@hotmail.com
 * @copyright: Vitor Castro
 * @extends abstract class Bean 
 * @version 12/03/2009
 */

class Documento
{
	private $nome;
	private $type;
	private $blob;
	private $tmp;
	private $size;
	
	
	public function setType($type)
	{
		$this->type = $type;
	}
	
	public function setBlob($blob)
	{
		$this->blob = addslashes($blob);
	}
	
	public function setTmp($tmp)
	{
		$this->tmp = $tmp;
	}
	
	public function setSize($size)
	{
		$this->size = $size;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function getBlob()
	{
		return $this->blob;
	}
	
	public function getTmp()
	{
		return $this->tmp;
	}
	
	public function getSize()
	{
		return $this->size;
	}
	
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	
	public function getNome()
	{
		return $this->nome;
	}
	
	
	
}
?>