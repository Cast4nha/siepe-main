<?php
include_once 'Action.php';
class ActionEmbarcacao extends Action
{
	public function ActionEmbarcacao()
	{
		if ($this->dao == null)
		{
			include_once '../../model/dao/EmbarcacaoDao.php';
			include_once '../../model/bean/Embarcacao.php';
			include_once '../../model/bean/DescricaoEmbarcacao.php';
			$this->dao = new EmbarcacaoDao();
		}
	}
	
	public function cadastrar($descricao)
	{
		$embarcacao = $this->dao->findByDescricao($descricao);
		if ($embarcacao!=null && $embarcacao>0) {
			return array(false,'A descrição informada já existe, favor verificar.');
		}
		$embarcacao = new Embarcacao();
		$embarcacao->setDescricao($descricao);
		$cadastro = $this->dao->insert($embarcacao);
		if ($cadastro!=null && $cadastro>0) {
			return array(true,'Cadastro de embarcação realizado com sucesso!');
		}
		else {
			return array(false,'Falha no cadastro de embarcação, favor informar a administração do sistema.');
		}
	}
	
	public function cadastrarSemVerificacao($descricao)
	{
	    $embarcacao = new Embarcacao();
	    $embarcacao->setDescricao($descricao);
	    return $this->dao->insert($embarcacao);
	}
	
	public function getAll()
	{
		return $this->dao->selectAllEmbarcacao();
	}
	
	public function getEmbarcacaoById($id)
	{
		return $this->dao->findById($id);
	}
	
	public function getAllDistinct()
	{
		return $this->dao->selectAllDistinct();
	}
	
	public function getByDescricao($descricao)
	{
		return $this->dao->findByDescricao($descricao);
	}

	public function getBy($descricao,$tamanho,$potencia)
	{
		$embarcacao = new Embarcacao();
		$embarcacao->setIddescricao($descricao);
		$embarcacao->setTamanho($tamanho);
		$embarcacao->setMotorpotencia($potencia);
		return $this->dao->findBy($embarcacao);
	}
	
	public function excluir($idEmbarcacao)
	{	
		return $this->dao->delete($idEmbarcacao);
	}
	
	public function excluirPescaEmbarcacao($idPesca)
	{
	    return $this->dao->deletePescaEmbarcacao($idPesca);
	}
	
	public function editar($id,$descricao)
	{
		$embarcacao = new Embarcacao();
		$embarcacao->setId($id);
		$embarcacao->setDescricao($descricao);
		return $this->dao->edit($embarcacao);
	}
	public function getByIdEmbarcacao($idEmbarcacao)
	{
	    return $this->dao->findById($idEmbarcacao);
	}
}
?>