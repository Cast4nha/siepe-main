<?php
include_once 'Dao.php';
class PescaDao extends Dao
{
	public function insert(Pesca $pesca)
	{
		$this->sql = 'INSERT INTO pesca(nome_pescador,idcomunidade,dia_inicio,dia_fim,diasemana,qtd_dias,nome_porto,nome_rio,idcidade,gelo,alimento,combustivel,
                    outros_gastos,numpescadores,valorcusto,pesoconsumido,pesovendido,valorvenda,idusuario) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $this->prepare();

        $this->setParam($pesca->getNomePescador());
        $this->setParam($pesca->getIdcomunidade());
        $this->setParam($pesca->getDiaInicio());
        $this->setParam($pesca->getDiaFim());
        $this->setParam($pesca->getDiasemana());
        $this->setParam($pesca->getQtdDias());
        $this->setParam($pesca->getNomePorto());
        $this->setParam($pesca->getNomeRio());
        $this->setParam($pesca->getIdcidade());
        $this->setParam($pesca->getGelo());
        $this->setParam($pesca->getAlimento());
        $this->setParam($pesca->getCombustivel());
        $this->setParam($pesca->getOutrosGastos());
        $this->setParam($pesca->getNumpescadores());
        $this->setParam($pesca->getValorcusto());
        $this->setParam($pesca->getPesoconsumido());
        $this->setParam($pesca->getPesovendido());
        $this->setParam($pesca->getValorvenda());
        $this->setParam($pesca->getIdusuario());

		return $this->queryIdStmt();
	}
	public function selectAll()
	{
	    $this->sql = 'SELECT p.* FROM pesca p LEFT JOIN pescador pc ON pc.id=p.idpescador LEFT JOIN comunidade c ON c.id=pc.idcomunidade LEFT JOIN pesca_embarcacao pe ON pe.idpesca=p.id LEFT JOIN embarcacao e ON e.id=pe.idembarcacao LEFT JOIN pesca_instrumento pi ON pi.idpesca=p.id LEFT JOIN instrumento i ON i.id=pi.idinstrumento LEFT JOIN local l ON l.id=p.idlocal LEFT JOIN rio r ON r.id=l.idrio';
		$this->prepare();
		return $this->fetchAllStmtObj('Pesca');
	}

    public function selectAllRio()
    {
        $this->sql = 'SELECT distinct upper(nome_rio) as nome_rio FROM pesca ORDER BY upper(nome_rio)';
        $this->prepare();
        return $this->fetchAllStmtObj('Pesca');
    }

    public function selectAllPorto()
    {
        $this->sql = 'SELECT distinct upper(nome_porto) as nome_porto FROM pesca ORDER BY upper(nome_porto)';
        $this->prepare();
        return $this->fetchAllStmtObj('Pesca');
    }

    public function selectAllPescador()
    {
        $this->sql = 'SELECT distinct upper(nome_pescador) as nome_pescador FROM pesca ORDER BY upper(nome_pescador)';
        $this->prepare();
        return $this->fetchAllStmtObj('Pesca');
    }

	//deletes a seguir

	//2-deleta pesca embarcacao a partir do id pesca
	public function deletePescaEmbarcacao($idPesca){

	    $this->sql = 'DELETE FROM pesca_embarcacao WHERE idpesca = ?';
        $this->prepare();
        $this->setParam($idPesca);
        return $this->executeStmt();
    }

    //3-deleta pesca embarcacao a partir do id pesca
    public function deletePescaEspecie($idPesca){

        $this->sql = 'DELETE FROM pesca_especie WHERE idpesca = ?';
        $this->prepare();
        $this->setParam($idPesca);
        return $this->executeStmt();
    }

    //4-deleta pesca instrumento
    public function deleteByPescaInstrumento($idPesca)
    {
        $this->sql = 'DELETE FROM pesca_instrumento WHERE idpesca = ?';
        $this->prepare();
        $this->setParam($idPesca);
        return $this->executeStmt();
    }

    //5-deleta pesca intrumento estrategia
    public function deleteByPescaInstrumentoEstrategia($idPesca)
    {
        $this->sql = 'DELETE FROM pesca_instrumento_estrategia WHERE idpesca = ?';
        $this->prepare();
        $this->setParam($idPesca);
        return $this->executeStmt();
    }

    //6-deleta pesca tipocomprador a partir do id pesca
    public function deletePescaComprador($idPesca)
    {
        $this->sql = 'DELETE FROM pesca_tipocomprador WHERE idpesca = ?';
        $this->prepare();
        $this->setParam($idPesca);
        return $this->fetchAllStmtObj('PescaTipoComprador');
    }

    //1-deleta pesca na tabela pesca do banco de dados
    public function delete($idPesca)
    {
        $this->sql = 'DELETE FROM pesca WHERE id = ?';
        $this->prepare();
        $this->setParam($idPesca);
        return $this->executeStmt();
    }

	public function findBy($pescador,$comunidade,$porto,$rio,$acampamento,$pesqueiro,$qtdPescadores,$idAmbiente,$instrumento,$embarcacao,$dataInicial,$dataFinal,$idInstituicao,$ativo)
	{
		$this->sql = 	'SELECT DISTINCT p.* '.
						'FROM pesca p '.
						'LEFT JOIN comunidade c ON c.id=p.idcomunidade '.
						'LEFT JOIN pesca_embarcacao pe ON pe.idpesca=p.id '.
						'LEFT JOIN embarcacao e ON e.id=pe.idembarcacao '.
						'LEFT JOIN pesca_instrumento pi ON pi.idpesca=p.id '.
						'LEFT JOIN instrumento i ON i.id = pi.idinstrumento '.
						'LEFT JOIN acampamento a ON a.idpesca=p.id '.
                        'LEFT JOIN acampamento_ambiente aa ON aa.idacampamento=a.id ';
		if($idInstituicao && $idInstituicao != 0)
		    $this->sql .= 'JOIN usuario u on (u.id = p.idusuario AND u.idinstituicao = ?) ';
	
        $this->sql .=' WHERE 1=1 ';
		if ($pescador!=null) $this->sql.= 'and p.nome_pescador ilike ? ';
		if ($comunidade!=null) $this->sql.='and c.descricao ilike ? ';
		if ($porto!=null) $this->sql.='and p.nome_porto ilike ? ';
		if ($rio!=null) $this->sql.='and p.nome_rio ilike ? ';
        if ($acampamento!=null) $this->sql.='and a.nome ilike ? ';
        if ($pesqueiro!=null) $this->sql.='and a.nome_pesqueiro ilike ? ';
		if ($qtdPescadores!=null) $this->sql.='and p.numpescadores = ? ';
		if ($idAmbiente!=null) $this->sql.='and aa.idambiente = ? ';
		if ($instrumento!=null) $this->sql.='and i.id = ? ';
		if ($embarcacao!=null) $this->sql.='and e.id = ? ';
		if ($dataInicial!=null) $this->sql.='and p.dia_inicio >= ? ';
		if ($dataFinal!=null) $this->sql.='and p.dia_inicio <= ? ';
		if ($ativo!=null && $ativo!='t') $this->sql.='and p.ativo = ? ';
		$this->sql.=' order by p.id desc';
		
		$this->prepare();
		if ($idInstituicao && $idInstituicao != 0) $this->setParam($idInstituicao);
		if ($pescador!=null) $this->setParam("%$pescador%");
		if ($comunidade!=null) $this->setParam("%$comunidade%");
		if ($porto!=null) $this->setParam("%$porto%");
		if ($rio!=null) $this->setParam("%$rio%");
        if ($acampamento!=null) $this->setParam("%$acampamento%");
        if ($pesqueiro!=null) $this->setParam("%$pesqueiro%");
		if ($qtdPescadores!=null) $this->setParam($qtdPescadores);
		if ($idAmbiente!=null) $this->setParam($idAmbiente);
		if ($instrumento!=null) $this->setParam($instrumento);
		if ($embarcacao!=null) $this->setParam($embarcacao);
		if ($dataInicial!=null) $this->setParam($dataInicial);
		if ($dataFinal!=null) $this->setParam($dataFinal);
		if ($ativo!=null && $ativo!='t') $this->setParam($ativo);

		return $this->fetchAllStmtObj('Pesca');
	}
	public function findById($idPesca)
	{
		$this->sql = 'SELECT * FROM pesca WHERE id = ?';
		$this->prepare();
		$this->setParam($idPesca);
		return $this->fetchStmtObj('Pesca');
	}
	public function updateTurma(Pesca $pesca)
	{
		$this->sql = 'UPDATE pesca SET idTurma=? WHERE id=?';
		$this->prepare();
		$this->setParam($pesca->getIdTurma());
		$this->setParam($pesca->getId());
		return $this->executeStmt();
	}
	public function insertPescaEmbarcacao(PescaEmbarcacao $pescaEmbarcacao)
	{
		$this->sql = 'INSERT INTO pesca_embarcacao (idpesca, idembarcacao, tamanho, motorpotencia) VALUES (?,?,?,?)';
		$this->prepare();
		$this->setParam($pescaEmbarcacao->getIdpesca());
		$this->setParam($pescaEmbarcacao->getIdembarcacao());
		$this->setParam($pescaEmbarcacao->getTamanho());
		$this->setParam($pescaEmbarcacao->getMotorpotencia());
		return $this->queryIdStmt();
	}
	public function insertPescaInstrumento(PescaInstrumento $pescaInstrumento)
	{
		$this->sql = 'INSERT INTO pesca_instrumento (idpesca,idinstrumento,qtd,detalhes,idestrategia) VALUES (?,?,?,?,?)';
		$this->prepare();
		$this->setParam($pescaInstrumento->getIdpesca());
		$this->setParam($pescaInstrumento->getIdinstrumento());
		$this->setParam($pescaInstrumento->getQtd());
		$this->setParam($pescaInstrumento->getDetalhes());
		$this->setParam($pescaInstrumento->getIdestrategia());
		return $this->queryIdStmt();
	}
	public function insertPescaTipoComprador(PescaTipoComprador $pescaTipoComprador)
	{
		$this->sql = 'INSERT INTO pesca_tipocomprador (idpesca,idtipocomprador) VALUES (?,?)';
		$this->prepare();
		$this->setParam($pescaTipoComprador->getIdpesca());
		$this->setParam($pescaTipoComprador->getIdtipocomprador());
		return $this->queryIdStmt();
	}
	
	public function insertPescaEspecie(PescaEspecie $pescaEspecie)
	{
		$this->sql = 'INSERT INTO pesca_especie (idpesca,idespecie,arte,tipomedicao,fator,qtdvendida,preco,qtdconsumida) VALUES (?,?,?,?,?,?,?,?)';
		$this->prepare();
		$this->setParam($pescaEspecie->getIdpesca());
		$this->setParam($pescaEspecie->getIdespecie());
		$this->setParam($pescaEspecie->getArte());
		$this->setParam($pescaEspecie->getTipoMedicao());
        $this->setParam($pescaEspecie->getFator());
        $this->setParam($pescaEspecie->getQtdvendida());
		$this->setParam($pescaEspecie->getPreco());
        $this->setParam($pescaEspecie->getQtdconsumida());
		return $this->queryIdStmt();
	}
	public function findByIdComunidade($idComunidade)
	{
	    $this->sql = 'SELECT p.* FROM pesca p JOIN pescador pe on pe.id=p.idpescador WHERE pe.idcomunidade = ?';
	    $this->prepare();
	    $this->setParam($idComunidade);
	    return $this->fetchAllStmtObj('Pesca');
	}
	public function findByIdPescaInstrumento($idPesca)
	{
		$this->sql = 'SELECT * FROM pesca_instrumento WHERE idpesca = ?';
		$this->prepare();
		$this->setParam($idPesca);
		return $this->fetchAllStmtObj('PescaInstrumento');
	}
	public function findByIdPescaEmbarcacao($idPesca)
	{
		$this->sql = 'SELECT * FROM pesca_embarcacao WHERE idpesca = ?';
		$this->prepare();
		$this->setParam($idPesca);
		return $this->fetchAllStmtObj('PescaEmbarcacao');
	}
	public function findByIdPescaComprador($idPesca)
	{
		$this->sql = 'SELECT * FROM pesca_tipocomprador WHERE idpesca = ?';
		$this->prepare();
		$this->setParam($idPesca);
		return $this->fetchAllStmtObj('PescaTipoComprador');
	}
	public function findByIdPescaEspecie($idPesca)
	{
		$this->sql = 'SELECT * FROM pesca_especie WHERE idpesca = ?';
		$this->prepare();
		$this->setParam($idPesca);
		return $this->fetchAllStmtObj('PescaEspecie');
	}
	public function findQtdPescaMes()
	{
	    $this->sql = 'SELECT extract(month from dia_inicio) mespesca, sum(pesoconsumido+pesovendido) as qtd FROM pesca WHERE extract(year from dia_inicio) = ? GROUP BY 1 ORDER BY 1 ASC';
	    $this->prepare();
	    $this->setParam(date('Y'));
	    return $this->fetchAllStmtObj('Pesca');
	}
    public function findQtdPescaMesByAno($ano)
    {
        $this->sql = 'SELECT extract(month from dia_inicio) mespesca, sum(pesoconsumido+pesovendido) as qtd FROM pesca 
            WHERE extract(year from dia_inicio) = ? AND ativo = true GROUP BY 1 ORDER BY 1 ASC';
        $this->prepare();
        $this->setParam($ano);
        return $this->fetchAllStmtObj('Pesca');
    }
    public function findQtdPescaComunidade() {
        $this->sql = 'SELECT trim(c.descricao::varchar) as comunidade, sum(p.pesoconsumido + p.pesovendido) as qtd FROM pesca p LEFT JOIN comunidade c ON c.id=p.idcomunidade WHERE extract(year from p.dia_inicio) = ? GROUP BY trim(c.descricao) ORDER BY qtd DESC';
        $this->prepare();
        $this->setParam(date('Y'));
        return $this->fetchAllStmtObj('Pesca');
    }
    public function findQtdPescaComunidadeByAno($ano) {
        $this->sql = 'SELECT trim(c.descricao::varchar) as comunidade, sum(p.pesoconsumido + p.pesovendido) as qtd FROM pesca p LEFT JOIN comunidade c ON c.id=p.idcomunidade 
            WHERE extract(year from p.dia_inicio) = ? AND p.ativo = true GROUP BY trim(c.descricao) ORDER BY qtd DESC';
        $this->prepare();
        $this->setParam($ano);
        return $this->fetchAllStmtObj('Pesca');
    }
    public function findQtdPeixesPescados() {
        return $this->findQtdPeixesPescadosByAno(date('Y'));
    }
    public function findQtdPeixesPescadosByAno($ano) {
        $this->sql = 'SELECT esp.nomepopular, sum(p.pesoconsumido + p.pesovendido) as peso FROM pesca_especie pe 
                        LEFT JOIN peixe as esp ON esp.id = pe.idespecie 
                        LEFT JOIN pesca p ON p.id = pe.idpesca 
                        WHERE (p.pesoconsumido + p.pesovendido) > 0 AND extract(year from p.dia_inicio) = ? AND p.ativo = true GROUP BY esp.nomepopular ORDER BY peso DESC';
        $this->prepare();
        $this->setParam($ano);
        return $this->fetchAllStmtObj('Pesca');
    }
    public function selectAllCpue()
    {
        $this->sql = "SELECT id,(pesoconsumido + pesovendido) / (numpescadores * ((dia_fim - dia_inicio) + 1)) as cpue from pesca 
            WHERE ativo = true ORDER BY id DESC";
        $this->prepare();
        return $this->fetchAllStmtObj('Pesca');
    }
    public function findQuantPesca($data_inicial, $data_final, $rio) {
        $this->sql = "SELECT p.nome_rio as descricao, sum(p.pesoconsumido + p.pesovendido) as quant FROM pesca p WHERE 1=1";
        if(!empty($data_inicial)) $this->sql.=" AND (anopesca::varchar||'-'||mespesca::varchar||'-'||diapesca::varchar)::date >= ?"; 
        if(!empty($data_final)) $this->sql.=" AND (anopesca::varchar||'-'||mespesca::varchar||'-'||diapesca::varchar)::date <= ?";
        if(!empty($rio)) $this->sql.=" AND p.nome_rio ilike ?";
        $this->sql.=' AND p.ativo = true GROUP BY p.nome_rio';
        $this->prepare();

        if(!empty($data_inicial)) $this->setParam($data_inicial);
        if(!empty($data_final)) $this->setParam($data_final);
        if(!empty($rio)) $this->setParam("%$rio%");
        
        return $this->fetchAllStmtObj('Pesca');
    }
    
    public function findCpueAno()
    {
        // A variável anopesca só é mapeada pelo gráfico se inserido alias
        $this->sql = "SELECT (sum((pesoconsumido + pesovendido) / (numpescadores * ((dia_fim - dia_inicio) + 1)))) / count(id) as cpue, extract(year from dia_inicio) as ano 
            FROM pesca WHERE ativo = true GROUP BY 2 ORDER BY 2 ASC";
        $this->prepare();
        return $this->fetchAllStmtObj('Pesca');
    }
    public function findQtdPeixesOvados()
    {
        $this->sql = "SELECT esp.nomepopular, sum(pe.qtdovados) as ovados FROM pesca_especie pe LEFT JOIN peixe as esp ON esp.id = pe.idespecie LEFT JOIN pesca p ON p.id = pe.idpesca WHERE pe.qtdovados > 0 AND extract(year from p.dia_inicio) = ? GROUP BY esp.nomepopular ORDER BY ovados DESC";
        $this->prepare();
        $this->setParam(date('Y'));
        return $this->fetchAllStmtObj('Pesca');
    }
    public function findCpueComunidade()
    {
        $this->sql = "SELECT trim(c.descricao::varchar) as comunidade, sum((pesoconsumido + pesovendido) / (numpescadores * ((dia_fim - dia_inicio) + 1))) / count(p.id) as cpue 
            FROM pesca p LEFT JOIN comunidade c ON c.id=p.idcomunidade 
            WHERE extract(year from dia_inicio) = ? AND p.ativo = true GROUP BY trim(c.descricao)
            ORDER BY cpue DESC";
        $this->prepare();
        $this->setParam(date('Y'));
        return $this->fetchAllStmtObj('Pesca');
    }
    public function findCpueComunidadeByAno($ano)
    {
        $this->sql = "SELECT trim(c.descricao::varchar) as comunidade, sum((pesoconsumido + pesovendido) / (numpescadores * ((dia_fim - dia_inicio) + 1))) / count(p.id) as cpue 
            FROM pesca p LEFT JOIN comunidade c ON c.id=p.idcomunidade 
            WHERE extract(year from dia_inicio) = ? AND p.ativo = true GROUP BY trim(c.descricao)
            ORDER BY cpue DESC";
        $this->prepare();
        $this->setParam($ano);
        return $this->fetchAllStmtObj('Pesca');
    }
    public function updatePesca(Pesca $pesca)
    {
        $this->sql = 'UPDATE pesca
            SET nome_pescador=?, idcomunidade=?, dia_inicio=?, dia_fim=?, 
            diasemana=?, qtd_dias=?, nome_porto=?, nome_rio=?, idcidade=?, 
            gelo=?, alimento=?, combustivel=?, outros_gastos=?, numpescadores=?, 
            valorcusto=?, pesoconsumido=?, pesovendido=?, valorvenda=?, idusuario=?, datacadastro=current_timestamp 
            WHERE id = ?';
        
        $this->prepare();
        $this->setParam($pesca->getNomePescador());
        $this->setParam($pesca->getIdcomunidade());
        $this->setParam($pesca->getDiaInicio());
        $this->setParam($pesca->getDiaFim());
        $this->setParam($pesca->getDiasemana());
        $this->setParam($pesca->getQtdDias());
        $this->setParam($pesca->getNomePorto());
        $this->setParam($pesca->getNomeRio());
        $this->setParam($pesca->getIdcidade());
        $this->setParam($pesca->getGelo());
        $this->setParam($pesca->getAlimento());
        $this->setParam($pesca->getCombustivel());
        $this->setParam($pesca->getOutrosGastos());
        $this->setParam($pesca->getNumpescadores());
        $this->setParam($pesca->getValorcusto());
        $this->setParam($pesca->getPesoconsumido());
        $this->setParam($pesca->getPesovendido());
        $this->setParam($pesca->getValorvenda());
        $this->setParam($pesca->getIdusuario());
        $this->setParam($pesca->getId());


        return $this->executeStmt();
    }

    public function salvarAcampamento($acampamento){
        $this->sql = 'INSERT INTO acampamento (nome, idpesca) VALUES (?,?)';
        $this->prepare();
        $this->setParam($acampamento->getNome());
        $this->setParam($acampamento->getIdpesca());
        return $this->queryIdStmt();
    }

    public function findAcampamentoByIdPesca($idPesca){
	    $this->sql = 'SELECT * FROM acampamento where idpesca = ?';
	    $this->prepare();
	    $this->setParam($idPesca);
	    return $this->fetchAllStmtObj('Acampamento');
    }

    public function deleteAcampamentoByIdPesca($idPesca){
        $this->sql = 'DELETE FROM acampamento where idpesca = ?';
        $this->prepare();
        $this->setParam($idPesca);
        return $this->executeStmt();
    }

    public function selectAnosDePesca(){
	    $this->sql = 'SELECT extract(year from dia_inicio) AS ano FROM pesca GROUP BY 1 ORDER BY 1 DESC';
	    $this->prepare();
	    return $this->fetchAllStmt();
    }

    public function editAtivo($id,$ativo)
    {
        $ativo = boolval($ativo) ? 'true' : 'false';
        $this->sql = "UPDATE pesca SET ativo = ? WHERE id = ?";
        $this->prepare();

        $this->setParam($ativo);
        $this->setParam($id);

        return $this->executeStmt();
    }
}
?>