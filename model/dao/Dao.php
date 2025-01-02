<?php
/**
 * Classe Responsável pela Manipulação de Todas as Requisções ao Banco de Dados
 * @class Dao
 * @start 12/02/2009
 * @author: Vitor Castro, vitor006@hotmail.com
 * @copyright: Vitor Castro
 * @package: packageDao já incluido nas extensões das Classe Daos;
 * 		@class Conexao;
 * @version 15/04/2009
 */

include_once '../../model/dao/IDao.php';
include_once '../../config/Configuracao.php';

class Dao implements IDao
{
	protected $sql;

	private $pdo;
	private $stmt;
	private $increment;

	private $configuracao;

	public function Dao()
	{
		try {
			$this->configuracao = new Configuracao();
			$this->pdo = new PDO($this->configuracao->getDns(),$this->configuracao->getUserDataBase(),$this->configuracao->getPasswordDataBase());
		}
		catch (PDOException $e) {
			echo '<b>SQL ERROR:</b> ',$e->getMessage(),' <br>';
			echo '<b>ERRNO:</b> ',$e->getCode();
		}
	}

	public function getDao()
	{
		return $this->pdo;
	}

	public function setStmt($stmt)
	{
		$this->stmt = $stmt;
	}

	public function getStmt()
	{
		return $this->stmt;
	}

	protected function setParam($dado)
	{
		$this->getStmt()->bindParam(++$this->increment,$dado);
	}


	/**
	 * @author: Vitor Castro
	 * @desc: Executa query
	 * @param: $this->sql
	 * @since: 09/04/2009
	 */
	public function get()
	{
		return $this->getDao()->query($this->sql);
	}

	public function prepare()
	{
		$this->setStmt($this->getDao()->prepare($this->sql));
		$this->increment = 0;
	}

	public function executeStmt()
	{
		try
		{
			$result =  $this->getStmt()->execute();
			$this->getStmt()->closeCursor();
			return $result;

		}catch (PDOException $e) {
		    echo 'erro';
		    var_dump($e);
			echo 'SQL ERROR: ',$e->getMessage();
		}
	}

	//USES
	public function executeQuery()
	{
		if (!$this->executeStmt())
			throw new NoPersistException();
	}

	public function execute()
	{
		return $this->getDao()->execute();
	}

	/**
	 * @author Vitor Castro
	 * @desc Retorna UM Objeto apartir da SQL encapsulada
	 * @param $this->sql
	 * @since 27/07/2009
	 */
	public function fetchStmtObj($class)
	{
		try
		{
			$this->getStmt()->execute();

			$result = $this->getStmt()->fetchObject($class);

			$this->getStmt()->closeCursor();

			return $result;
		}
		catch (PDOException $e) {
			echo 'SQL ERROR: ',$e->getMessage();
			echo 'ERRNO: ',$e->getCode();
		}
	}

	/**
	 * @author Vitor Castro <vitor@ufpa.br>
	 * @desc Retorna um vetor de objeto de uma determinada classe
	 * @return
	 * @since 27/11/2009
	 * @uses
	 */
	public function fetchAllStmtObj($class)
	{
		try {

			$this->getStmt()->execute();
			$result = array();

			for ($i = 0; $rowset = $this->getStmt()->fetchObject($class); $i++)
				$result[] = $rowset;


			$this->getStmt()->closeCursor();

			return $result;
		}
		catch (PDOException $e) {
			echo 'SQL ERROR: ',$e->getMessage();
			echo 'ERRNO: ',$e->getCode();
		}
	}

	public function fetchStmt()
	{
		$this->getStmt()->execute();

		$result = $this->getStmt()->fetch();

		$this->getStmt()->closeCursor();

		return $result;
	}

	public function fetchAllStmt()
	{
		try {
			$this->getStmt()->execute();
			$result = array();

			for ($i = 0; $rowset = $this->getStmt()->fetch(); $i++)
				$result[] = $rowset;

			$this->getStmt()->closeCursor();

			return $result;
		}
		catch (PDOException $e) {
			echo 'SQL ERROR: ',$e->getMessage();
			echo 'ERRNO: ',$e->getCode();		}
	}

	/**
	 * @author Vitor Castro
	 * @desc Retorna a Chave Primária da SQL query
	 * @param $this->sql
	 * @since 09/04/2009
	 */
	public function queryIdStmt()
	{
		$this->executeStmt();
		return $this->getDao()->lastInsertId();
	}

	public function __destruct()
	{
		$this->pdo = null;
	}
}
?>