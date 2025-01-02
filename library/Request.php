<?php
include_once 'Import.php';
Import::library('IRequest');
Import::library('persistence/ReflectionBean');


class Request implements IRequest
{
	private $elements = array();
	
	public function Request()
	{
		if (isset($_GET))
			$this->loadArray($_GET);
		
		if (isset($_POST))
			$this->loadArray($_POST);
	}
	
	private function loadArray($arrayNameValue)
	{
		if (is_array($arrayNameValue))
			$this->setElementsFromArray($arrayNameValue);
	}
	
	public function isElement($key)
	{
		if (isset($this->elements[$key]))
			return true;
	
		return false;
	}
	
	public function isElementNotNull($key)
	{
		if ($this->isElement($key))
			if (strlen($this->get($key)) == 0)
				return false;
		
		return true;
	}
	
	public function remove($key)
	{
		if (isset($this->elements[$key]))
			unset($this->elements[$key]);
	}
	
	public function add($key,$value)
	{
		$this->elements[$key] = $value;
	}
	
	public function updateKey($keyActual,$newKey)
	{
		$valueActual = $this->get($keyActual);
		$this->add($newKey, $valueActual);
		$this->remove($keyActual);
	}
	
	public function get($key)
	{
		if ($this->isElement($key))
			return $this->elements[$key];
	
		return null;
	}
	
	public function set($key,$value)
	{
		$this->elements[$key] = $value;
	}
	
	
	public function toString()
	{
		if ($this->elements)
			return $this->getStringElements();
	
		return null;
	}
	
	public function getObject($object)
	{
		try {
			
			$reflection = new ReflectionBean();
			
			$reflection->setReflectionClass($object);
			
			$keys = array_keys($this->elements);
			
			foreach ($keys as $element)
				$reflection->setValueAtributoByName($element, $object, $this->get($element));

			return $object;
			
		}catch (Exception $e)
		{
			return null;			
		}
	}
	
	private function setElementsFromArray($arrayNameValue)
	{
		$arrayKeys = array_keys($arrayNameValue);
			
		$i = 0;
			
		foreach ($arrayNameValue as $array)
			$this->add($arrayKeys[$i++], $array);
	}
	
	private function getStringElements()
	{
		$arrayKeys = array_keys($this->elements);
	
		$i =0;
	
		$toString = '';
			
		foreach ($this->elements as $elements)
		{
			$toString .= $arrayKeys[$i++].': '.$elements.'; ';
		}
	
		return $toString;
	}
	
}

?>