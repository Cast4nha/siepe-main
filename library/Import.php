<?php

class Import
{
	private static function importFile($class)
	{
		$path = dirname(dirname(__FILE__)).'/'.$class;

		if (file_exists($path))
			include_once($path);
	}
	
	static public function getPathServerFile($file)
	{
		$path = dirname(dirname(__FILE__)).'/'.$file;
	
		if (file_exists($path))
			return $path;
	
		return null;
	}
	
	static public function controller($class)
	{
		$path = 'controller/'.$class.'.php';
		self::importFile($path);
	}
	
	static public function action($class)
	{
		$path = 'model/action/'.$class.'.php';
		self::importFile($path);
	}
	
	static public function bean($class)
	{
		$path = 'model/bean/'.$class.'.php';
		self::importFile($path);
	}
	
	static public function dao($class)
	{
		$path = 'model/dao/'.$class.'.php';
		self::importFile($path);
	}
	
	static public function library($class)
	{
		$path = 'library/'.$class.'.php';
		self::importFile($path);
	}
	
	static public function view($class)
	{
		$path = 'view/'.$class.'.php';
		self::importFile($path);
	}
	
	static public function config()
	{
		$path = 'config/Configuracao.php';
		self::importFile($path);
	}
	static public function exception($class)
	{
		$path = 'model/exception/'.$class.'.php';
		self::importFile($path);
	}
	
}
?>