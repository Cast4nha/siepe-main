<?php
include_once 'IValidation.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';

class ValidationMail extends Validation implements IValidation
{
	public static function getInstance()
	{
		return new ValidationMail();
	}
	
	public function getName()
	{
		return 'email';
	}
	
	public function isParam()
	{
		return false;
	}
	
	public function isValid($value,$title)
	{
		$conta = "^[a-zA-Z0-9\._-]+@";
		$domino = "[a-zA-Z0-9\._-]+.";
		$extensao = "([a-zA-Z]{2,4})$";
	
		$pattern = $conta.$domino.$extensao;
	
		if (!ereg($pattern, $value))
			$this->addError('string.mail');
	}
}

?>