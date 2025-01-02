<?php
class Instrumento
{
    private $id;
    private $descricao;
    private $ativo;
    
    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }
}
?>