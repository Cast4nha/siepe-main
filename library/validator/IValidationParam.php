<?php

include_once 'IValidation.php';

interface IValidationParam extends IValidation
{
	public function setParam($param);
}