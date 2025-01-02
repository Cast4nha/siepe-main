<?php

class PescaTipoComprador
{
	private $idpesca;
	private $idtipocomprador;
	
	public function getIdpesca()
	{
		return $this->idpesca;
	}
	
	public function getIdtipocomprador()
	{
		return $this->idtipocomprador;
	}
	
	public function setIdpesca($idpesca)
	{
		$this->idpesca = $idpesca;
	}
	
	public function setIdtipocompador($idtipocomprador)
	{
		$this->idtipocomprador= $idtipocomprador;
	}
}
?>