<?php
include_once 'IValidation.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';

class ValidationCheckBox extends Validation implements IValidation
{
	public static function getInstance()
	{
		return new ValidationCheckBox();
	}
	
	public function getName()
	{
		return 'checkbox';
	}
	
	public function isParam()
	{
		return false;
	}
	
	public function isValid($value,$title)
	{
		if ($value == null)
			$this->addError('string.checkbox');
	}
}

?>