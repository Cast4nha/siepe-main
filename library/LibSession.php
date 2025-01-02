<?php

include_once '../../library/LibSecurity.php';

class LibSession extends LibSecurity
{
	
	/**
	 * @author Vitor Castro
	 * @desc StartSession
	 * @param
	 * @since 04/08/2009
	 */
	public function sessionStart()
	{
		session_start();
	}
	
	
	/**
	 * @author Vitor Castro
	 * @desc Atribuir valor a session
	 * @param
	 * @since 04/08/2009
	 */
	public function setSession($nome,$valor)
	{
		$this->sessionStart();
		$_SESSION["$nome"] = $valor;
		$this->sessionClose();		
	}
	
	
	/**
	 * @author Vitor Castro
	 * @desc Fecha e Grava Session
	 * @param
	 * @since 04/08/2009
	 */
	public function sessionClose()
	{
		session_write_close();
	}
	

	/**
	 * @author Vitor Castro
	 * @desc Destroir Session
	 * @param
	 * @since 04/08/2009
	 */
	public function sessionDestroy()
	{
		session_destroy();
	}
	
	/**
	 * @author Vitor Castro
	 * @desc Retorno do Valor de Session
	 * @param
	 * @since 04/08/2009
	 */
	public function getSession($nome)
	{
		return   $_SESSION["$nome"];
	}
}
?>