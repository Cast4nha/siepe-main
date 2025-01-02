<?php
include_once 'Controller.php';
include_once 'ControllerPesca.php';
include_once 'ControllerInstrumento.php';
include_once 'ControllerEmbarcacao.php';
include_once 'ControllerEspecie.php';
include_once '../../model/bean/Pesca.php';
include_once '../../model/bean/Instrumento.php';


class ControllerDetalhes extends Controller
{

    public function desativarPesca($idPesca_submit)
    {
        $controllerPesca = new ControllerPesca();
        $controllerPesca->getAction()->desAtivarPesca($idPesca_submit,true);
    }

    public function ativarPesca($idPesca_submit)
    {
        $controllerPesca = new ControllerPesca();
        $controllerPesca->getAction()->desAtivarPesca($idPesca_submit,false);
    }

    public function excluirDetalhes($idPesca_submit)
    {

        try {

            //objeto
            $controllerDetalhes2 = new ControllerPesca();

            //2-embarcacao
            $controllerDetalhes2->getAction()->excluirEmbarcacao($idPesca_submit);
            //3-especie
            $controllerDetalhes2->getAction()->excluirEspecie($idPesca_submit);
            //4-instrumento
            $controllerDetalhes2->getAction()->excluirPescaInstrumento($idPesca_submit);
            //5-instrumento estrategia
            $controllerDetalhes2->getAction()->excluirPescaInstrumentoEstrategia($idPesca_submit);
            //6-pescador comprador
            $controllerDetalhes2->getAction()->excluirPescaComprador($idPesca_submit);

            //1-pesca
            $controllerDetalhes2->getAction()->excluir($idPesca_submit);
            //return true;
            //return array('card-panel center z-depth-3 white-text #ff3d00 deep-orange accent-3 noselect', 'Formulário Pesca excluído com Sucesso! ID da pesca: ' . $idPesca_submit);

        } catch (Exception $e2) {
            //return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Falha na exclusão detalhes de Pesca.');
            //return false;
        }


    }

    public function updateDetalhes()
    {
        if (isset($_POST['update-detalhes'])) {
            try {
                extract($_POST);

                //validacoes
                $this->validarInt("ID da Pesca", $idPesca);
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
                        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Pescado precisa ser preenchido!');
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
                    foreach ($peixes as $auxAddPeixe) {
                        $tipoMedicao = ${'tipoMedicao' . $auxAddPeixe};
                        if (!empty($tipoMedicao)) {
                            if (!is_int((int)$tipoMedicao)) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Tipo de Medição: ' . $tipoMedicao . '"!');
                            }
                        }
                        $fator = ${'fator' . $auxAddPeixe};
                        if (!empty($fator)) {
                            $auxFator = strpos($fator, ',') != false ? str_replace(',', '.', $fator) : $fator;
                            if (!is_numeric($auxFator)) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Fator de conversão (kg/cambo): ' . $fator . '"!');
                            }
                        }
                        $qtdVendida = ${'qtdvendida' . $auxAddPeixe};
                        if (!empty($qtdVendida)) {
                            $auxQtdvendida = strpos($qtdVendida, ',') != false ? str_replace(',', '.', $qtdVendida) : $qtdVendida;
                            if (!is_numeric($auxQtdvendida)) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Peso (Kg): ' . $qtdVendida . '"!');
                            }
                        }
                        $preco = ${'preco' . $auxAddPeixe};
                        if (!empty($preco)) {
                            if (!is_numeric(str_replace(',', '.', $preco))) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Preço de Venda: ' . $preco . '"!');
                            }
                        }
                        $qtdConsumida = ${'qtdconsumida' . $auxAddPeixe};
                        if (!empty($qtdConsumida)) {
                            $auxQtdconsumida = strpos($qtdConsumida, ',') != false ? str_replace(',', '.', $qtdConsumida) : $qtdConsumida;
                            if (!is_numeric($auxQtdconsumida)) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Entrada invalida no campo "Peso (Kg): ' . $qtdConsumida . '"!');
                            }
                        }
                    }
                }


                //persistencia instrumento (arte da pesca)
                $controllerPesca = new ControllerPesca();
                $controllerPesca->getAction()->excluirPescaInstrumento($idPesca);
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
                $controllerEmbarcacao->getAction()->excluirPescaEmbarcacao($idPesca);

                if (isset($idsEmbarcacoes)) {
                    foreach ($idsEmbarcacoes as $idEmb) {
                        $idEmbarcacao = ${'tipoEmbarcacao_' . $idEmb} != '' ? ${'tipoEmbarcacao_' . $idEmb} : null;
                        $tamanho = ${'tamEmbarcacao_' . $idEmb} != '' ? ${'tamEmbarcacao_' . $idEmb} : null;
                        $motorpotencia = ${'potEmbarcacao_' . $idEmb} != '' ? ${'potEmbarcacao_' . $idEmb} : null;
                        $controllerPesca->getAction()->cadastrarPescaEmbarcacao($idPesca, $idEmbarcacao, $tamanho, $motorpotencia);
                    }
                }


                //persistencia comprador
                $controllerPesca->getAction()->excluirPescaComprador($idPesca);
                if (isset($tipoComprador)) {
                    if (sizeof($tipoComprador) > 0) {
                        foreach ($tipoComprador as $idTipoComprador) {
                            $controllerPesca->getAction()->cadastrarPescaTipoComprador($idPesca, $idTipoComprador);
                        }
                    }
                }

                //persistencia especie
                $controllerEspecie = new ControllerEspecie();
                $controllerEspecie->getAction()->excluirPescaEspecie($idPesca);
                if (isset($peixes)) {
                    foreach ($peixes as $auxAddPeixe) {
                        $idEspecie = ${'addPeixeIdEspecie'.$auxAddPeixe};
                        $arte = ${'artepeixes'.$auxAddPeixe};
                        if ($qtd=='') $qtd=null;
                        $tipoMedicao = ${'tipoMedicao'.$auxAddPeixe};
                        if ($tipoMedicao=='') $tipoMedicao=null;
                        $fator = str_replace(',', '.', str_replace(".","",${'fator'.$auxAddPeixe}));
                        if ($fator == '') $fator = null;
                        $qtdVendida = str_replace(',', '.', str_replace(".","",${'qtdvendida'.$auxAddPeixe}));
                        if ($qtdVendida == '') $qtdVendida = null;
                        $preco = str_replace(',', '.', str_replace(".","",${'preco'.$auxAddPeixe}));
                        if ($preco == '') $preco = null;
                        $qtdConsumida = str_replace(',', '.', str_replace(".","",${'qtdconsumida'.$auxAddPeixe}));
                        if ($qtdConsumida == '') $qtdConsumida = null;
                        $controllerPesca->getAction()->cadastrarPescaEspecie($idPesca,$idEspecie,$arte,$tipoMedicao,$fator,$qtdVendida,$preco,$qtdConsumida);
                    }
                }

                //persistencia acampamento
                $controllerPesca->getAction()->deleteAcampamentoByPesca($idPesca);
                $controllerAcampamento = new ControllerAcampamento();
                if (isset($idsAcampamentos) && $idsAcampamentos!=null && is_array($idsAcampamentos)) {
                    $idsAcampamentos = array_unique($idsAcampamentos);
                    foreach ($idsAcampamentos as $acamp){
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

                //persistencia pesca
                $pesca = new Pesca();
                $pesca->setId($idPesca);
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
                $controllerPesca->getAction()->atualizarPesca($pesca);
                return array('card-panel center z-depth-3 white-text green darken-2 noselect', 'Pesca atualizada com Sucesso! ID da pesca: ' . $idPesca);
            } catch (Exception $e) {
                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Falha na atualizaçao dos detalhes de Pesca.');
            }
        }
    }

    /**
     *
     */
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