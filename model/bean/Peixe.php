<?php
class Peixe
{
    private $id;
    private $nomepopular;
    private $genero;
    private $especie;
    private $ordem;
    private $familia;
    
    public function getId()
    {
        return $this->id;
    }

    public function getNomepopular()
    {
        return $this->nomepopular;
    }

    public function getGenero()
    {
        return $this->genero;
    }
    
    public function getEspecie()
    {
    	return $this->especie;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNomepopular($nomepopular)
    {
        $this->nomepopular = $nomepopular;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
    
    public function setEspecie($especie)
    {
    	$this->especie = $especie;
    }
    public function getOrdem()
    {
        return $this->ordem;
    }

    public function getFamilia()
    {
        return $this->familia;
    }

    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
    }

    public function setFamilia($familia)
    {
        $this->familia = $familia;
    }
}
?>