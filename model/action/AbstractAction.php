<?php

/**
 * @package model\action
 */
abstract class AbstractAction
{
	protected $dao;
	
	protected abstract function getDao();
	
	protected function setDao($dao)
	{
		$this->dao = $dao;
	}
	
	protected function isNullDao()
	{
		if ($this->dao == null)
			return true;
		
		return false;
	}
}


?>