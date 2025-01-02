<?php
include_once 'IValidation.php';
include_once 'ValidatorException.php';
include_once 'Validation.php';
include_once '../../library/MessageProperties.php';

class ValidationDate extends Validation implements IValidation
{
	public static function getInstance()
	{
		return new ValidationDate();
	}
	
	public function getName()
	{
		return 'date';
	}
	
	public function isParam()
	{
		return false;
	}
	
	public function isValid($value,$title)
	{
		$data = explode("/",$value);

		if (count($data) != 3)
			$this->addError(MessageProperties::getMessageParam('validator.date.pattern', $title));
		
		$dia = $data[0];
		
		if (isset($data[1]))
			$mes = $data[1];
		else $mes = null;

		if (isset($data[1]))
			$ano = $data[2];
		else $ano = null;
		
		if (strlen($ano) != 4)
			$this->addError(MessageProperties::getMessageParam('validator.date.year', $title));
		
		if ($ano)
		{
			$validDate = checkdate($mes,$dia,$ano); 
			if (!$validDate)
				$this->addError(MessageProperties::getMessageParam('validator.date.invalid', $title));
		}
		
	}
}

?>