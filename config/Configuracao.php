<?php
/**
 * @package config
*/
class Configuracao
{
	
	private static $hostServer = "localhost"; //"siepe.unifesspa.edu.br";
	private $nameDataBase = "siepe";
	private $hostDataBase = "siepe-bd";
	private $userDataBase = "postgres";
	private $passwordDataBase = "unifesspa";
	private $debug = true;
	private static $alert = true;

	public static function getHostAplication()
	{
		return 'http://' . self::$hostServer . '/';
	}

	public function getHostServer()
	{
		return $this->hostServer;
	}

	public function getDns()
	{
		return 'pgsql:host=' . $this->hostDataBase . ';port=5432;dbname=' . $this->nameDataBase;
	}

	public function getUserDataBase()
	{
		return $this->userDataBase;
	}

	public function getPasswordDataBase()
	{
		return $this->passwordDataBase;
	}

	public function getNameDataBase()
	{
		return $this->nameDataBase;
	}

	public function getHostDataBase()
	{
		return $this->hostDataBase;
	}

	public function getDebug()
	{
		return $this->debug;
	}

	public static function getHostMessageProperties()
	{
		return Import::getPathServerFile('config/message.properties');
	}

	public static function isAlerts()
	{
		return self::$alert;
	}


	/**
	 * @uses AbstracDao
	 */
	public function isDebugSql()
	{
		return $this->debug;
	}

}
?>
