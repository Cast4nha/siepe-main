<?php

include_once '../../library/Import.php';

Import::library('Map');

class ReflectionBean
{
	private $reflectionClass;
	private $atributos;
	
	public function setReflectionClass($objeto)
	{
		$this->reflectionClass = new ReflectionClass(get_class($objeto));
		
		$atributos = $this->getAtributos();

		$map = new Map();
		
		if ($atributos)
		{
			foreach ($atributos as $atributo)
				$map->add($atributo->getName(), 0);
			
			$this->atributos = $map;			
		}
		
	}
	
	protected function setReflectionClassNameObject($nameObject)
	{
		$this->reflectionClass = new ReflectionClass($nameObject);
	}
	
	protected function getReflectionClass()
	{
		return $this->reflectionClass;
	}
	
	protected function getAtributos()
	{
		return $this->reflectionClass->getProperties();
	}
	
	public function getValueAtributo($atributo,$objeto)
	{
		$nameMethod = 'get'.ucwords($atributo->getName());
		$method = $this->reflectionClass->getMethod($nameMethod);
		return $method->invoke($objeto,$nameMethod);
	}
	
	public function getValueAtributoByName($nome,$objeto)
	{
		$nameMethod = 'get'.ucwords($nome);
		$method = $this->reflectionClass->getMethod($nameMethod);
		return $method->invoke($objeto,$nameMethod);
	}
	
	protected function isValueAtributo($atributo,$objeto)
	{
		if (strlen($this->getValueAtributo($atributo, $objeto)) != 0)
			return true;
	
		return false;
	}
	
	public function setValueAtributoByName($nome,$objeto,$value)
	{
		if ($this->isAtributoObject($nome))
		{
			try {
				$nameMethod = 'set'.ucwords($nome);
				$method = $this->reflectionClass->getMethod($nameMethod);
				$method->invoke($objeto,$value);
			}catch (Exception $e)
			{
				echo 'Problema na chamado do método';
				die();
			}
		}
	}
	
	public function isAtributoObject($atributo)
	{
		return $this->atributos->isElement($atributo);
	}
	
}
?>