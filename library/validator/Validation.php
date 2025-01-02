<?php

class Validation
{
	private $errors;
	
	public function addError($error)
	{
		$this->errors[] = $error;		
	}
	
	public function getErrors()
	{
		$errors = $this->errors;
		$this->errors = null;
		return $errors;
	}
	
}

?>