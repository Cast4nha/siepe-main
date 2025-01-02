<?php

class Map
{
	private $elements = array();
	
	public function loadArray($arrayNameValue)
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
	
	public function set($key,$value)
	{
		$this->elements[$key] = $value;
	}
	
	public function add($key,$value)
	{
		$this->elements[$key] = $value;
	}
	
	public function get($key)
	{
		if ($this->isElement($key))
			return $this->elements[$key];

		return null;
	}
	
	public function getElements()
	{
		return $this->elements;
	}
	
	public function getCount()
	{
		return count($this->elements);
	}
	
	public function toString()
	{
		if ($this->elements)
			return $this->getStringElements();
		
		return null;
	}
	
	private function setElementsFromArray($arrayNameValue)
	{
		$arrayKeys = array_keys($arrayNameValue);
			
		$i = 0;
			
		foreach ($arrayNameValue as $array)
			$this->elements[$arrayKeys[$i++]] = $array;
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