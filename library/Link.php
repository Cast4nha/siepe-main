<?php

class Link
{
	private $link;
	private $countParametros = 0;
	private $id;
	private $title;
	
	public function addParametro($name,$value)
	{
		$this->countParametros++;
		$this->link .= $this->getCaracterLink().$name.'='.$value;		
	}
	
	public function addArrayParametro($arrayName,$arrayValue)
	{
		$index = 0;

		foreach ($arrayName as $name)
		{
			$this->addParametro($name, $arrayValue[$index]);
			$index++;
		}
	}
	
	private function getCaracterLink()
	{
		if ($this->countParametros == 1)
			return '?';
		
		return '&';
	}
	
	public function getLink()
	{
		return $this->link;
	}

	public function getUrl()
	{
		return 	"<a id='$this->id' href='$this->link'>$this->title</a>";
	}
	
	public function setId($id)
	{
		$this->id= $id;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function setLink($link)
	{
		$this->link = $link;
	}

}



?>
