<?php

include_once 'ControllerComunidade.php';
include_once 'ControllerAmbiente.php';
include_once 'ControllerTipoComprador.php';
include_once 'ControllerInstrumento.php';
include_once 'ControllerEmbarcacao.php';
include_once 'ControllerEspecie.php';
include_once 'ControllerPesca.php';
include_once 'ControllerEstrategia.php';
include_once 'ControllerEstado.php';
include_once 'ControllerCidade.php';
include_once '../../library/LibUtils.php';

require '../../library/phpspreadsheet/spreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ControllerPlanilhaSeparada extends Controller
{
    public function getModelo()
    {
        return "extra/modelo_planilha_separada.xlsx";
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
            ->setCellValue('T1', 'valorVenda');
	    $spreadsheet->getActiveSheet()->setTitle('registro');
	    
	    $spreadsheet->addSheet(new Worksheet());
	    $spreadsheet->setActiveSheetIndex(1)
	    ->setCellValue('A1', 'id')
	    ->setCellValue('B1', 'embarcacao')
	    ->setCellValue('C1', 'tamanho')
	    ->setCellValue('D1', 'potencia');
	    $spreadsheet->getActiveSheet()->setTitle('embarcacao');

        $spreadsheet->addSheet(new Worksheet());
        $spreadsheet->setActiveSheetIndex(2)
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'nomeAcampamento')
            ->setCellValue('C1', 'nomePesqueiro')
            ->setCellValue('D1', 'ambiente');
        $spreadsheet->getActiveSheet()->setTitle('acampamento');

        $spreadsheet->addSheet(new Worksheet());
        $spreadsheet->setActiveSheetIndex(3)
	    ->setCellValue('A1', 'id')
	    ->setCellValue('B1', 'instrumento')
	    ->setCellValue('C1', 'estrategia')
	    ->setCellValue('D1', 'quantidade')
	    ->setCellValue('E1', 'detalhes');
        $spreadsheet->getActiveSheet()->setTitle('instrumento');

        $spreadsheet->addSheet(new Worksheet());
        $spreadsheet->setActiveSheetIndex(4)
	    ->setCellValue('A1', 'id')
	    ->setCellValue('B1', 'nomePopular')
	    ->setCellValue('C1', 'ordem')
	    ->setCellValue('D1', 'genero')
	    ->setCellValue('E1', 'familia')
	    ->setCellValue('F1', 'especie')
        ->setCellValue('G1', 'arte')
        ->setCellValue('H1', 'medicao')
        ->setCellValue('I1', 'fator')
        ->setCellValue('J1', 'qtdVendida')
        ->setCellValue('K1', 'preco')
	    ->setCellValue('L1', 'qtdConsumida');
        $spreadsheet->getActiveSheet()->setTitle('especie');

        $spreadsheet->addSheet(new Worksheet());
        $spreadsheet->setActiveSheetIndex(5)
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'descricao');
        $spreadsheet->getActiveSheet()->setTitle('comprador');


        $accPesca=$accEmbarcacao=$accArte=$accComprador=$accAmbiente=$accEspecie=$accAcampamento=1;
	    
	    
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
                ->setCellValue('T'.$accPesca,$pesca->getValorVenda());
	        
	        if (sizeof($embarcacoes)>0) {
	            for ($i=0; $i<sizeof($embarcacoes); $i++) {
	                $accEmbarcacao++;
	                $spreadsheet->setActiveSheetIndex(1)
	                ->setCellValue('A'.$accEmbarcacao,$pesca->getId())
	                ->setCellValue('B'.$accEmbarcacao,$embarcacaoDescricao[$i])
	                ->setCellValue('C'.$accEmbarcacao,$embarcacaoTamanho[$i])
	                ->setCellValue('D'.$accEmbarcacao,$embarcacaoMotor[$i]);
	            }
	        }

            if (sizeof($acampamentos)>0) {
                for ($i=0; $i<sizeof($acampamentos); $i++) {
                    $accAcampamento++;
                    $spreadsheet->setActiveSheetIndex(2)
                        ->setCellValue('A'.$accAcampamento,$pesca->getId())
                        ->setCellValue('B'.$accAcampamento,$nomeAcampamento[$i])
                        ->setCellValue('C'.$accAcampamento,$nomePesqueiro[$i])
                        ->setCellValue('D'.$accAcampamento,$ambientes[$i]);
                }
            }

            if (sizeof($artes)>0) {
                for ($i=0; $i<sizeof($artes); $i++) {
                    $accArte++;
                    $spreadsheet->setActiveSheetIndex(3)
	                ->setCellValue('A'.$accArte,$pesca->getId())
	                ->setCellValue('B'.$accArte,$arteDescricao[$i])
	                ->setCellValue('C'.$accArte,$arteEstrategia[$i])
	                ->setCellValue('D'.$accArte,$arteQtd[$i])
	                ->setCellValue('E'.$accArte,$arteDetalhes[$i]);
                }
            }

            if (sizeof($especies)>0) {
                for ($i=0; $i<sizeof($especies); $i++) {
                    $accEspecie++;
                    $spreadsheet->setActiveSheetIndex(4)
	                ->setCellValue('A'.$accEspecie,$pesca->getId())
	                ->setCellValue('B'.$accEspecie,$especieNomePopular[$i])
	                ->setCellValue('C'.$accEspecie,$especieOrdem[$i])
	                ->setCellValue('D'.$accEspecie,$especieFamilia[$i])
	                ->setCellValue('E'.$accEspecie,$especieGenero[$i])
	                ->setCellValue('F'.$accEspecie,$especieEspecie[$i])
                    ->setCellValue('G'.$accEspecie,$especieArte[$i])
                    ->setCellValue('H'.$accEspecie,$especieMedicao[$i])
                    ->setCellValue('I'.$accEspecie,$especieFator[$i])
                    ->setCellValue('J'.$accEspecie,$especieQtdVendida[$i])
                    ->setCellValue('K'.$accEspecie,$especiePreco[$i])
	                ->setCellValue('L'.$accEspecie,$especieQtdConsumida[$i]);
                }
            }

            if (sizeof($compradores)>0) {
                for ($i=0; $i<sizeof($compradores); $i++) {
                    $accComprador++;
                    $spreadsheet->setActiveSheetIndex(5)
                        ->setCellValue('A'.$accComprador,$pesca->getId())
                        ->setCellValue('B'.$accComprador,$comprador[$i]);
                }
            }
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
            }

            // VALIDAR planilha embarcacao
            $spreadsheet->setActiveSheetIndexByName('embarcacao');
            $numRowsRegistro = $spreadsheet->getActiveSheet()->getHighestRow();
            for ($i=2; $i<=$numRowsRegistro; $i++)
            {
                if (!preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('A'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha REGISTRO, célula A' . $i . ' deve ser um número inteiro.');
                }
                if (!preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('C'.$i,false))) && !preg_match('/\d+,\d{1,3}/', trim($spreadsheet->getActiveSheet()->getCell('C'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha EMBARCACAO, célula C'.$i.' deve ser um número com até 3 casas decimais (XX,XXX).');
                }
                if (!preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('D'.$i,false))) && !preg_match('/\d+,\d{1,3}/', trim($spreadsheet->getActiveSheet()->getCell('D'.$i,false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha EMBARCACAO, célula D'.$i.' deve ser um número com até 3 casas decimais (XX,XXX).');
                }
            }


            // VALIDAR planilha acampamento
            $spreadsheet->setActiveSheetIndexByName('acampamento');
            $numRowsRegistro = $spreadsheet->getActiveSheet()->getHighestRow();
            for ($i=2; $i<=$numRowsRegistro; $i++) {
                if (!preg_match('/\d+/', trim($spreadsheet->getActiveSheet()->getCell('A' . $i, false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Erro nos dados. Planilha REGISTRO, célula A' . $i . ' deve ser um número inteiro.');
                }
            }

            // VALIDAR planilha instrumento
            $spreadsheet->setActiveSheetIndexByName('instrumento');
            $numRowsRegistro = $spreadsheet->getActiveSheet()->getHighestRow();
            for ($i=2; $i<=$numRowsRegistro; $i++) {
                if (!preg_match('/\d+/', trim($spreadsheet->getActiveSheet()->getCell('A' . $i, false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Erro nos dados. Planilha instrumento, célula A' . $i . ' deve ser um número inteiro.');
                }
//                if (!preg_match('/\d+/', trim($spreadsheet->getActiveSheet()->getCell('D' . $i, false)))) {
//                    return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Erro nos dados. Planilha instrumento, célula D' . $i . ' deve ser um número inteiro.');
//                }
                $aa = explode(",", trim($spreadsheet->getActiveSheet()->getCell('E'.$i,false)));
                if (count($aa)>0 && strlen($aa[0])>0) {
                    foreach ($aa as $value) {
                        if (strlen($value) > 0) {
                            if (!preg_match('/\d+/', trim($value))) {
                                return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Erro nos dados. Planilha INSTRUMENTO, célula E' . $i . ' deve ser números inteiros separados por vírgula.');
                            }
                        }
                    }
                }
            }


            // VALIDAR planilha especie
            $spreadsheet->setActiveSheetIndexByName('especie');
            $numRowsRegistro = $spreadsheet->getActiveSheet()->getHighestRow();
            for ($i=2; $i<=$numRowsRegistro; $i++) {
                if (!preg_match('/\d+/', trim($spreadsheet->getActiveSheet()->getCell('A' . $i, false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect', 'Erro nos dados. Planilha REGISTRO, célula A' . $i . ' deve ser um número inteiro.');
                }
                if (strlen(trim($spreadsheet->getActiveSheet()->getCell('I' . $i, false)))>0 && !preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('I' . $i, false))) && !preg_match('/\d+,\d{1,2}/',trim($spreadsheet->getActiveSheet()->getCell('I' . $i, false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ESPECIE, célula I'.$i.' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                }
                if (strlen(trim($spreadsheet->getActiveSheet()->getCell('J' . $i, false)))>0 && !preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('J' . $i, false))) && !preg_match('/\d+,\d{1,3}/',trim($spreadsheet->getActiveSheet()->getCell('J' . $i, false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ESPECIE, célula J'.$i.' deve ser um número com até 3 casas decimais (XX,XXX).');
                }
                if (strlen(trim($spreadsheet->getActiveSheet()->getCell('K' . $i, false)))>0 && !preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('K' . $i, false))) && !preg_match('/\d+,\d{1,2}/',trim($spreadsheet->getActiveSheet()->getCell('K' . $i, false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ESPECIE, célula K'.$i.' deve ser do tipo moeda, um número com até 2 casas decimais (XX,XX).');
                }
                if (strlen(trim($spreadsheet->getActiveSheet()->getCell('L' . $i, false)))>0  && !preg_match('/\d+/',trim($spreadsheet->getActiveSheet()->getCell('L' . $i, false))) && !preg_match('/\d+,\d{1,3}/',trim($spreadsheet->getActiveSheet()->getCell('L' . $i, false)))) {
                    return array('card-panel center z-depth-3 white-text red darken-2 noselect','Erro nos dados. Planilha ESPECIE, célula L'.$i.' deve ser um número com até 3 casas decimais (XX,XXX).');
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
                $idlink = trim($spreadsheet->getActiveSheet()->getCell('A'.$i,false));
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
                $spreadsheet->setActiveSheetIndexByName('embarcacao');
                $numRowsEmbarcacao = $spreadsheet->getActiveSheet()->getHighestRow();
                for ($j=2; $j<=$numRowsEmbarcacao; $j++)
                {
                    if (intval($idlink) == intval(trim($spreadsheet->getActiveSheet()->getCell('A'.$j,false)))) {
                        $descricao = trim($spreadsheet->getActiveSheet()->getCell('B'.$j,false));
                        $tamanho = str_replace(",", ".", trim($spreadsheet->getActiveSheet()->getCell('C'.$j,false)));
                        $tamanho = strlen($tamanho) == 0 ? null : floatval($tamanho);
                        $potencia = str_replace(",", ".", trim($spreadsheet->getActiveSheet()->getCell('D'.$j,false)));
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
                $spreadsheet->setActiveSheetIndexByName('acampamento');
                $numRowsAcampamento = $spreadsheet->getActiveSheet()->getHighestRow();
                for ($j=2; $j<=$numRowsAcampamento; $j++)
                {
                    if (intval($idlink) == intval(trim($spreadsheet->getActiveSheet()->getCell('A'.$j,false)))) {
                        $nomeAcampamento = trim($spreadsheet->getActiveSheet()->getCell('B'.$j,false));
                        $nomePesqueiro = trim($spreadsheet->getActiveSheet()->getCell('C'.$j,false));
                        $idAcampamento = $controllerAcampamento->getAction()->cadastrar($nomeAcampamento,$nomePesqueiro,$idPesca);
                        $nomesAmbiente = trim($spreadsheet->getActiveSheet()->getCell('D'.$j,false));
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
                $spreadsheet->setActiveSheetIndexByName('instrumento');
                $numRowsInstrumento = $spreadsheet->getActiveSheet()->getHighestRow();
                for ($j=2; $j<=$numRowsInstrumento; $j++)
                {
                    if (intval($idlink) == intval(trim($spreadsheet->getActiveSheet()->getCell('A'.$j,false)))) {
                        $descricaoInstrumento = strlen(trim($spreadsheet->getActiveSheet()->getCell('B'.$j,false))) == 0 ? null : trim($spreadsheet->getActiveSheet()->getCell('B'.$j,false));
                        $descricaoEstrategia = strlen(trim($spreadsheet->getActiveSheet()->getCell('C'.$j,false))) == 0 ? null : trim($spreadsheet->getActiveSheet()->getCell('C'.$j,false));
                        $qtd = strlen(trim($spreadsheet->getActiveSheet()->getCell('D'.$j,false))) == 0 ? null : trim($spreadsheet->getActiveSheet()->getCell('D'.$j,false));
                        $detalhes = strlen(trim($spreadsheet->getActiveSheet()->getCell('E'.$j,false))) == 0 ? null : trim($spreadsheet->getActiveSheet()->getCell('E'.$j,false));

                        $instrumento = $controllerInstrumento->getAction()->getByDescricao($descricaoInstrumento);
                        if ($instrumento != null && $instrumento->getId() != null) {
                            $idInstrumento = $instrumento->getId();
                        } else {
                            $idInstrumento = $controllerInstrumento->getAction()->cadastrar($descricaoInstrumento);
                        }

                        if ($descricaoEstrategia != '' || $descricaoEstrategia != "''") {
                            $objEstrategia = $controllerEstrategia->getAction()->getByDescricaoInstrumento($descricaoEstrategia, $idInstrumento);
                            if ($objEstrategia != null && $objEstrategia->getId() != null) {
                                $idEstrategia = $objEstrategia->getId();
                            } else {
                                $idEstrategia = $controllerEstrategia->getAction()->cadastrar($descricaoEstrategia, $idInstrumento);
                            }
                        } else {
                            $idEstrategia = null;
                        }
                        $controllerPesca->getAction()->cadastrarPescaInstrumento($idPesca, $idInstrumento, $qtd, $detalhes, $idEstrategia);
                    }
                }

                // especie
                $spreadsheet->setActiveSheetIndexByName('especie');
                $numRowsEspecie = $spreadsheet->getActiveSheet()->getHighestRow();
                for ($j=2; $j<=$numRowsEspecie; $j++)
                {
                    if (intval($idlink) == intval(trim($spreadsheet->getActiveSheet()->getCell('A'.$j,false)))) {
                        $popular = strlen(trim($spreadsheet->getActiveSheet()->getCell('B'.$j,false)))==0 ? null : trim($spreadsheet->getActiveSheet()->getCell('B'.$j,false));
                        $ordem = strlen(trim($spreadsheet->getActiveSheet()->getCell('C'.$j,false)))==0 ? null : trim($spreadsheet->getActiveSheet()->getCell('C'.$j,false));
                        $familia = strlen(trim($spreadsheet->getActiveSheet()->getCell('D'.$j,false)))==0 ? null : trim($spreadsheet->getActiveSheet()->getCell('D'.$j,false));
                        $genero = strlen(trim($spreadsheet->getActiveSheet()->getCell('E'.$j,false)))==0 ? null : trim($spreadsheet->getActiveSheet()->getCell('E'.$j,false));
                        $especie = strlen(trim($spreadsheet->getActiveSheet()->getCell('F'.$j,false)))==0 ? null : trim($spreadsheet->getActiveSheet()->getCell('F'.$j,false));
                        $arte = strlen(trim($spreadsheet->getActiveSheet()->getCell('G'.$j,false)))==0 ? null : trim($spreadsheet->getActiveSheet()->getCell('G'.$j,false));
                        $medicao = strlen(trim($spreadsheet->getActiveSheet()->getCell('H'.$j,false)))==0 ? null : trim($spreadsheet->getActiveSheet()->getCell('H'.$j,false));
                        if (strtolower($medicao)=='cambo') {$medicao = 1;}
                        else {$medicao=2;}
                        $fator = strlen(trim($spreadsheet->getActiveSheet()->getCell('I'.$j,false)))==0 ? null : floatval(str_replace(",",".",trim($spreadsheet->getActiveSheet()->getCell('I'.$j,false))));
                        $qtdVendida = strlen(trim($spreadsheet->getActiveSheet()->getCell('J'.$j,false)))==0 ? null : floatval(str_replace(",",".",trim($spreadsheet->getActiveSheet()->getCell('J'.$j,false))));
                        $preco = strlen(trim($spreadsheet->getActiveSheet()->getCell('K'.$j,false)))==0 ? null : floatval(str_replace(",",".",trim($spreadsheet->getActiveSheet()->getCell('K'.$j,false))));
                        $qtdConsumida = strlen(trim($spreadsheet->getActiveSheet()->getCell('L'.$j,false)))==0 ? null : floatval(str_replace(",",".",trim($spreadsheet->getActiveSheet()->getCell('L'.$j,false))));
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
                $spreadsheet->setActiveSheetIndexByName('comprador');
                $numRowsComprador = $spreadsheet->getActiveSheet()->getHighestRow();
                for ($j=2; $j<=$numRowsComprador; $j++)
                {
                    if (intval($idlink) == intval(trim($spreadsheet->getActiveSheet()->getCell('A'.$j,false)))) {
                        $descricao = trim($spreadsheet->getActiveSheet()->getCell('B'.$j,false));
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
