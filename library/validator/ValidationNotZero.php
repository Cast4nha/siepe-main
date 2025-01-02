<?php
include_once 'IValidation.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';

class ValidationNotZero extends Validation implements IValidation
{
	public static function getInstance()
	{
		return new ValidationNotZero();
	}
	
	public function getName()
	{
		return 'notZero';
	}
	
	public function isParam()
	{
		return false;
	}
	
	public function isValid($value,$title)
	{
		if ($value == 0)
			$this->addError('string.notZero');
	}
}

?>