<?php
include_once 'IValidationParam.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';

class ValidationMinLength extends Validation implements IValidationParam
{
	private $param = null;
	
	public static function getInstance()
	{
		return new ValidationMinLength();
	}
	
	public function getName()
	{
		return 'min';
	}
	
	public function isParam()
	{
		return true;
	}
	
	public function setParam($param)
	{
		$this->param = $param;
	}
	
	public function isValid($value,$title)
	{
		if (strlen($value) < $this->param)
			$this->addError(MessageProperties::getMessageParams('validator.string.min',array($title,$this->param)));
				
		$this->param = null;
	}
}

?>