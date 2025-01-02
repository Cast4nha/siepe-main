<?php
include_once 'Import.php';

Import::library('String');
Import::config();

class MessageProperties
{
	private static $messages;

	public static function getMessages()
	{
		if (!self::$messages)
		{
			$fp = fopen(Configuracao::getHostMessageProperties(), "r");
			self::$messages = file_get_contents(Configuracao::getHostMessageProperties());
			fclose($fp);
		}
		
		return self::$messages;
	}

	public static function getMessageItem($item)
	{
		return self::getParamNotation($item,self::getMessages());
	}
	
	public static function getMessageParam($item,$param)
	{
		if (is_array($param))
			$message = String::getFromParam(self::getMessageItem($item),$param);
		else
			$message = String::getFromParam(self::getMessageItem($item),array($param));
		
		return $message;
	}
	
	private static function getParamNotation($notation,$stringComment)
	{
		$posicaoInicial = strpos($stringComment, $notation);

		if ($posicaoInicial === false)
		return false;

		$class = substr($stringComment, $posicaoInicial+strlen($notation));

		$terminoParentese = strpos($class, '}');

		return $class = substr($class,2,$terminoParentese-2);
	}
}
?>