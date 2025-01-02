<?php

abstract class Action
{

	protected $dao;
	
	protected function getDao()
	{
		return $this->dao;
	}
	
	protected function isNullDao()
	{
		return ($this->dao == null) ? true : false;
	}
	
	

}

?>