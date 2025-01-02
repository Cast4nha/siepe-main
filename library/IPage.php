<?php

interface IPage
{
	public function getAction();
	
	public function getKeyMessageProperties();
	
	public function getParam();
	
	public function getView();
	
	public function isMessage();
	
	public function isParam();

	public function isView();
}


?>