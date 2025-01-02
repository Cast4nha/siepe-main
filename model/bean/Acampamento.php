<?php

class Acampamento
{
    private $id;

    private $nome;

    private $idPesca;

    private $nome_pesqueiro;

    public function getNomePesqueiro()
    {
        return $this->nome_pesqueiro;
    }

    public function setNomePesqueiro($nomePesqueiro)
    {
        $this->nome_pesqueiro = $nomePesqueiro;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getIdPesca()
    {
        return $this->idPesca;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setIdPesca($idPesca)
    {
        $this->idPesca = $idPesca;
    }
}
?>