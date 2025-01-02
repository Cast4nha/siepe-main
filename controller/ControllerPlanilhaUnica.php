<?php
include_once 'ControllerComunidade.php';
include_once 'ControllerAmbiente.php';
include_once 'ControllerTipoComprador.php';
include_once 'ControllerInstrumento.php';
include_once 'ControllerAcampamento.php';
include_once 'ControllerEmbarcacao.php';
include_once 'ControllerEspecie.php';
include_once 'ControllerPesca.php';
include_once 'ControllerEstrategia.php';
include_once 'ControllerEstado.php';
include_once 'ControllerCidade.php';

require '../../library/phpspreadsheet/spreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Sabberworm\CSS\Value\Value;


class ControllerPlanilhaUnica extends Controller
{
    
    public function getModelo()
    {
        return "extra/modelo_planilha_unica.xlsx";
    }
    
	public function exportar()
	{
	    $controllerComunidade= new ControllerComunidade();
	    $controllerAmbiente= new ControllerAmbiente();
	    $controllerTipoComprador= new ControllerTipoComprador();
	    $controllerInstrumento= new ControllerInstrumento();
	    $controllerEmbarcacao = new ControllerEmbarcacao();
	    $controllerEspecie = new ControllerEspecie();
	    $controllerPesca = new ControllerPesca();
	    $controllerEstrategia = new ControllerEstrategia();
	    $controllerAcampamento = new ControllerAcampamento();
	    $controllerCidade = new ControllerCidade();
	    $controllerEstado = new ControllerEstado();
	    $pescas = $controllerPesca->consultar();

	    $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id') //pesca
            ->setCellValue('B1', 'nomePescador')
            ->setCellValue('C1', 'nomeComunidade')
            ->setCellValue('D1', 'diaInicio')
            ->setCellValue('E1', 'diaFim')
            ->setCellValue('F1', 'diaSemana')
            ->setCellValue('G1', 'qtdDias')
            ->setCellValue('H1', 'nomePorto')
            ->setCellValue('I1', 'nomeRio')
            ->setCellValue('J1', 'siglaEstado')
            ->setCellValue('K1', 'nomeCidade')
            ->setCellValue('L1', 'gelo')
            ->setCellValue('M1', 'alimento')
            ->setCellValue('N1', 'combustivel')
            ->setCellValue('O1', 'outrosGastos')
            ->setCellValue('P1', 'numeroPescadores')
            ->setCellValue('Q1', 'valorCusto')
            ->setCellValue('R1', 'pesoConsumido')
            ->setCellValue('S1', 'pesoVendido')
            ->setCellValue('T1', 'valorVenda')

            ->setCellValue('U1', 'embarcacaoDescricao') // embarcacao
            ->setCellValue('V1', 'embarcacaoTamanho')
            ->setCellValue('W1', 'embarcacaoPotenciaMotor')

            ->setCellValue('X1', 'nomeAcampamento') // acampamento
            ->setCellValue('Y1', 'nomePesqueiro')
            ->setCellValue('Z1', 'ambiente')

            ->setCellValue('AA1', 'instrumentoDescricao') // arte
            ->setCellValue('AB1', 'instrumentoEstrategia')
            ->setCellValue('AC1', 'instrumentoQtd')
            ->setCellValue('AD1', 'instrumentoDetalhes')


            ->setCellValue('AE1', 'especieNomePopular') // especie
            ->setCellValue('AF1', 'especieOrdem')
            ->setCellValue('AG1', 'especieFamilia')
            ->setCellValue('AH1', 'especieGenero')
            ->setCellValue('AI1', 'especieEspecie')
            ->setCellValue('AJ1', 'especieArte')
            ->setCellValue('AK1', 'especieMedicao')
            ->setCellValue('AL1', 'especieFator')
            ->setCellValue('AM1', 'especieQtdVendida')
            ->setCellValue('AN1', 'especiePreco')
            ->setCellValue('AO1', 'especieQtdConsumida')

            ->setCellValue('AP1', 'comprador'); // comprador
	    $spreadsheet->getActiveSheet()->setTitle('registro');

	    $accPesca = 1;
	    
	    foreach ($pescas as $pesca) {
	        $comunidade = $controllerComunidade->getAction()->getById($pesca->getIdcomunidade());
	        $embarcacoes = $controllerPesca->getAction()->getByIdPescaEmbarcacao($pesca->getId());
            $acampamentos = $controllerPesca->getAction()->findAcapamentoByPesca($pesca->getId());
            $artes = $controllerPesca->getAction()->getByIdPescaInstrumento($pesca->getId());
            $especies = $controllerPesca->getAction()->getByIdPescaEspecie($pesca->getId());
            $compradores = $controllerPesca->getAction()->getByIdPescaComprador($pesca->getId());
            $cidade = $controllerCidade->getAction()->getById($pesca->getIdcidade());
            if (isset($cidade) && $cidade!=false) {
                $estado = $controllerEstado->getAction()->getById($cidade->getIdestado());
                $estado = $estado->getSigla();
                $cidade = $cidade->getDescricao();
            }
            else {
                $cidade = null;
                $estado = null;
            }

	        //embarcacao
	        $embarcacaoDescricao = array();
	        $embarcacaoTamanho = array();
	        $embarcacaoMotor = array();
	        if ($embarcacoes!=null && is_array($embarcacoes) && sizeof($embarcacoes)>0) {
	            foreach ($embarcacoes as $pescaEmbarcacao) {
	                $embarcacao = $controllerEmbarcacao->getAction()->getByIdEmbarcacao($pescaEmbarcacao->getIdembarcacao());
	                $embarcacaoDescricao[] = $embarcacao->getDescricao();
	                $embarcacaoTamanho[] = $pescaEmbarcacao->getTamanho();
	                $embarcacaoMotor[] = $pescaEmbarcacao->getMotorpotencia();
	            }
	        }
            //acampamento
            $nomeAcampamento = array();
            $nomePesqueiro = array();
            $ambientes = array();
            if ($acampamentos!=null && is_array($acampamentos) && sizeof($acampamentos)>0) {
                foreach ($acampamentos as $acampamento) {
                    $acampamentosAmbientes = $controllerAcampamento->getAction()->getAmbienteByIdAcampamento($acampamento->getId());
                    $descricaoAmbientes = array();
                    if ($acampamentosAmbientes!=null && is_array($acampamentosAmbientes) && sizeof($acampamentosAmbientes)>0) {
                        foreach ($acampamentosAmbientes as $acampamentoAmbiente) {
                            $ambiente = $controllerAmbiente->getAction()->findById($acampamentoAmbiente->idambiente);
                            $descricaoAmbientes[] = $ambiente->getDescricao();
                        }
                    }
                    $nomeAcampamento[] = $acampamento->getNome();
                    $nomePesqueiro[] = $acampamento->getNomePesqueiro();
                    $ambientes[] = implode(",",$descricaoAmbientes);
                }
            }
            //arte
            $arteDescricao = array();
            $arteEstrategia = array();
            $arteQtd = array();
            $arteDetalhes = array();
            if ($artes!=null && is_array($artes) && sizeof($artes)>0) {
                foreach ($artes as $pescaArte) {
                    $arte = $controllerInstrumento->getAction()->getByIdInstrumento($pescaArte->getIdinstrumento());
                    if ($pescaArte->getIdestrategia()!=null && intval($pescaArte->getIdestrategia())!=0) {
                        $estrategia = $controllerEstrategia->getAction()->findById($pescaArte->getIdestrategia());
                        $estrategia = $estrategia->getDescricao();
                    }
                    else $estrategia = null;
                    $arteDescricao[] = $arte->getDescricao();
                    $arteEstrategia[] = $estrategia;
                    $arteQtd[] = $pescaArte->getQtd();
                    $arteDetalhes[] = $pescaArte->getDetalhes();
                }
            }

            //especie
            $especieNomePopular = array();
            $especieOrdem = array();
            $especieFamilia = array();
            $especieGenero = array();
            $especieEspecie = array();
            $especieArte = array();
            $especieMedicao = array();
            $especieFator = array();
            $especieQtdVendida = array();
            $especiePreco = array();
            $especieQtdConsumida = array();
            if ($especies!=null && is_array($especies) && sizeof($especies)>0) {
                foreach ($especies as $pescaEspecie) {
                    $especie = $controllerEspecie->getAction()->getById($pescaEspecie->getIdespecie());
                    $especieNomePopular[] = $especie->getNomePopular();
                    $especieOrdem[] = $especie->getOrdem();
                    $especieFamilia[] = $especie->getFamilia();
                    $especieGenero[] = $especie->getGenero();
                    $especieEspecie[] = $especie->getEspecie();
                    $especieArte[] = $pescaEspecie->getArte();
                    $especieMedicao[] = $pescaEspecie->getTipoMedicao();
                    $especieFator[] = $pescaEspecie->getFator();
                    $especieQtdVendida[] = $pescaEspecie->getQtdVendida();
                    $especiePreco[] = $pescaEspecie->getPreco();
                    $especieQtdConsumida[] = $pescaEspecie->getQtdConsumida();
                }
            }

            //comprador
            $comprador = array();
            if ($compradores!=null && is_array($compradores) && sizeof($compradores)>0) {
                foreach ($compradores as $compr) {
                    $tipoComprador = $controllerTipoComprador->getAction()->getById($compr->getIdtipocomprador());
                    $comprador[] = $tipoComprador->getDescricao();
                }
            }

            $accPesca++;
	        $spreadsheet->setActiveSheetIndex(0)
	        ->setCellValue('A'.$accPesca,$pesca->getId())
	        ->setCellValue('B'.$accPesca,$pesca->getNomePescador())
	        ->setCellValue('C'.$accPesca,$comunidade->getDescricao())
	        ->setCellValue('D'.$accPesca,$pesca->getDiaInicio())
	        ->setCellValue('E'.$accPesca,$pesca->getDiaFim())
	        ->setCellValue('F'.$accPesca,$pesca->getDiasemana())
	        ->setCellValue('G'.$accPesca,$pesca->getQtdDias())
	        ->setCellValue('H'.$accPesca,$pesca->getNomePorto())
	        ->setCellValue('I'.$accPesca,$pesca->getNomeRio())
	        ->setCellValue('J'.$accPesca,$estado)
	        ->setCellValue('K'.$accPesca,$cidade)
	        ->setCellValue('L'.$accPesca,$pesca->getGelo())
	        ->setCellValue('M'.$accPesca,$pesca->getAlimento())
	        ->setCellValue('N'.$accPesca,$pesca->getCombustivel())
	        ->setCellValue('O'.$accPesca,$pesca->getOutrosGastos())
	        ->setCellValue('P'.$accPesca,$pesca->getNumPescadores())
	        ->setCellValue('Q'.$accPesca,$pesca->getValorCusto())
            ->setCellValue('R'.$accPesca,$pesca->getPesoConsumido())
            ->setCellValue('S'.$accPesca,$pesca->getPesoVendido())
            ->setCellValue('T'.$accPesca,$pesca->getValorVenda())

	        ->setCellValue('U'.$accPesca, implode("|", $embarcacaoDescricao)) // embarcacao
	        ->setCellValue('V'.$accPesca, implode("|", $embarcacaoTamanho))
	        ->setCellValue('W'.$accPesca, implode("|", $embarcacaoMotor))

            ->setCellValue('X'.$accPesca, implode("|", $nomeAcampamento)) // acampamento
            ->setCellValue('Y'.$accPesca, implode("|", $nomePesqueiro))
            ->setCellValue('Z'.$accPesca, implode("|", $ambientes))
	        
	        ->setCellValue('AA'.$accPesca, implode("|", $arteDescricao)) // arte
	        ->setCellValue('AB'.$accPesca, implode("|", $arteEstrategia))
	        ->setCellValue('AC'.$accPesca, implode("|", $arteQtd))
	        ->setCellValue('AD'.$accPesca, implode("|", $arteDetalhes))

	        ->setCellValue('AE'.$accPesca, implode("|", $especieNomePopular)) // especie
	        ->setCellValue('AF'.$accPesca, implode("|", $especieOrdem))
	        ->setCellValue('AG'.$accPesca, implode("|", $especieFamilia))
	        ->setCellValue('AH'.$accPesca, implode("|", $especieGenero))
	        ->setCellValue('AI'.$accPesca, implode("|", $especieEspecie))
	        ->setCellValue('AJ'.$accPesca, implode("|", $especieArte))
	        ->setCellValue('AK'.$accPesca, implode("|", $especieMedicao))
            ->setCellValue('AL'.$accPesca, implode("|", $especieFator))
            ->setCellValue('AM'.$accPesca, implode("|", $especieQtdVendida))
            ->setCellValue('AN'.$accPesca, implode("|", $especiePreco))
            ->setCellValue('AO'.$accPesca, implode("|", $especieQtdConsumida))

            ->setCellValue('AP'.$accPesca, implode("|", $comprador)); // comprador


	    }
	    $spreadsheet->setActiveSheetIndex(0);
	    $writer = new Xlsx();
	    $writer->setSpreadsheet($spreadsheet);
	    
	    $fxls ='siepe'.date("d_m_Y_H_i_s").'.xlsx';
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="'.$fxls.'"');
	    header('Expires: 0');
	    header('Cache-Control: max-age=0');
	    header('Cache-Control: no-cache');
	    
	    $writer->save('php://output');
	}
	
	public function importar()
	{
	    try {
	      
	        $extensao = explode(".",$_FILES['arquivo']['name']);
	        $tamanho = sizeof($extensao);
	        $extensao = ucwords($extensao[$tamanho-1]);
	        
	        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	        $reader->setReadDataOnly(true);
	        $spreadsheet = $reader->load($_FILES['arquivo']['tmp_name']);

	        
	        // VALIDAR planilha registro
	        $spreadsheet->setActiveSheetIndexByName('registro');
	        $numRowsRegistro = $spreadsheet->getActiveSheet()->getHighestRow();
	        for ($i=2; $i<=$numRowsRegistro; $i++)
	        {
                if (!preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('A'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula A' . $i . ' deve ser um número inteiro.');
                }

                date_default_timezone_set('UTC');
                if (!preg_match('/\d{2}\/\d{2}\/\d{4}/',trim($spreadsheet->getActiveSheet()->getCell('D'.$i,false)))) {
                    $value = trim($spreadsheet->getActiveSheet()->getCell('D'.$i)->getValue());

                    if(!is_numeric($value))
                        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula E'.$i.' deve ser uma data válida');

                    $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);
                    if (!preg_match('/\d{2}\/\d{2}\/\d{4}/',date("d/m/Y", $date))) {
                        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula D'.$i.' deve ser uma data xx/yy/zzzz');
                    }
                }else {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula E'.$i.' deve ser uma data válida');
                }

                if (!preg_match('/\d{2}\/\d{2}\/\d{4}/',trim($spreadsheet->getActiveSheet()->getCell('E'.$i,false)))) {
                    $value = trim($spreadsheet->getActiveSheet()->getCell('E'.$i)->getValue());

                    if(!is_numeric($value))
                        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula E'.$i.' deve ser uma data válida');

                    $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);
                    if (!preg_match('/\d{2}\/\d{2}\/\d{4}/',date("d/m/Y", $date))) {
                        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula E'.$i.' deve ser uma data xx/yy/zzzz');
                    }
                } else {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula E'.$i.' deve ser uma data válida');
                }

                if (strpos(trim($spreadsheet->getActiveSheet()->getCell('F'.$i,false)),",")==false) {
                    if (!preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('F'.$i,false)))) {
                        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula F' . $i . ' deve conter um ou mais números inteiros separados por vírgula.');
                    }
                }
                else {
                    foreach (explode(",",trim($spreadsheet->getActiveSheet()->getCell('F'.$i,false))) as $num) {
                        if (!preg_match('/\d+/',$num)) {
                            return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula F' . $i . ' deve conter um ou mais números inteiros separados por vírgula.');
                        }
                    }
                }
//                if (!preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('G'.$i,false)))) {
//                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula G' . $i . ' deve ser um número inteiro.');
//                }
                if (!preg_match('/\d+,?\d*/',trim($spreadsheet->getActiveSheet()->getCell('L'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula L' . $i . ' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                }
                if (!preg_match('/\d+,?\d*/',trim($spreadsheet->getActiveSheet()->getCell('M'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula M' . $i . ' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                }
                if (!preg_match('/\d+,?\d*/',trim($spreadsheet->getActiveSheet()->getCell('N'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula N' . $i . ' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                }
                if (!preg_match('/\d+,?\d*/',trim($spreadsheet->getActiveSheet()->getCell('O'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula O' . $i . ' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                }
                if (!preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('P'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula P' . $i . ' deve ser um número inteiro.');
                }
                if (!preg_match('/\d+,?\d*/',trim($spreadsheet->getActiveSheet()->getCell('Q'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula Q' . $i . ' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                }
                if (!preg_match('/\d+,?\d*/',trim($spreadsheet->getActiveSheet()->getCell('R'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula R' . $i . ' deve ser um número real, com até 3 casas decimais (XX,YYY).');
                }
                if (!preg_match('/\d+,?\d*/',trim($spreadsheet->getActiveSheet()->getCell('S'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula S' . $i . ' deve ser um número real, com até 3 casas decimais (XX,YYY).');
                }
                if (!preg_match('/\d+,?\d*/',trim($spreadsheet->getActiveSheet()->getCell('T'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula T' . $i . ' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                }

	            // VALIDAR planilha embarcacao
                $u = explode("|", trim($spreadsheet->getActiveSheet()->getCell('U'.$i,false)));
                $v = explode("|", trim($spreadsheet->getActiveSheet()->getCell('V'.$i,false)));
                $w = explode("|", trim($spreadsheet->getActiveSheet()->getCell('W'.$i,false)));
                foreach ($v as $value){
                    if(strlen($value) > 0){
                        if (!preg_match('/\d+/',trim($value)) && !preg_match('/\d+,\d{1,3}/',trim($value))) {
                            return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha EMBARCACAO, célula V'.$i.' deve ser um número com até 3 casas decimais (XX,XXX).');
                        }
                    }
                }
                foreach ($w as $value){
	                if(strlen($value) > 0){
	                    if (!preg_match('/\d+/',trim($value)) && !preg_match('/\d+,\d{1,3}/', trim($value))) {
	                        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha EMBARCACAO, célula W'.$i.' deve ser um número com até 3 casas decimais (XX,XXX).');
	                    }
	                }
	            }
                if (sizeof($v)!=sizeof($w) || sizeof($v)!=sizeof($u)) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha EMBARCACAO, célula W'.$i.', número de subregistros (pipe |) devem ser iguais nas células U, V e W.');
                }

                // VALIDAR planilha acampamento
                $x = explode("|", trim($spreadsheet->getActiveSheet()->getCell('X'.$i,false)));
                $y = explode("|", trim($spreadsheet->getActiveSheet()->getCell('Y'.$i,false)));
                $z = explode("|", trim($spreadsheet->getActiveSheet()->getCell('Z'.$i,false)));
                if (sizeof($x)!=sizeof($y) || sizeof($x)!=sizeof($z)) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ACAMPAMENTO, célula Z'.$i.', número de subregistros (pipe |) devem ser iguais nas células X, Y e Z.');
                }

                // VALIDAR planilha instrumento
                $aa = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AA'.$i,false)));
                $ab = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AB'.$i,false)));
                $ac = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AC'.$i,false)));
                $ad = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AD'.$i,false)));
                foreach ($ac as $value){
                    if(strlen($value) > 0){
                        if (!preg_match('/\d+/',trim($value))) {
                            return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha INSTRUMENTO, célula AC'.$i.' deve ser um número inteiro.');
                        }
                    }
                }
                if (sizeof($aa)!=sizeof($ab) || sizeof($aa)!=sizeof($ac) || sizeof($aa)!=sizeof($ad)) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha INSTRUMENTO, célula AD'.$i.', número de subregistros (pipe |) devem ser iguais nas células AA, AB, AC e AD.');
                }

                // VALIDAR planilha especie
                $ae = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AE'.$i,false)));
                $af = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AF'.$i,false)));
                $ag = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AG'.$i,false)));
                $ah = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AH'.$i,false)));
                $ai = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AI'.$i,false)));
                $aj = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AJ'.$i,false)));
                $ak = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AK'.$i,false)));
                $al = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AL'.$i,false)));
                $am = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AM'.$i,false)));
                $an = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AN'.$i,false)));
                $ao = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AO'.$i,false)));
                foreach ($al as $value){
                    if(strlen($value) > 0){
                        if (!preg_match('/\d+/',trim($value)) && !preg_match('/\d+,\d{1,2}/',trim($value))) {
                            return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ESPECIE, célula AL'.$i.' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                        }
                    }
                }
                foreach ($am as $value){
	                if(strlen($value) > 0){
	                    if (!preg_match('/\d+/',trim($value)) && !preg_match('/\d+,\d{1,3}/',trim($value))) {
	                        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ESPECIE, célula AM'.$i.' deve ser um número com até 3 casas decimais (XX,XXX).');
	                    }
	                }
	            }
                foreach ($an as $value){
                    if(strlen($value) > 0){
                        if (!preg_match('/\d+/',trim($value)) && !preg_match('/\d+,\d{1,2}/',trim($value))) {
                            return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ESPECIE, célula AN'.$i.' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                        }
                    }
                }
                foreach ($ao as $value){
                    if(strlen($value) > 0){
                        if (!preg_match('/\d+/',trim($value)) && !preg_match('/\d+,\d{1,3}/',trim($value))) {
                            return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ESPECIE, célula AO'.$i.' deve ser um número com até 3 casas decimais (XX,XXX).');
                        }
                    }
                }
                if (sizeof($ae)!=sizeof($af) || sizeof($ae)!=sizeof($ag) || sizeof($ae)!=sizeof($ah) || sizeof($ae)!=sizeof($ai) || sizeof($ae)!=sizeof($aj) || sizeof($ae)!=sizeof($ak) || sizeof($ae)!=sizeof($al) || sizeof($ae)!=sizeof($am) || sizeof($ae)!=sizeof($an) || sizeof($ae)!=sizeof($ao)) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ESPECIE, célula AO'.$i.', número de subregistros (pipe |) devem ser iguais nas células AE, AF, AG, AH, AI, AJ, AK, AL, AM, AN e AO.');
                }
            }

	        
	        // CADASTROS
	        $controllerComunidade = new ControllerComunidade();
	        $controllerPesca = new ControllerPesca();
	        $controllerTipoComprador = new ControllerTipoComprador();
	        $controllerAmbiente = new ControllerAmbiente();
	        $controllerAcampamento = new ControllerAcampamento();
	        $controllerEmbarcacao = new ControllerEmbarcacao();
	        $controllerEspecie = new ControllerEspecie();
	        $controllerInstrumento = new ControllerInstrumento();
	        $controllerEstrategia = new ControllerEstrategia();
	        $controllerCidade = new ControllerCidade();
	        $controllerEstado = new ControllerEstado();
	        
	        $spreadsheet->setActiveSheetIndexByName('registro');
	        $numRowsRegistro = $spreadsheet->getActiveSheet()->getHighestRow();
	        
	        for ($i=2; $i<=$numRowsRegistro; $i++)
	        {
	            $spreadsheet->setActiveSheetIndexByName('registro');
	            $nomePescador = trim($spreadsheet->getActiveSheet()->getCell('B'.$i,false));
	            $nomeComunidade = trim($spreadsheet->getActiveSheet()->getCell('C'.$i,false));

                $dataInicio = trim($spreadsheet->getActiveSheet()->getCell('D'.$i,false));
                if(is_numeric($dataInicio)) {
                    $dataInicio = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($dataInicio);
                    $dataInicio = date("d/m/Y", $dataInicio);
                }
                $dataInicio = explode("/",$dataInicio);
                $dataInicio = $dataInicio[2]."-".$dataInicio[1]."-".$dataInicio[0];

                $dataFim = trim($spreadsheet->getActiveSheet()->getCell('E'.$i,false));
                if(is_numeric($dataFim)) {
                    $dataFim = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($dataFim);
                    $dataFim = date("d/m/Y", $dataFim);
                }
                $dataFim = explode("/",$dataFim);
                $dataFim = $dataFim[2]."-".$dataFim[1]."-".$dataFim[0];

                $diaSemana = trim($spreadsheet->getActiveSheet()->getCell('F'.$i,false));
                $qtdDias = trim($spreadsheet->getActiveSheet()->getCell('G'.$i,false));
                $nomePorto = trim($spreadsheet->getActiveSheet()->getCell('H'.$i,false));
                $nomeRio = trim($spreadsheet->getActiveSheet()->getCell('I'.$i,false));
                $siglaEstado = trim($spreadsheet->getActiveSheet()->getCell('J'.$i,false));
                $nomeCidade = trim($spreadsheet->getActiveSheet()->getCell('K'.$i,false));
                $gelo = trim($spreadsheet->getActiveSheet()->getCell('L'.$i,false));
                $alimento = trim($spreadsheet->getActiveSheet()->getCell('M'.$i,false));
                $combustivel = trim($spreadsheet->getActiveSheet()->getCell('N'.$i,false));
                $outrosGastos = trim($spreadsheet->getActiveSheet()->getCell('O'.$i,false));
                $numeroPescadores = trim($spreadsheet->getActiveSheet()->getCell('P'.$i,false));
                $valorCusto = trim($spreadsheet->getActiveSheet()->getCell('Q'.$i,false));
                $pesoConsumido = trim($spreadsheet->getActiveSheet()->getCell('R'.$i,false));
                $pesoVendido = trim($spreadsheet->getActiveSheet()->getCell('S'.$i,false));
                $valorVenda = trim($spreadsheet->getActiveSheet()->getCell('T'.$i,false));

	            $comunidade = $controllerComunidade->getAction()->getByDescricao($nomeComunidade);
	            if ($comunidade!=null && $comunidade->getId()!=null) { $idComunidade = $comunidade->getId(); }
	            else { $idComunidade = $controllerComunidade->getAction()->cadastrar($nomeComunidade); }

	            $idEstado = $controllerEstado->getEstadoBySigla($siglaEstado);
	            if ($idEstado!=null && $idEstado->getId()!=null) {
	                $idEstado = $idEstado->getId();
                }
	            else $idEstado = null;
                $idCidade = $controllerCidade->getAction()->getByNomeSiglaEstado($nomeCidade,$idEstado);
                if ($idCidade!=null && $idCidade!=false && $idCidade->getId()!=null) $idCidade=$idCidade->getId();

                $pesca = new Pesca();
	            $pesca->setNomePescador(strlen($nomePescador)==0 ? null : $nomePescador);
	            $pesca->setIdcomunidade(intval($idComunidade));
	            $pesca->setDiaInicio($dataInicio);
	            $pesca->setDiaFim($dataFim);
	            $pesca->setDiasemana(strlen($diaSemana)==0 ? null : $diaSemana);
	            $pesca->setQtdDias(strlen($qtdDias)==0 ? null : $qtdDias);
                $pesca->setNomePorto(strlen($nomePorto)==0 ? null : $nomePorto);
                $pesca->setNomeRio(strlen($nomeRio)==0 ? null : $nomeRio);
                $pesca->setIdcidade(intval($idCidade));
                $pesca->setGelo(floatval(str_replace(",",".",$gelo)));
                $pesca->setAlimento(floatval(str_replace(",",".",$alimento)));
                $pesca->setCombustivel(floatval(str_replace(",",".",$combustivel)));
                $pesca->setOutrosGastos(floatval(str_replace(",",".",$outrosGastos)));
                $pesca->setNumpescadores(intval($numeroPescadores));
                $valorCusto = $pesca->getGelo() + $pesca->getAlimento() + $pesca->getCombustivel() + $pesca->getOutrosGastos();
                $pesca->setValorcusto(floatval(str_replace(",",".",$valorCusto)));
                $pesca->setPesoconsumido(floatval(str_replace(",",".",$pesoConsumido)));
                $pesca->setPesovendido(floatval(str_replace(",",".",$pesoVendido)));
                $pesca->setValorvenda(floatval(str_replace(",",".",$valorVenda)));
                $pesca->setDatacadastro(date('Y-m-d H:i:s'));
                $pesca->setIdusuario($_SESSION['idUsuario']);
	            $idPesca = $controllerPesca->getAction()->cadastrar($pesca);
	            
	            // embarcacao
	            $u = explode("|", trim($spreadsheet->getActiveSheet()->getCell('U'.$i,false)));
	            $v = explode("|", trim($spreadsheet->getActiveSheet()->getCell('V'.$i,false)));
	            $w = explode("|", trim($spreadsheet->getActiveSheet()->getCell('W'.$i,false)));
	            if(count($u) > 0 && strlen($u[0]) > 0){
    	            for($aux = 0; $aux < count($u); $aux++)
    	            {
    	                $descricao = trim($u[$aux]);
    	                $tamanho = str_replace(",", ".", trim($v[$aux]));
    	                $tamanho = strlen($tamanho) == 0 ? null : floatval($tamanho);
    	                $potencia = str_replace(",", ".", trim($w[$aux]));
    	                $potencia = strlen($potencia) == 0 ? null : floatval($potencia);
    	                
    	                $embarcacao = $controllerEmbarcacao->getAction()->getByDescricao($descricao);
    	                if ($embarcacao!=null && $embarcacao->getId()!=null) {
    	                    $idEmbarcacao = $embarcacao->getId();
    	                }
    	                else {
    	                    $idEmbarcacao = $controllerEmbarcacao->getAction()->cadastrarSemVerificacao($descricao);
    	                }
    	                $controllerPesca->getAction()->cadastrarPescaEmbarcacao($idPesca, $idEmbarcacao, $tamanho, $potencia);
    	            }
	            }
	            // acampamento
                $x = explode("|", trim($spreadsheet->getActiveSheet()->getCell('X'.$i,false)));
                $y = explode("|", trim($spreadsheet->getActiveSheet()->getCell('Y'.$i,false)));
                $z = explode("|", trim($spreadsheet->getActiveSheet()->getCell('Z'.$i,false)));
                if(count($x) > 0 && strlen($x[0]) > 0){
                    for($aux = 0; $aux < count($x); $aux++)
                    {
                        $nomeAcampamento = trim($x[$aux]);
                        $nomePesqueiro = trim($y[$aux]);
                        $idAcampamento = $controllerAcampamento->getAction()->cadastrar($nomeAcampamento,$nomePesqueiro,$idPesca);
                        $nomesAmbiente = trim($z[$aux]);
                        $arrayAmbientes = explode(",",$nomesAmbiente);
                        if ($arrayAmbientes!=null && $arrayAmbientes!=false && sizeof($arrayAmbientes)>0) {
                            foreach ($arrayAmbientes as $nomeAmbiente) {
                                $ambiente = $controllerAmbiente->getAction()->getByDescricao($nomeAmbiente);
                                if ($ambiente!=null && $ambiente->getId()!=null) {
                                    $idAmbiente = $ambiente->getId();
                                }
                                else {
                                    $idAmbiente = $controllerAmbiente->getAction()->cadastrar($nomeAmbiente);
                                }
                                $controllerAcampamento->getAction()->cadastrarAcampamentoAmbiente($idAcampamento,$idAmbiente);
                            }
                        }
                    }
                }

	            // instrumento
	            $aa = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AA'.$i,false)));
	            $ab = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AB'.$i,false)));
	            $ac = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AC'.$i,false)));
	            $ad = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AD'.$i,false)));
	            if(count($aa) > 0 && strlen($aa[0]) > 0)
	            {
	                 for($aux = 0; $aux < count($w); $aux++)
	                 {
	                     $descricaoInstrumento = strlen(trim($aa[$aux]))==0 ? null : trim($aa[$aux]);
	                     $descricaoEstrategia = strlen(trim($ab[$aux]))==0 ? null : trim($ab[$aux]);
	                     $qtd = strlen(trim($ac[$aux]))==0 ? null : trim($ac[$aux]);
                         $detalhes = strlen(trim($ad[$aux]))==0 ? null : trim($ad[$aux]);

	                     $instrumento = $controllerInstrumento->getAction()->getByDescricao($descricaoInstrumento);
	                     if ($instrumento!=null && $instrumento->getId()!=null) {
	                         $idInstrumento = $instrumento->getId();
	                     }
	                     else {
	                         $idInstrumento = $controllerInstrumento->getAction()->cadastrar($descricaoInstrumento);
	                     }
	                     
	                     if ($descricaoEstrategia != '' || $descricaoEstrategia!="''") {
	                       $objEstrategia = $controllerEstrategia->getAction()->getByDescricaoInstrumento($descricaoEstrategia, $idInstrumento);
    	                     if ($objEstrategia!=null && $objEstrategia->getId()!=null) {
    	                         $idEstrategia = $objEstrategia->getId();
    	                     }
    	                     else {
    	                         $idEstrategia = $controllerEstrategia->getAction()->cadastrar($descricaoEstrategia, $idInstrumento);
    	                     }
	                     } else {
	                         $idEstrategia = null;
	                     }
	                     $controllerPesca->getAction()->cadastrarPescaInstrumento($idPesca, $idInstrumento, $qtd, $detalhes, $idEstrategia);
	                 }
	            }

                // especie
	            $ae = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AE'.$i,false)));
	            $af = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AF'.$i,false)));
	            $ag = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AG'.$i,false)));
	            $ah = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AH'.$i,false)));
	            $ai = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AI'.$i,false)));
	            $aj = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AJ'.$i,false)));
	            $ak = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AK'.$i,false)));
	            $al = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AL'.$i,false)));
                $am = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AM'.$i,false)));
                $an = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AN'.$i,false)));
                $ao = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AO'.$i,false)));

	            if(count($ae) > 0 && strlen($ae[0]) > 0)
	            {
	                 for($aux = 0; $aux < count($ae); $aux++)
	                 {
	                     $popular = strlen(trim($ae[$aux]))==0 ? null : trim($ae[$aux]);
	                     $ordem = strlen(trim($af[$aux]))==0 ? null : trim($af[$aux]);
	                     $familia = strlen(trim($ag[$aux]))==0 ? null : trim($ag[$aux]);
	                     $genero = strlen(trim($ah[$aux]))==0 ? null : trim($ah[$aux]);
	                     $especie = strlen(trim($ai[$aux]))==0 ? null : trim($ai[$aux]);
                         $arte = strlen(trim($aj[$aux]))==0 ? null : trim($aj[$aux]);
                         $medicao = strlen(trim($ak[$aux]))==0 ? null : trim($ak[$aux]);
                         if (strtolower($medicao)=='cambo') {$medicao = 1;}
                         else {$medicao=2;}
                         $fator = strlen(trim($al[$aux]))==0 ? null : floatval(str_replace(",",".",trim($al[$aux])));
                         $qtdVendida = strlen(trim($am[$aux]))==0 ? null : floatval(str_replace(",",".",trim($am[$aux])));
                         $preco = strlen(trim($an[$aux]))==0 ? null : floatval(str_replace(",",".",trim($an[$aux])));
	                     $qtdConsumida = strlen(trim($ao[$aux]))==0 ? null : floatval(str_replace(",",".",trim($ao[$aux])));
	                     $peixe = $controllerEspecie->getAction()->getBy($popular,$genero,$especie,$ordem,$familia);
	                     if ($peixe!=null && $peixe->getId()!=null) {
	                         $idPeixe = $peixe->getId();
	                     }
	                     else {
	                         $idPeixe = $controllerEspecie->getAction()->cadastrar($popular, $genero, $especie, $ordem, $familia);
	                     }
                         $controllerPesca->getAction()->cadastrarPescaEspecie($idPesca,$idPeixe,$arte,$medicao,$fator,$qtdVendida,$preco,$qtdConsumida);
	                 }
	            }

                // comprador
                $ap = explode("|", trim($spreadsheet->getActiveSheet()->getCell('AP'.$i,false)));
                if(count($ap) > 0 && strlen($ap[0]) > 0)
                {
                    for($aux = 0; $aux < count($ap); $aux++)
                    {
                        $descricao = trim($ap[$aux]);
                        $comprador = $controllerTipoComprador->getAction()->getByDescricao($descricao);
                        if ($comprador!=null && $comprador->getId()!=null) {
                            $idComprador = $comprador->getId();
                        }
                        else {
                            $idComprador= $controllerTipoComprador->getAction()->cadastrar($descricao);
                        }
                        $controllerPesca->getAction()->cadastrarPescaTipoComprador($idPesca, $idComprador);
                    }
                }
            }
	        return array('card-panel center z-depth-3 white-text green darken-2 noselect','Arquivo importado com sucesso!');
	    }
	    catch (Exception $e) {
	        return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no processamento do arquivo, verifique se o formato de importação está como planilha única ou separada.');
	    }
	}
	
    private function getDataFromExcel($spreadsheet, $celula)
    {
	    $value = $spreadsheet->getActiveSheet()->getCell($celula,false)->getValue();
	    if($spreadsheet->getActiveSheet()->getCell($celula,false)->getDataType() == 's')
	        return $value;
	    
        $value = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
        $value = $value->format("H:i:s");
        return $value;
    }

}