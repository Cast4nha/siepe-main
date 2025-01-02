<?php
include_once 'Action.php';
class ActionPesca extends Action
{
	public function ActionPesca()
	{
		if ($this->dao == null)
		{
			include_once '../../model/dao/PescaDao.php';
			include_once '../../model/bean/Pesca.php';
			include_once '../../model/bean/PescaEmbarcacao.php';
			include_once '../../model/bean/PescaInstrumento.php';
			include_once '../../model/bean/PescaTipoComprador.php';
			include_once '../../model/bean/PescaEspecie.php';
			$this->dao = new PescaDao();
		}
	}
	
	public function cadastrar(Pesca $pesca)
	{
		if ($pesca!=null) { 
			return $this->dao->insert($pesca); 
		}
		else { 
			return null; 
		}
	}
	public function getAll()
	{
		return $this->dao->selectAll();
	}

    public function getAllRio()
    {
        return $this->dao->selectAllRio();
    }

    public function getAllPorto()
    {
        return $this->dao->selectAllPorto();
    }

    public function getAllPescador()
    {
        return $this->dao->selectAllPescador();
    }

	public function buscaGeral($buscaPescador,$buscaComunidade,$buscaPorto,$buscaRio,$buscaAcampamento,$buscaPesqueiro,$buscaQtdPescadores,$buscaIdAmbiente,$buscaInstrumento,$buscaEmbarcacao,$buscaDataInicial,$buscaDataFinal,$buscaIdInstituicao,$buscaAtivo)
	{	
		return $this->dao->findBy($buscaPescador,$buscaComunidade,$buscaPorto,$buscaRio,$buscaAcampamento,$buscaPesqueiro,$buscaQtdPescadores,$buscaIdAmbiente,$buscaInstrumento,$buscaEmbarcacao,$buscaDataInicial,$buscaDataFinal,$buscaIdInstituicao,$buscaAtivo);
	}
	public function getById($idPesca)
	{	
		return $this->dao->findById($idPesca);
	}
	public function atualizarTurmaPesca(Pesca $pesca)
	{
		return $this->dao->updateTurma($pesca);
	}
	public function cadastrarPescaEmbarcacao($idPesca,$idEmbarcacao,$tamanho,$motorpotencia)
	{
		$pescaEmbarcacao = new PescaEmbarcacao();
		$pescaEmbarcacao->setIdpesca($idPesca);
		$pescaEmbarcacao->setIdembarcacao($idEmbarcacao);
		$pescaEmbarcacao->setTamanho($tamanho);
		$pescaEmbarcacao->setMotorpotencia($motorpotencia);
		return $this->dao->insertPescaEmbarcacao($pescaEmbarcacao);
	}
	public function cadastrarPescaInstrumento($idPesca,$idInstrumento,$qtd,$detalhes,$idEstrategia)
	{
		$pescaInstrumento = new PescaInstrumento();
		$pescaInstrumento->setIdpesca($idPesca);
		$pescaInstrumento->setIdinstrumento($idInstrumento);
		$pescaInstrumento->setQtd($qtd);
		$pescaInstrumento->setDetalhes($detalhes);
		$pescaInstrumento->setIdestrategia($idEstrategia);
		return $this->dao->insertPescaInstrumento($pescaInstrumento);
	}
	public function cadastrarPescaTipoComprador($idPesca,$idTipoComprador)
	{
		$pescaComprador = new PescaTipoComprador();
		$pescaComprador->setIdpesca($idPesca);
		$pescaComprador->setIdtipocompador($idTipoComprador);
		return $this->dao->insertPescaTipoComprador($pescaComprador);
	}
	public function cadastrarPescaEspecie($idPesca,$idEspecie,$arte,$tipoMedicao,$fator,$qtdVendida,$preco,$qtdConsumida)
	{
		$pescaEspecie = new PescaEspecie();
		$pescaEspecie->setIdPesca($idPesca);
		$pescaEspecie->setIdespecie($idEspecie);
		$pescaEspecie->setArte($arte);
		$pescaEspecie->setTipoMedicao($tipoMedicao);
        $pescaEspecie->setFator($fator);
        $pescaEspecie->setQtdvendida($qtdVendida);
		$pescaEspecie->setPreco($preco);
        $pescaEspecie->setQtdconsumida($qtdConsumida);
		return $this->dao->insertPescaEspecie($pescaEspecie);
	}
	public function getByIdComunidade($idComunidade) 
	{
		return $this->dao->findByIdComunidade($idComunidade);
	}
	public function getByIdPescaInstrumento($idPesca)
	{
		return $this->dao->findByIdPescaInstrumento($idPesca);
	}
	public function getByIdPescaEmbarcacao($idPesca)
	{
	    return $this->dao->findByIdPescaEmbarcacao($idPesca);
	}
	public function getByIdPescaComprador($idPesca)
	{
		return $this->dao->findByIdPescaComprador($idPesca);
	}
	public function getByIdPescaEspecie($idPesca)
	{
		return $this->dao->findByIdPescaEspecie($idPesca);
	}
	public function getQuantPesca($data_inicial, $data_final, $rio) {
	    return $this->dao->findQuantPesca($data_inicial, $data_final, $rio);
	}
	public function getQtdPescaMes() {
	    return $this->dao->findQtdPescaMes();
	}
    public function getQtdPescaMesByAno($ano) {
        return $this->dao->findQtdPescaMesByAno($ano);
    }
	public function getQtdPescaComunidade() {
	    return $this->dao->findQtdPescaComunidade();
	}
    public function getQtdPescaComunidadeByAno($ano) {
        return $this->dao->findQtdPescaComunidadeByAno($ano);
    }
	public function getQtdPeixesPescados() {
	    return $this->dao->findQtdPeixesPescados();
	}
    public function getQtdPeixesPescadosByAno($ano) {
        return $this->dao->findQtdPeixesPescadosByAno($ano);
    }
	public function getQtdPeixesOvados() {
	    return $this->dao->findQtdPeixesOvados();
	}
	public function getAllCpue() {
	    return $this->dao->selectAllCpue();
	}
	public function getCpueAno() {
	    return $this->dao->findCpueAno();
	}
	public function getCpueComunidade() {
	    return $this->dao->findCpueComunidade();
	}
    public function getCpueComunidadeByAno($ano) {
        return $this->dao->findCpueComunidadeByAno($ano);
    }

	//deletes da pesca(em 6 tabelas do banco de dados)

    //2-embarcacao
    public function excluirEmbarcacao($idPesca){
	    return $this->dao->deletePescaEmbarcacao($idPesca);
    }
    //3-especie
    public function excluirEspecie($idPesca){
	    return $this->dao->deletePescaEspecie($idPesca);
    }
    //4-insstrumento
	public function excluirPescaInstrumento($idPesca)
	{
	    return $this->dao->deleteByPescaInstrumento($idPesca);
	}
	//5-estrategia
	public function excluirPescaInstrumentoEstrategia($idPesca)
	{
	    return $this->dao->deleteByPescaInstrumentoEstrategia($idPesca);
	}
	//6-comprador
	public function excluirPescaComprador($idPesca)
	{
	    return $this->dao->deletePescaComprador($idPesca);
	}
    //1-pesca
    public function excluir($idPesca)
    {
        return $this->dao->delete($idPesca);
    }
    public function desAtivarPesca($id,$ativo)
    {
        if($ativo == true)
            $ativo = false;
        else
            $ativo = true;
        return $this->dao->editAtivo($id,$ativo);
    }

    public function atualizarPesca(Pesca $pesca)
	{
	    return $this->dao->updatePesca($pesca);
	}

	public function salvarAcampamento(Acampamento $acampamento){
        return $this->dao->salvarAcampamento($acampamento);
    }

    public function findAcapamentoByPesca($idPesca){
	    return $this->dao->findAcampamentoByIdPesca($idPesca);
    }

    public function deleteAcampamentoByPesca($idPesca){
        return $this->dao->deleteAcampamentoByIdPesca($idPesca);
    }

    public function selectAnosPesca(){
	    return $this->dao->selectAnosDePesca();
    }
}
?>