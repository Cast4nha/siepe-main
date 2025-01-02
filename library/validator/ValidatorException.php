<?php

class ValidatorException extends Exception
{
	public function ValidatorException($message)
	{
		$this->message = $message;
	}
}

?>