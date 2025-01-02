<?php

class FieldsetHtml
{
	public static function open($legend)
	{
		echo "<fieldset><legend>{$legend}</legend>";
	}
	
	public static function close()
	{
		echo '</fieldset>';
	}
	
}

?>