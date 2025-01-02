<?php
include_once 'IValidation.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';
include_once '../../library/MessageProperties.php';

class ValidationEmpty extends Validation implements IValidation
{
	public static function getInstance()
	{
		return new ValidationEmpty();
	}
	
	public function getName()
	{
		return 'required';
	}
	
	public function isParam()
	{
		return false;
	}
	
	public function isValid($value,$title)
	{
		$trimmed = trim($value);

		if (strlen($trimmed) == 0)
			$this->addError(MessageProperties::getMessageParam('validator.string.required',$title));
	}
}

?>