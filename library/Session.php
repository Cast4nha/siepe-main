<?php
class Session
{
	public static function start()
	{
		if (!isset($_SESSION))
			session_start();
	}
	
	public static function set($nome,$valor)
	{
		self::start();
		$_SESSION["$nome"] = $valor;
	}

	public static function close()
	{
		session_write_close();
	}
	
	public static function destroy()
	{
		session_destroy();
	}
	
	public static function get($nameSession)
	{
		if (isset($_SESSION["$nameSession"]))
			return $_SESSION["$nameSession"];
		else return null;
			
	}
	
	public static function erase()
	{
		self::start();
		if (isset($_SESSION))
			self::destroy();
	}
	
	public static function remove($nameSession)
	{
		self::start();
		unset($_SESSION["$nameSession"]);
		self::close();
	}
}
?>