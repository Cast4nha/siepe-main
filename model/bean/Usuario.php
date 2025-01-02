<?php

class Usuario
{

    private $id;

    private $login;

    private $senha;

    private $idperfil;

    private $nome;

    private $email;

    private $idinstituicao;

    private $idcomunidade;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setIdperfil($idperfil)
    {
        $this->idperfil = $idperfil;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getIdperfil()
    {
        return $this->idperfil;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getIdinstituicao()
    {
        return $this->idinstituicao;
    }

    public function getIdcomunidade()
    {
        return $this->idcomunidade;
    }

    public function setIdinstituicao($idinstituicao)
    {
        $this->idinstituicao = $idinstituicao;
    }

    public function setIdcomunidade($idcomunidade)
    {
        $this->idcomunidade = $idcomunidade;
    }
}

?>