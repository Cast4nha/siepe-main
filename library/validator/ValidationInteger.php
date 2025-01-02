<?php
include_once 'IValidation.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';

class ValidationInteger extends Validation implements IValidation
{
	public static function getInstance()
	{
		return new ValidationInteger();
	}
	
	public function getName()
	{
		return 'integer';
	}
	
	public function isParam()
	{
		return false;
	}
	
	public function isValid($value,$title)
	{
		if (!preg_match('/^[0-9]*$/', $value))
			$this->addError(MessageProperties::getMessageParam('validator.integer',$title));
	}
}

?>