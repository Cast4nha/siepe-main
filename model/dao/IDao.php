<?php

interface IDao
{
	public function get();
	
	public function prepare();
	
	public function executeStmt();

	public function fetchStmtObj($class);
	
	public function fetchAllStmtObj($class);
	
	public function fetchStmt();
	
	public function fetchAllStmt();

}

?>