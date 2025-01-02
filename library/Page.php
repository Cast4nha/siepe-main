<?php

include_once 'IPage.php';

class Page implements IPage
{
	private $action;
	private $view;
	private $keyMessageProperties;
	private $param;
	
	
	public function Page($action,$keyMessageProperties=null,$param=null,$view=null)
	{
		$this->action = $action;
		$this->keyMessageProperties = $keyMessageProperties;
		$this->param = $param;
		$this->view = $view;
	}
	
	public function setAction($action)
	{
		$this->action = $action;
	}
	
	public function setMessage($keyMessageProperties,$param=null)
	{
		$this->keyMessageProperties = $keyMessageProperties;
		$this->param = $param;
	}
	
	public function addGet($key,$value)
	{
		$this->action .= '&'.$key.'='.$value;
	}
	
	public function getAction()
	{
		return $this->action;
	}
	
	public function getKeyMessageProperties()
	{
		return $this->keyMessageProperties;
	}
	
	public function getParam()
	{
		return $this->param;
	}
	
	public function getView()
	{
		return $this->view;
	}
	
	public function isMessage()
	{
		return ($this->getKeyMessageProperties() != null);
	}
	
	public function isParam()
	{
		return ($this->getParam() != null);	
	}
	
	public function isView()
	{
		return ($this->getView() != null);
	}
	
	public function setView($view)
	{
		$this->view = $view;
	}
	
}

?>