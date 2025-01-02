<?php

interface IRequest
{
	public function get($key);
	
	public function add($key,$value);
	
	public function isElement($key);
	
	public function isElementNotNull($key);
	
	public function toString();
	
	public function getObject($object);
	
	public function updateKey($keyActual,$newKey);
}

?>