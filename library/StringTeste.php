<?php

class StringTeste
{
	private $text;
	
	public function set($text)
	{
		$this->text = $text;
	}
	
	public function get()
	{
		return $this->text;
	}

	public function getSize()
	{
		return (int) strlen($this->text);
	}
	
	public function append($textAppend)
	{
		$this->text .= $textAppend;
	}
	
	public function buildStringToParam($string,$arrayParametros)
	{
		$this->text = self::getFromParam($string, $arrayParametros);
	}
	
	public static function getFromParam($string,$arrayParametros)
	{
		$countParam = substr_count($string,'#');
	
		if ($countParam)
		{
			if (is_array($arrayParametros))
			{
				$index = 0;
	
				for ($indexString = 0; $indexString < $countParam; $indexString++)
				{
				if (isset($arrayParametros[$indexString]))
					$string = str_replace('#'.++$index,$arrayParametros[$indexString], $string);
				}
				}
			}
			return $string;
	}
	
	public function lenght()
	{
		return strlen($this->get());
	}
	
}

?>