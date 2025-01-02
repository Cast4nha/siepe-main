<?php

include_once 'IArrayList.php';

class ArrayList implements IArrayList
{
	private $elements = array();
	
	public function add($element)
	{
		$this->elements[] = $element;
	}
	
	public function isElements()
	{
		return ($this->elements) ? true : false;
	}
	
	public function getAll()
	{
		return $this->elements;
	}
	
	public function count()
	{
		return count($this->elements);
	}
	
	public function appendAll(array $elements)
	{
		if ($elements)
			foreach ($elements as $element)
				$this->add($element);
	}
	
	private function removeAll()
	{
		$this->elements = array();
	}
	
	public function appendFirst($first)
	{
		$list = $this->getAll();
		$this->removeAll();
		$this->add($first);
		$this->appendAll($list);
	}
	
}

?>