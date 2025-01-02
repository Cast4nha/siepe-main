<?php
class PescaEmbarcacao
{
    private $id;
	private $idpesca;
	private $idembarcacao;
	private $tamanho;
	private $motorpotencia;
	
    public function getId()
    {
        return $this->id;
    }

    public function getIdpesca()
    {
        return $this->idpesca;
    }

    public function getIdembarcacao()
    {
        return $this->idembarcacao;
    }

    public function getTamanho()
    {
        return $this->tamanho;
    }

    public function getMotorpotencia()
    {
        return $this->motorpotencia;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdpesca($idpesca)
    {
        $this->idpesca = $idpesca;
    }

    public function setIdembarcacao($idembarcacao)
    {
        $this->idembarcacao = $idembarcacao;
    }

    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;
    }

    public function setMotorpotencia($motorpotencia)
    {
        $this->motorpotencia = $motorpotencia;
    }

}
?>