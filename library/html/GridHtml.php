<?php

include_once '../../library/Import.php';
Import::library('html/DivHtml');

class GridHtml
{
	private $width;
	private $increment = 0;
	
	public function GridHtml($arrayWidth)
	{
		$this->setWidth($arrayWidth);
	}
	
	public function header($colunas)
	{
		DivHtml::div('consulta','consultaTitulo');
		$i = 0;
	
		foreach ($colunas as $col)
			DivHtml::divContent(ucwords($col),'consultaTitulo','','width: '.$this->width[$i++].'%');			
	
		DivHtml::close();
	}
	
	public function line($arrayDados) 
	{
		$this->increment++;
		
		DivHtml::div('consulta','consulta'.$this->increment%2);
		
		$indexWidth = 0;
	
		foreach ($arrayDados as $dado)
			DivHtml::divContent(self::getConteudo($dado),'consulta','','width: '.$this->width[$indexWidth++].'%');

		DivHtml::close();
	}
	
	private static function getConteudo($conteudo)
	{
		if ($conteudo)
			return $conteudo;
		else return ' - ';
	}  
	
	public function setWidth($width)
	{
		$this->width = $width;
	}
	
}

?>