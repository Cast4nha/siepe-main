<?php

class LibXml
{
	
	private $arquivo;
	private $parser;
	
	
	public function create($arquivo)
	{
		$this->arquivo = $arquivo;
		$this->parser = xml_parser_create();
	}
	
	public function tagInicial($parser,$elemento,$atr)
	{
		if ($elemento == "acesso")
		{
			echo '<b>';
		}
		if ($elemento == "perfil")
		{
			echo '<i>';
		}
	}
	
	public function tagFinal($parser,$elemento)
	{
	if ($elemento == "acesso")
		{
			echo '</b>';
		}
		if ($elemento == "perfil")
		{
			echo '</i>';
		}
	}
	
	public function getDados($parser,$dados)
	{
		echo $dados;
	}
	
	public function openXml()
	{
		return $xml = simplexml_load_file($this->arquivo);
	}
	
}

?>