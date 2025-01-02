<?php

interface IValidation
{
	public function getName();

	public function isParam();
	
	public function isValid($value,$title);
	
	public function getErrors();
	
	public function addError($error);
}

?>