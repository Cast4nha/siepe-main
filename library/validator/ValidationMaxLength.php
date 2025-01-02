<?php
include_once 'IValidationParam.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';

class ValidationMaxLength extends Validation implements IValidationParam
{
	private $param = null;
	
	public static function getInstance()
	{
		return new ValidationMaxLength();
	}
	
	public function getName()
	{
		return 'max';
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
		if (strlen($value) > $this->param)
			$this->addError('string.max');
		
		$this->param = null;
	}
}

?>