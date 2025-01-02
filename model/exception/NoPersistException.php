<?php

class NoPersistException extends Exception
{
	public function NoPersistException($message='')
	{
		$this->message = $message;
	}
}

?>