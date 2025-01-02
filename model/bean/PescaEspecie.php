<?php

include_once 'TipoMedicao.php';

class PescaEspecie
{
    private $idpesca;
    private $idespecie;
    private $arte;
    private $tipomedicao;
    private $fator;
    private $qtdvendida;
    private $preco;
    private $qtdconsumida;

    public function getIdpesca()
    {
        return $this->idpesca;
    }
    public function setIdpesca($idpesca)
    {
        $this->idpesca = $idpesca;
    }
    public function getIdespecie()
    {
        return $this->idespecie;
    }
    public function setIdespecie($idespecie)
    {
        $this->idespecie = $idespecie;
    }
    public function getArte()
    {
        return $this->arte;
    }
    public function setArte($arte)
    {
        $this->arte = $arte;
    }
    public function getTipomedicao()
    {
        return $this->tipomedicao;
    }
    public function setTipomedicao($tipomedicao)
    {
        $this->tipomedicao = $tipomedicao;
    }
    public function getFator()
    {
        return $this->fator;
    }
    public function setFator($fator)
    {
        $this->fator = $fator;
    }
    public function getQtdvendida()
    {
        return $this->qtdvendida;
    }
    public function setQtdvendida($qtdvendida)
    {
        $this->qtdvendida = $qtdvendida;
    }
    public function getPreco()
    {
        return $this->preco;
    }
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
    public function getQtdconsumida()
    {
        return $this->qtdconsumida;
    }
    public function setQtdconsumida($qtdconsumida)
    {
        $this->qtdconsumida = $qtdconsumida;
    }
}
?>