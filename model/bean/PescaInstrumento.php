<?php

class PescaInstrumento
{
    private $idpesca;
    private $idinstrumento;
    private $qtd;
    private $detalhes;
    private $idestrategia;

    public function getIdestrategia()
    {
        return $this->idestrategia;
    }

    public function setIdestrategia($idestrategia)
    {
        $this->idestrategia = $idestrategia;
    }
    
    public function getIdpesca()
    {
        return $this->idpesca;
    }

    public function getIdinstrumento()
    {
        return $this->idinstrumento;
    }
    
    public function getQtd()
    {
    	return $this->qtd;
    }
    
    public function getDetalhes()
    {
    	return $this->detalhes;
    }

    public function setIdpesca($idPesca)
    {
        $this->idpesca = $idPesca;
    }

    public function setIdinstrumento($idInstrumento)
    {
        $this->idinstrumento = $idInstrumento;
    }
    
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;
    }
    
    public function setDetalhes($detalhes)
    {
    	$this->detalhes = $detalhes;
    }
 
}
?>