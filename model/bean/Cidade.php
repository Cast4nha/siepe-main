<?php

class Cidade implements JsonSerializable
{

    private $id;

    private $idestado;

    private $descricao;

    public function getId()
    {
        return $this->id;
    }

    public function getIdestado()
    {
        return $this->idestado;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdestado($idestado)
    {
        $this->idestado = $idestado;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
?>