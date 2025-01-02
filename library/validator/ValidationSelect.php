<?php
include_once 'IValidation.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';
include_once '../../library/MessageProperties.php';

class ValidationSelect extends Validation implements IValidation
{
	public static function getInstance()
	{
		return new ValidationSelect();
	}
	
	public function getName()
	{
		return 'select';
	}
	
	public function isParam()
	{
		return false;
	}
	
	public function isValid($value,$title)
	{
		if(is_array($value))
		{
			foreach ($value as $campo)
			{
				if ($campo == '0')
					$this->addError(MessageProperties::getMessageParam('validator.select', $title));
			}
				if (count($value) == 0 )
					$this->addError(MessageProperties::getMessageParam('validator.select', $title));
		}
		else
		{
			if (!$value)
				$this->addError(MessageProperties::getMessageParam('validator.select', $title));
			
			if ($value == '0')
				$this->addError(MessageProperties::getMessageParam('validator.select', $title));
		}
	}
}

?>