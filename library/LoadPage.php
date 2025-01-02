<?php
include_once '../../library/Import.php';
Import::library('Map');
Import::library('Navigation');

class LoadPage
{
	public static function load()
	{
		$map = new Map();
		$map->loadArray($_GET);
			
		if ($map->isElement('action'))
		{
			$path = Navigation::getView().'/'.$map->get('action');
			
			Import::view($path);
		}
		else
			Import::view('template/errorLoadPage');
	} 
}

?>