<?php
include_once '../../library/Import.php';
Import::bean('Perfil');
Import::library('Session');
include_once '../../library/LibSession.php';
include_once 'Controller.php';
include_once 'ControllerAcampamento.php';
include_once 'ControllerAmbiente.php';
include_once 'ControllerComunidade.php';
include_once 'ControllerEmbarcacao.php';
include_once 'ControllerEspecie.php';
include_once 'ControllerEstrategia.php';
include_once 'ControllerInstrumento.php';
include_once 'ControllerTipoComprador.php';
include_once '../../model/bean/Acampamento.php';
include_once '../../model/bean/Comunidade.php';
include_once '../../model/bean/Pesca.php';
class ControllerPesca extends Controller
{
	public function getAction()
	{
		if ($this->action == null)
		{
			include_once '../../model/action/ActionPesca.php';
			$this->action = new ActionPesca();
		}
		return $this->action;
	}
	public function atualizar()
	{
		if (isset($_POST['AtualizarPesca']))
		{
			extract($_POST);
			if ($up3) return array('card-panel center z-depth-3 white-text green darken-2 noselect','Pesca atualizada com Sucesso!');
			else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha durante a atualização da Pesca.');
		}
	}

	//excluir pesca
    public function excluir()
    {
        if (isset($_POST['excluir']))
        {
            extract($_POST);
            if ($upp4) return array('card-panel center z-depth-3 white-text #ff3d00 deep-orange accent-3 noselect','Formulário da Pesca excluído com Sucesso!');
            else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha durante a exclusão do Formulário de Pesca.');
        }
    }

    public function ListAllRio() {
	    return $this->getAction()->getAllRio();
    }

    public function ListAllPorto() {
        return $this->getAction()->getAllPorto();
    }

    public function ListAllPescador() {
        return $this->getAction()->getAllPescador();
    }

	public function cadastrar()
	{
        if (isset($_POST['CadastrarPesca']))
        {
//            echo var_dump($_POST); die();
            try {
                extract($_POST);

                //validacoes
                $this->validarInt("Quantidade de dias", $qtdDias);
                $this->validarInt("Quantidade de pescadores", $qtdPescadores);
                $this->validarTime("Dia início", $diaInicio);
                $this->validarTime("Dia final", $diaFim);
                $this->validarNumerico("Gelo (R$)", $valorGelo);
                $this->validarNumerico("Rancho (R$)", $valorRancho);
                $this->validarNumerico("Combustível (R$)", $valorCombustivel);
                $this->validarNumerico("Outros (R$)", $valorOutro);
                $this->validarNumerico("Valor Gasto/Custo (RS)", $valorGasto);
                $this->validarNumerico("Kg Consumido", $kgConsumido);
                $this->validarNumerico("Kg Vendido", $kgVendido);
                $this->validarNumerico("Total Vendido (Kg)", $valorVendido);

                if(isset($nomePescador)){
                    if(empty($nomePescador))
                        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Pelo menos um acampamento precisa ser preenchido!');
                }
                if (isset($idsEmbarcacoes)) {
                    foreach ($idsEmbarcacoes as $idEmb) {
                        $tamanho = ${'tamEmbarcacao_' . $idEmb};
                        if (!empty($tamanho)) {
                            if (!is_numeric(str_replace(',', '.', $tamanho))) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Tamanho (Embarcação): ' . $tamanho . '"!');
                            }
                        }

                        $motorpotencia = ${'potEmbarcacao_' . $idEmb};
                        if (!empty($motorpotencia)) {
                            if (!is_numeric(str_replace(',', '.', $motorpotencia))) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Potência (Embarcação): ' . $motorpotencia . '"!');
                            }
                        }
                    }
                }
                if (isset($peixes)) {
                    foreach ($peixes as $peixe) {
                        $tipoMedicao = ${'tipoMedicao' . $peixe};
                        if (!empty($tipoMedicao)) {
                            if (!is_int((int)$tipoMedicao)) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Tipo de Medição: ' . $tipoMedicao . '"!');
                            }
                        }
                        $fator = ${'fator' . $peixe};
                        if (!empty($fator)) {
                            $auxFator = strpos($fator, ',') != false ? str_replace(',', '.', $fator) : $fator;
                            if (!is_numeric($auxFator)) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Fator de conversão (kg/cambo): ' . $fator . '"!');
                            }
                        }
                        $qtdVendida = ${'pesoVendido' . $peixe};
                        if (!empty($qtdVendida)) {
                            $auxQtdvendida = strpos($qtdVendida, ',') != false ? str_replace(',', '.', $qtdVendida) : $qtdVendida;
                            if (!is_numeric($auxQtdvendida)) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Peso (Kg): ' . $qtdVendida . '"!');
                            }
                        }
                        $preco = ${'preco' . $peixe};
                        if (!empty($preco)) {
                            if (!is_numeric(str_replace(',', '.', $preco))) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Preço de Venda: ' . $preco . '"!');
                            }
                        }
                        $qtdConsumida = ${'pesoConsumido' . $peixe};
                        if (!empty($qtdConsumida)) {
                            $auxQtdconsumida = strpos($qtdConsumida, ',') != false ? str_replace(',', '.', $qtdConsumida) : $qtdConsumida;
                            if (!is_numeric($auxQtdconsumida)) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Peso (Kg): ' . $qtdConsumida . '"!');
                            }
                        }
                    }
                }

                //persistencia pesca
                $controllerPesca = new ControllerPesca();
                $pesca = new Pesca();
                $pesca->setNomePescador($nomePescador);
                $pesca->setIdcomunidade($idComunidade);
                $pesca->setDiaInicio($diaInicio);
                $pesca->setDiaFim($diaFim);
                $pesca->setDiasemana(implode(",",$diaSemana));
                $pesca->setQtdDias($qtdDias);
                $pesca->setNomePorto($nomePorto);
                $pesca->setNomeRio($nomeRio);
                $pesca->setIdcidade($cidade);
                $pesca->setGelo(str_replace(',', '.', $valorGelo));
                $pesca->setAlimento(str_replace(',', '.', $valorRancho));
                $pesca->setCombustivel(str_replace(',', '.', $valorCombustivel));
                $pesca->setOutrosGastos(str_replace(',', '.', $valorOutro));
                $pesca->setNumpescadores($qtdPescadores);
                $pesca->setValorcusto(str_replace(',', '.', $valorGasto));
                $pesca->setPesoconsumido(str_replace(',', '.', $kgConsumido));
                $pesca->setPesovendido(str_replace(',', '.', $kgVendido));
                $pesca->setValorvenda(str_replace(',', '.', $valorVendido));
                $pesca->setIdusuario($_SESSION["idUsuario"]);
                $idPesca = $controllerPesca->getAction()->cadastrar($pesca);

                //persistencia instrumento (arte da pesca)
                $controllerInstrumento = new ControllerInstrumento();
                if (isset($instrumentos)) {
                    foreach ($instrumentos as $idInstrumento) {
                        $instrumento = $controllerInstrumento->getAction()->getByIdInstrumento($idInstrumento);
                        $qtd = isset(${'qtd' . $idInstrumento}) && ${'qtd' . $idInstrumento} != "" ? ${'qtd' . $idInstrumento} : null;
                        $detalhes = null;
                        $detalhes = implode(",",${'tipoMalha'.$idInstrumento});
                        if ($detalhes == '' || $detalhes == ',') $detalhes = null;
                        $estrategia = isset(${'estrategia' . $idInstrumento}) ? ${'estrategia' . $idInstrumento} : null;
                        $controllerPesca->getAction()->cadastrarPescaInstrumento($idPesca, $idInstrumento, $qtd, $detalhes, $estrategia);
                    }
                }

                //persistencia embarcacao
                $controllerEmbarcacao = new ControllerEmbarcacao();
                if (isset($idsEmbarcacoes)) {
                    foreach ($idsEmbarcacoes as $idEmb) {
                        $idEmbarcacao = ${'tipoEmbarcacao_' . $idEmb} != '' ? ${'tipoEmbarcacao_' . $idEmb} : null;
                        $tamanho = ${'tamEmbarcacao_' . $idEmb} != '' ? ${'tamEmbarcacao_' . $idEmb} : null;
                        $motorpotencia = ${'potEmbarcacao_' . $idEmb} != '' ? ${'potEmbarcacao_' . $idEmb} : null;
                        $controllerPesca->getAction()->cadastrarPescaEmbarcacao($idPesca, $idEmbarcacao, $tamanho, $motorpotencia);
                    }
                }


                //persistencia comprador
                if (isset($tipoComprador)) {
                    if (sizeof($tipoComprador) > 0) {
                        foreach ($tipoComprador as $idTipoComprador) {
                            $controllerPesca->getAction()->cadastrarPescaTipoComprador($idPesca, $idTipoComprador);
                        }
                    }
                }

                //persistencia especie
                if (isset($peixes)) {
                    foreach ($peixes as $auxAddPeixe) {
                        $idEspecie = ${'addPeixeIdEspecie'.$auxAddPeixe};
                        $arte = ${'artepeixes'.$auxAddPeixe};
                        if ($qtd=='') $qtd=null;
                        $tipoMedicao = ${'tipoMedicao'.$auxAddPeixe};
                        if ($tipoMedicao=='') $tipoMedicao=null;
                        $fator = str_replace(',', '.', str_replace(".","",${'fator'.$auxAddPeixe}));
                        if ($fator == '') $fator = null;
                        $qtdVendida = str_replace(',', '.', str_replace(".","",${'pesoVendido'.$auxAddPeixe}));
                        if ($qtdVendida == '') $qtdVendida = null;
                        $preco = str_replace(',', '.', str_replace(".","",${'preco'.$auxAddPeixe}));
                        if ($preco == '') $preco = null;
                        $qtdConsumida = str_replace(',', '.', str_replace(".","",${'pesoConsumido'.$auxAddPeixe}));
                        if ($qtdConsumida == '') $qtdConsumida = null;
                        $controllerPesca->getAction()->cadastrarPescaEspecie($idPesca,$idEspecie,$arte,$tipoMedicao,$fator,$qtdVendida,$preco,$qtdConsumida);
                    }
                }

                //persistencia acampamento
                $controllerAcampamento = new ControllerAcampamento();
                if (isset($idsAcampamentos) && $idsAcampamentos!=null && is_array($idsAcampamentos)) {
                    $idsAcampamentos = array_unique($idsAcampamentos);
                    foreach ($idsAcampamentos as $acamp) {
                        $nomeAcampamento = ${'nomeAcampamento_' . $acamp} != '' ? ${'nomeAcampamento_' . $acamp} : null;
                        $nomePesqueiro = ${'nomePesqueiro_' . $acamp} != '' ? ${'nomePesqueiro_' . $acamp} : null;

                        if ($nomePesqueiro != null) {
                            $idAcampamento = $controllerAcampamento->getAction()->cadastrar($nomeAcampamento, $nomePesqueiro, $idPesca);
                            if (isset(${'ambiente_' . $acamp}) && ${'ambiente_' . $acamp} != null && sizeof(${'ambiente_' . $acamp})) {
                                foreach (${'ambiente_' . $acamp} as $idAmbiente) {
                                    $controllerAcampamento->getAction()->cadastrarAcampamentoAmbiente($idAcampamento, $idAmbiente);
                                }
                            }
                        }
                    }
                }

                return array('card-panel center z-depth-3 white-text green darken-2 noselect', 'Pesca atualizada com Sucesso! ID da pesca: ' . $idPesca);
            }
			catch (Exception $e) 
			{
				//$this->LibScript()->scriptLocationAlert('cadastrarPesca','Falha no Cadastro da Pesca.');
			    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no Cadastro da Pesca.');
			}
		}
		if (isset($_GET['acao']))
		{
			if ($_GET['acao']=='excluir') {
				$result = $this->getAction()->excluir($_GET['id']);
				if ($result) return array('card-panel center z-depth-3 white-text green darken-2 noselect','Pesca Excluída com Sucesso!');
				else return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha na Exclusão da Pesca.');
			}
		}
	}

	public function consultar()
	{
		if (isset($_POST['ConsultarPesca'])) {
			extract($_POST);
			$buscaPescador = $buscaComunidade = $buscaPorto = $buscaRio = $buscaAcampamento = $buscaPesqueiro = $buscaQtdPescadores = $buscaIdAmbiente = null;
            $buscaInstrumento = $buscaEmbarcacao = $buscaDataInicial = $buscaDataFinal = $buscaIdInstituicao = $buscaAtivo = null;
			
			if (isset($byPescador) && ($byPescador == "on")) $buscaPescador = $pescador;
			if (isset($byComunidade) && ($byComunidade== "on")) $buscaComunidade = $comunidade;
			if (isset($byPorto) && ($byPorto== "on")) $buscaPorto= $porto;
			if (isset($byRio) && ($byRio== "on")) $buscaRio = $rio;
            if (isset($byAcampamento) && ($byAcampamento== "on")) $buscaAcampamento= $acampamento;
            if (isset($byPesqueiro) && ($byPesqueiro== "on")) $buscaPesqueiro = $pesqueiro;
			if (isset($byQuantPescadores) && ($byQuantPescadores== "on")) $buscaQtdPescadores = $quant_pescadores;
			if (isset($byIdAmbiente) && ($byIdAmbiente == "on")) $buscaIdAmbiente = $idAmbiente;
			if (isset($byInstrumento) && ($byInstrumento== "on")) $buscaInstrumento = $instrumento;
			if (isset($byEmbarcacao) && ($byEmbarcacao== "on")) $buscaEmbarcacao = $embarcacao;
			if (isset($byDataInicial) && ($byDataInicial== "on")) $buscaDataInicial = $data_inicial;
			if (isset($byDataFinal) && ($byDataFinal== "on")) $buscaDataFinal = $data_final;
			if (isset($byInstituicao) && ($byInstituicao== "on")) $buscaIdInstituicao = $idInstituicao;
			if (isset($byAtivo) && ($byAtivo == "on")){
                $buscaAtivo = $pescaAtiva;
                if($buscaAtivo == 't')
                    $buscaAtivo = null;
            }
            $session = new LibSession();
            Session::start();
            $chave = $session->getSession('72033f2bbd0a0891df6f24ee5eebfa6e');
            if (!in_array($this->LibSession()->getSession('idperfil'), array(Perfil::ADMINISTRADOR)))
                $buscaAtivo = 'true';

			return $this->getAction()->buscaGeral($buscaPescador,$buscaComunidade,$buscaPorto,$buscaRio,$buscaAcampamento,$buscaPesqueiro,$buscaQtdPescadores,$buscaIdAmbiente,$buscaInstrumento,$buscaEmbarcacao,$buscaDataInicial,$buscaDataFinal,$buscaIdInstituicao,$buscaAtivo);
		}
	}

    private function validarInt($campoStr, $campo)
    {
        if (!empty($campo)) {
            if (!is_int((int)$campo)) {
                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "' . $campoStr . ' :' . $campo . '"!');
            }
        }
    }

    private function validarTime($campoStr, $campo)
    {
        if (!empty($campo)) {
            if (preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $campo)) {
                $ano = (int)substr($campo, 0, 4);
                $mes = (int)substr($campo, 5, 2);
                $dia = (int)substr($campo, 8, 2);
                if (($dia < 1 || $dia > 31) || ($mes < 1 || $mes > 12 || $ano < 1900)) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "' . $campoStr . ' :' . $campo . '"!');
                }
            }
            else return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "' . $campoStr . ' :' . $campo . '"!');
        }
    }

    private function validarNumerico($campoStr, $campo)
    {
        if (!empty($campo)) {
            if (!is_numeric(str_replace(',', '.', $campo))) {
                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "' . $campoStr . ' :' . $campo . '"!');
            }
        }
    }
}
?>