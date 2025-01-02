<?php
include_once 'IValidation.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';

class ValidationNumber extends Validation implements IValidation
{
	public static function getInstance()
	{
		return new ValidationNumber();
	}
	
	public function getName()
	{
		return 'number';
	}
	
	public function isParam()
	{
		return false;
	}
	
	public function isValid($value,$title)
	{
		if (!is_numeric($value))
			$this->addError(MessageProperties::getMessageParam('validator.string.number', $title));
	}
}

?>