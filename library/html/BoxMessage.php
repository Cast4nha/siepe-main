<?php

include_once '../../library/Import.php';
Import::library('html/DivHtml');

class BoxMessage
{
	public static function inform($message,$width = 700)
	{
		self::buildBox('info','Informação',$message, $width);
	}

	public static function notice($message,$width=700)
	{
		self::buildBox('atencao','Atenção',$message, $width);
	}
	
	public static function sucess($message,$width=700)
	{
		self::buildBox('sucesso','Sucesso',$message, $width);
	}
	
	public static function error($message,$width=700)
	{
		self::buildBox('erro','Erro',$message, $width);
	}
	
	private static function buildBox($type,$title,$message,$width)
	{
		DivHtml::div('','form');
			DivHtml::div('','caixa '.$type,'width:'.$width.'px');
				DivHtml::div('caixatexto');
				echo '<b>',$title,':</b><br>'.$message;
				DivHtml::close();
			DivHtml::close();
		DivHtml::close();
	}
	

}


?>