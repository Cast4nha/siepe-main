<?php
class Pesca
{
    private $id;
    private $idpescador;
    private $horarioinicio;
    private $horariotermino;
    private $numpescadores;
    private $pesoconsumido;
    private $pesovendido;
    private $valorcusto;
    private $valorvenda;
    private $datacadastro;
    private $tempototal;
    private $tempochegada;
    private $diapesca;
    private $mespesca;
    private $anopesca;
    private $idusuario;
    private $gelo;
    private $combustivel;
    private $alimento;
    private $dia_inicio;
    private $dia_fim;
    private $ativo;
    //novos atributos(modificacao do dia 09/07/2019)
    private $diasemana;
    private $qtd_dias;
    private $outros_gastos;
    private $nome_porto;
    private $nome_rio;
    private $idcidade;
    private $nome_pescador;
    private $idcomunidade;


    public function getIdcomunidade()
    {
        return $this->idcomunidade;
    }

    public function setIdcomunidade($idcomunidade)
    {
        $this->idcomunidade = $idcomunidade;
    }

    public function getNomePescador()
    {
        return $this->nome_pescador;
    }

    public function setNomePescador($nome_pescador)
    {
        $this->nome_pescador = $nome_pescador;
    }

    public function getIdcidade()
    {
        return $this->idcidade;
    }

    public function setIdcidade($idcidade)
    {
        $this->idcidade = $idcidade;
    }

    public function getNomeRio()
    {
        return $this->nome_rio;
    }

    public function setNomeRio($nome_rio)
    {
        $this->nome_rio = $nome_rio;
    }

    public function getNomePorto()
    {
        return $this->nome_porto;
    }

    public function setNomePorto($nome_porto)
    {
        $this->nome_porto = $nome_porto;
    }

    public function getOutrosGastos()
    {
        return $this->outros_gastos;
    }

    public function setOutrosGastos($outros_gastos)
    {
        $this->outros_gastos = $outros_gastos;
    }

    public function getQtdDias()
    {
        return $this->qtd_dias;
    }

    public function setQtdDias($qtd_dias)
    {
        $this->qtd_dias = $qtd_dias;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getIdpescador()
    {
        return $this->idpescador;
    }

    public function getDiapesca()
    {
        return $this->diapesca;
    }
    
    public function getMespesca()
    {
    	return $this->mespesca;
    }
    
    public function getAnopesca()
    {
    	return $this->anopesca;
    }

    public function getHorarioinicio()
    {
        return $this->horarioinicio;
    }

    public function getHorariotermino()
    {
        return $this->horariotermino;
    }

    public function getNumpescadores()
    {
        return $this->numpescadores;
    }

    public function getPesoconsumido()
    {
        return $this->pesoconsumido;
    }
    
    public function getPesovendido()
    {
    	return $this->pesovendido;
    }

    public function getTempototal()
    {
        return $this->tempototal;
    }
    
    public function getValorcusto()
    {
    	return $this->valorcusto;
    }
    
    public function getValorvenda()
    {
    	return $this->valorvenda;
    }
    
    public function getDatacadastro()
    {
    	return $this->datacadastro;
    }
    
    public function getTempochegada()
    {
    	return $this->tempochegada;
    }
    
    public function getIdusuario()
    {
    	return $this->idusuario;
    }
    
    public function getGelo()
    {
    	return $this->gelo;
    }
    
    public function getCombustivel()
    {
    	return $this->combustivel;
    }
    
    public function getAlimento()
    {
    	return $this->alimento;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdpescador($idpescador)
    {
        $this->idpescador = $idpescador;
    }

    public function setDiapesca($diapesca)
    {
        $this->diapesca = $diapesca;
    }

    public function setMespesca($mespesca)
    {
    	$this->mespesca = $mespesca;
    }
    
    public function setAnopesca($anopesca)
    {
    	$this->anopesca = $anopesca;
    }
    
    public function setHorarioinicio($horarioinicio)
    {
        $this->horarioinicio = $horarioinicio;
    }

    public function setHorariotermino($horariotermino)
    {
        $this->horariotermino = $horariotermino;
    }

    public function setNumpescadores($numpescadores)
    {
        $this->numpescadores = $numpescadores;
    }

    public function setPesoconsumido($pesoconsumido)
    {
    	$this->pesoconsumido= $pesoconsumido;
    }
    
    public function setPesovendido($pesovendido)
    {
    	$this->pesovendido = $pesovendido;
    }

    public function setTempototal($tempototal)
    {
        $this->tempototal = $tempototal;
    }
    
    public function setValorcusto($valorcusto)
    {
    	$this->valorcusto = $valorcusto;
    }
    
    public function setValorvenda($valorvenda)
    {
    	$this->valorvenda = $valorvenda;
    }
    
    public function setDatacadastro($datacadastro)
    {
    	$this->datacadastro = $datacadastro;
    }

    public function setTempochegada($tempochegada)
    {
    	$this->tempochegada= $tempochegada;
    }
    
    public function setIdusuario($idusuario)
    {
    	$this->idusuario = $idusuario;
    }
    
    public function setGelo($gelo)
    {
    	$this->gelo= $gelo;
    }
    
    public function setCombustivel($combustivel)
    {
    	$this->combustivel= $combustivel;
    }
    
    public function setAlimento($alimento)
    {
    	$this->alimento= $alimento;
    }

    public function getDiaInicio()
    {
        return $this->dia_inicio;
    }

    public function setDiaInicio($dia_inicio)
    {
        $this->dia_inicio = $dia_inicio;
    }

    public function getDiaFim()
    {
        return $this->dia_fim;
    }

    public function setDiaFim($dia_fim)
    {
        $this->dia_fim = $dia_fim;
    }

    public function getCpue(){
        $dataInicio = strtotime($this->dia_inicio);
        $dataFim = strtotime($this->dia_fim);
        $intervalo = ($dataFim - $dataInicio) / 86400;
        return ($this->pesoconsumido + $this->pesovendido) / ($this->numpescadores * ($intervalo + 1));
    }

    public function getDiasemana()
    {
        return $this->diasemana;
    }

    public function setDiasemana($diasemana)
    {
        $this->diasemana = $diasemana;
    }
}
?>