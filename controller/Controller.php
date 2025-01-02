<?php
include_once '../../library/Import.php';
Import::library('html/FieldsetHtml');
Import::library('html/DivHtml');
Import::library('html/LinkHtml');
Import::library('html/GridHtml');
Import::library('html/BoxMessage');
Import::library('html/Select');
Import::library('Page');
Import::library('Session');
Import::library('Request');
Import::library('validator/Validator');
Import::library('Date');
Import::library('Number');
Import::library('Link');
Import::library('File');



/**
 * @package controller
*/
abstract class Controller
{

	protected $action;

	public function LibHtml()
	{
		include_once '../../library/LibHtml.php';
		return $html = new LibHtml();
	}

	public function LibMessage()
	{
		include_once '../../library/LibMessage.php';
		return $message = new LibMessage();
	}

	public function LibProject()
	{
		include_once '../../library/LibProject.php';
		return $project = new LibProject();
	}

	public function LibScript()
	{
		include_once '../../library/LibScript.php';
		return $script = new LibScript();
	}

	public function LibStyle()
	{
		include_once '../../library/LibStyle.php';
		return $style = new LibStyle();
	}

	public function LibUpload()
	{
		include_once '../../library/LibUpload.php';
		return $style = new LibUpload();
	}
	
	public function LibSession()
	{
		include_once '../../library/LibSession.php';
		return $session = new LibSession();
	}
	
	public function LibXml()
	{
		include_once '../../library/LibXml.php';
		return $xml = new LibXml();
	}

}
?>