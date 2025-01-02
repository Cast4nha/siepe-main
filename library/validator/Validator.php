<?php

include_once 'ValidationEmpty.php';
include_once 'ValidationNumber.php';
include_once 'ValidationInteger.php';
include_once 'ValidationNotZero.php';
include_once 'ValidationMinLength.php';
include_once 'ValidationMaxLength.php';
include_once 'ValidationDate.php';
include_once 'ValidationMail.php';
include_once 'ValidationSelect.php';
include_once 'ValidationCheckBox.php';
include_once 'ValidationEqual.php';
include_once 'ValidatorException.php';
include_once '../../library/html/BoxMessage.php';

class Validator
{
	private $request;
	private $validations = array();
	private $errors = array();
	
	public function Validator(IRequest $request)
	{
		$this->request = $request;
		$this->addValidation(ValidationEmpty::getInstance());
		$this->addValidation(ValidationNumber::getInstance());
		$this->addValidation(ValidationInteger::getInstance());
		$this->addValidation(ValidationNotZero::getInstance());
		$this->addValidation(ValidationMinLength::getInstance());
		$this->addValidation(ValidationMaxLength::getInstance());
		$this->addValidation(ValidationDate::getInstance());
		$this->addValidation(ValidationMail::getInstance());
		$this->addValidation(ValidationSelect::getInstance());
		$this->addValidation(ValidationCheckBox::getInstance());
		$this->addValidation(ValidationEqual::getInstance());
	}
	
	public function addValidation(IValidation $validation)
	{
		$this->validations[$validation->getName()] = $validation;
	}
	
	public function addErrors($error)
	{
		$this->errors[] = $error;
	}
	
	public function isValid()
	{
		return ($this->errors) ? false : true;
	}
	
	public function validate()
	{
		if ($this->errors)
			throw new ValidatorException($this->getErrors());
	}
	
	private function getErrors()
	{
		$errors = "";

		if ($this->errors)
		{
			foreach ($this->errors as $error)
			{
				$errors .= $error.'<br/>';
			}
		}
		
		return $errors;
	}
	
	
	public function showErrors()
	{
		if ($this->errors)
		{
			$errors = "";
			
			foreach ($this->errors as $error)
			{
				$errors .= $error.'<br/>';
			}
			
			BoxMessage::error($errors);
		}
	}
	
	/**
	 * @return IValidation 
	 */
	private function getValidation($nameValidation)
	{
		if (isset($this->validations[$nameValidation]))
			return $this->validations[$nameValidation];
		
		return false;
	}
	
	private function addError($listError)
	{
		if (is_array($listError))
			foreach ($listError as $error)
				$this->errors[] = $error;				
	}
	
	public function addRule($keyRequest,$titleField,$stringValidation)
	{
		$listValidation = $this->getListByStringValidations($stringValidation);
	
		foreach ($listValidation as $validation)
		{
			if ($this->isExistValidation($validation))
			{
				$valid = $this->getValidation($this->getNameValidation($validation));
					
				if ($valid)
				{
					if ($valid->isParam())
					{
						$valid->setParam($this->getParamValidation($validation));
					}

					$valid->isValid($this->request->get($keyRequest), $titleField);
					$this->addError($valid->getErrors());
				}
			}
		}
	}
	
	private function getListByStringValidations($validations)
	{
		return explode(';', $validations);
	}
	
	private function isExistValidation($nameValidation)
	{
		if ($nameValidation)
			return true;
		
		return false;
	}
	
	private function getNameValidation($nameValidation)
	{
		$posicaoParentese = stripos($nameValidation,'(');
			
		if ($posicaoParentese)
			return substr($nameValidation, 0,$posicaoParentese);
		
		return $nameValidation;
	}
	
	private function isParam($nameValidation)
	{
		$posicaoParentese = stripos($nameValidation,'(');
				
		if ($posicaoParentese)
			return true;	
	
		return false;
	}
	
	private function getParamValidation($nameValidation)
	{
		$posicaoParenteseInicio = stripos($nameValidation,'(');
			
		if ($posicaoParenteseInicio)
		{
			$posicaoParenteseFim = stripos($nameValidation,');');
			$param = substr($nameValidation, $posicaoParenteseInicio+1, $posicaoParenteseFim-1);
			return $param;
		}
		return null;
	}
	
	
}

?>