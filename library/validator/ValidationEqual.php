<?php
include_once 'IValidationParam.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';
include_once '../../library/Request.php';
include_once '../../library/MessageProperties.php';

class ValidationEqual extends Validation implements IValidationParam
{
	private $param = null;
	
	public static function getInstance()
	{
		return new ValidationEqual();
	}
	
	public function getName()
	{
		return 'equals';
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
		$request = new Request();
		
		if ($value != $request->get($this->param))
			$this->addError(MessageProperties::getMessageParam('validator.string.equals',$title));
		
		$this->param = null;
	}
}

?>