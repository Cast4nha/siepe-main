<?php

class DivHtml
{
	
	public static function div($id='',$class='',$style='')
	{
		echo "<div id='{$id}' class='{$class}' style='{$style}'>";
	}	
	
	public static function close()
	{
		echo '</div>';
	}
	
	public static function divContent($conteudo,$id='',$class='',$style='')
	{
		self::div($id,$class,$style);
		echo $conteudo;
		self::close();
	}
	
	public static function divLabelField($label,$content)
	{
		self::div(null,'form');
		self::divContent($label,null,'labelg');
		echo $content;		
		self::close();
	}
	
}



?>