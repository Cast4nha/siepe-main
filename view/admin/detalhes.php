<?php
include_once '../../controller/ControllerPesca.php';
include_once '../../controller/ControllerComunidade.php';
include_once '../../controller/ControllerAmbiente.php';
include_once '../../controller/ControllerInstrumento.php';
include_once '../../controller/ControllerEmbarcacao.php';
include_once '../../controller/ControllerTipoComprador.php';
include_once '../../controller/ControllerEspecie.php';
include_once '../../controller/ControllerEstrategia.php';
include_once '../../controller/ControllerDetalhes.php';
include_once '../../controller/ControllerEstado.php';
include_once '../../controller/ControllerCidade.php';
include_once '../../controller/ControllerAcampamento.php';
include_once '../../library/Import.php';
Import::library('Session');
Import::bean('Perfil');
$idPesca = $_POST['idPesca'];

$controllerAcampamento = new ControllerAcampamento();
$controllerDetalhes = new ControllerDetalhes();
$controllerPesca = new ControllerPesca();
$controllerComunidade = new ControllerComunidade();
$controllerAmbiente = new ControllerAmbiente();
$controllerInstrumento = new ControllerInstrumento();
$controllerEmbarcacao = new ControllerEmbarcacao();
$controllerEspecie = new ControllerEspecie();
$controllerTipoComprador = new ControllerTipoComprador();
$controllerEstrategia = new ControllerEstrategia();
$controllerEstado = new ControllerEstado();
$controllerCidade = new ControllerCidade();

$resultado = $controllerDetalhes->updateDetalhes();
$pesca = $controllerPesca->getAction()->getById($idPesca);
$comunidade = $controllerComunidade->getAction()->getById($pesca->getIdcomunidade());
$pescaInstrumento = $controllerPesca->getAction()->getByIdPescaInstrumento($idPesca);
$instrumentos = $controllerInstrumento->ListAllInstrumentoAtivo();
$pescaEmbarcacao = $controllerPesca->getAction()->getByIdPescaEmbarcacao($idPesca);
$especies = $controllerEspecie->ListAllEspecie();
$pescaEspecie = $controllerPesca->getAction()->getByIdPescaEspecie($idPesca);
$tiposcomprador = $controllerTipoComprador->ListAllTipoComprador();
$pescaComprador = $controllerPesca->getAction()->getByIdPescaComprador($idPesca);
$pescador = $controllerPesca->ListAllPescador();
$rios = $controllerPesca->ListAllRio();
$comunidades = $controllerComunidade->ListAllComunidade();
$portos = $controllerPesca->ListAllPorto();
$pesqueiros = $controllerAcampamento->ListAllNomePesqueiro();
$embarcacoes = $controllerEmbarcacao->ListAllEmbarcacao();
$ambientes = $controllerAmbiente->ListAllAmbiente();
$acampamentos = $controllerAcampamento->ListAllNomeAcampamento();
$estados = $controllerEstado->listAllEstados();
$cidade = null;
if ($pesca->getIdcidade()!=null) {
    $cidade = $controllerCidade->getById($pesca->getIdcidade());
}
$acampamentosPesca = $controllerPesca->getAction()->findAcapamentoByPesca($idPesca);
$rios = $controllerPesca->ListAllRio();
$emb = 0;
$acam = 0;
$diaSemana = explode(',',$pesca->getDiasemana());
?>

<div id="msgExcluir" title="Atenção!" style="display: none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Deseja realmente excluir
        este formulário de pesca?</p>
</div>

<!---->
<div id="dialog-message" title="Alerta!" style="display: none">
    <p>
        <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
        Formulário <span style="color: #ed2715"><?php echo $idPesca; ?></span> excluído com sucesso!
    </p>
</div>

<div class='container'>
    <form method="post" name="form" id="form-salvar">
        <input type="hidden" name="idPesca" value="<?= $idPesca ?>"/>
        <div class="row">
            <div class="col s12 m12">
                <div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
                <div class="card z-depth-3">
                    <div class="card-content">
                        <div class="row">
                            <div class="right" id="idpesca"><b>ID:</b> <?php echo $idPesca; ?></div>
                            <span class="card-title left">Identificação</span>
                        </div>
                        <div class='row'>
                            <div class="input-field col s12 m6">
                                <input id="nomePescador" class="validate control-enabled" required
                                       aria-required="true" type="text" name="nomePescador" size="100"
                                       maxlength="200" value="<?php echo $pesca->getNomePescador(); ?>"
                                       disabled/> <label for="nomePescador">Nome:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="idComunidade" name="idComunidade" class="control-enabled" disabled>
                                    <option value='0'>Selecione uma comunidade</option>
                                    <?php foreach ($comunidades as $comu) { ?>
                                        <option value="<?php echo $comu->getId(); ?>"
                                            <?php if ($comunidade!=false && $comunidade->getId()!=null && intval($comu->getId())==intval($comunidade->getId()))
                                                echo ' selected'; ?>><?php echo $comu->getDescricao(); ?></option>
                                    <?php } ?>
                                </select>
                                <label for="idComunidade">Comunidade:</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input type="date" id="diaInicio" class='validate control-enabled' value="<?=$pesca->getDiaInicio()?>"
                                       name="diaInicio" required disabled> <label class='active control-enabled'
                                                                         for="diaInicio">Dia do início da pesca:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input type="date" id="diaFim" class='validate control-enabled' value="<?=$pesca->getDiaFim()?>"
                                       name="diaFim" required disabled> <label class='active control-enabled'
                                                                      for="diaFim">Dia do fim da pesca:</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <select multiple id="diaSemana" class='validate control-enabled' name="diaSemana[]" required disabled>
                                    <option value="" disabled selected>Selecione os dias</option>
                                    <option value="1" <?php echo in_array(1, $diaSemana) ? 'selected' : '' ?>>Domingo</option>
                                    <option value="2" <?php echo in_array(2, $diaSemana) ? 'selected' : '' ?>>Segunda</option>
                                    <option value="3" <?php echo in_array(3, $diaSemana) ? 'selected' : '' ?>>Terça</option>
                                    <option value="4" <?php echo in_array(4, $diaSemana) ? 'selected' : '' ?>>Quarta</option>
                                    <option value="5" <?php echo in_array(5, $diaSemana) ? 'selected' : '' ?>>Quinta</option>
                                    <option value="6" <?php echo in_array(6, $diaSemana) ? 'selected' : '' ?>>Sexta</option>
                                    <option value="7" <?php echo in_array(7, $diaSemana) ? 'selected' : '' ?>>Sábado</option>
                                </select>
                                <label class='validate control-enabled'>Quais dias você pescou na semana?</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="qtdDias" required aria-required="true" type="number" class="control-enabled" name="qtdDias" size="1" min="1" max="7" autocomplete="off" value="<?php echo $pesca->getQtdDias(); ?>" disabled/>
                                <label for="qtdDias">Quantos dias você pescou?</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <div class="card  z-depth-3">
                    <div class="card-content">
                        <span class="card-title">Local</span>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="nomePorto" class="validate control-enabled" type="text" name="nomePorto" size="100" min="1" max="200" autocomplete="off" value="<?php echo $pesca->getNomePorto(); ?>" disabled/>
                                <label for="nomePorto">Nome do Porto:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="nomeRio" class="validate control-enabled" type="text" name="nomeRio" size="100" min="1" max="200" autocomplete="off" value="<?php echo $pesca->getNomeRio(); ?>" disabled/>
                                <label for="nomeRio">Rio:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <select id="estado" name="estado" class="control-enabled" disabled>
                                    <option value='0'>Selecione um estado</option>
                                    <?php foreach ($estados as $estado) { ?>
                                        <option value="<?php echo $estado->getId(); ?>"<?php if (intval($estado->getId())==floor($pesca->getIdcidade()/100000)) echo ' selected'; ?>><?php echo $estado->getDescricao(); ?></option>
                                    <?php } ?>
                                </select> <label for="estado">Estado:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="cidade" name="cidade" class="control-enabled" disabled>
                                    <option value="<?php if (isset($cidade) && $cidade!=null && $cidade->getId()!=null) echo $cidade->getId(); ?>"><?php if (isset($cidade) && $cidade!=null && $cidade->getId()!=null) echo $cidade->getDescricao(); ?></option>
                                </select>
                                <label for="cidade">Cidade:</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <div class="card z-depth-3">
                    <div class="card-content" id='divEmbarcacao'>
                        <div class="row">
                            <button class="btn waves-effect waves-light bt-default card-button right control-enabled tooltipped"
                                    data-tooltip="Clique para adicionar uma embarcação" type="button"
                                    name="AdicionarEmbarcacao" id="AdicionarEmbarcacao" disabled><i
                                    class="material-icons">add</i></button>
                            <span class="card-title">Embarcação</span>
                        </div>
                        <div class='row' id='divEmbarcacao'>
                            <table class="centered responsive-table highlight">
                                <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Tamanho</th>
                                    <th>Potência</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="embForm">
                                <?php
                                foreach ($pescaEmbarcacao as $pescaEmb) { ?>
                                    <tr id="emb_<?php echo $emb; ?>">
                                        <td class="table-emb">
                                            <select name="tipoEmbarcacao_<?php echo $emb; ?>"
                                                    class="table-emb control-enabled"
                                                    id="tipoEmbarcacao<?php echo $emb; ?>" disabled>
                                                <?php foreach ($embarcacoes as $embarcacao) {
                                                    $selectedEmb = $embarcacao->getId() == $pescaEmb->getIdembarcacao() ? 'selected' : ''; ?>
                                                    <option value="<?php echo $embarcacao->getId(); ?>" <?php echo $selectedEmb; ?>><?php echo $embarcacao->getDescricao(); ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td class="table-emb"><input id="tamEmbarcacao_<?php echo $emb; ?>"
                                                                     value="<?php echo $pescaEmb->getTamanho(); ?>"
                                                                     class="validate table-emb control-enabled"
                                                                     step="0.001" type="number"
                                                                     name="tamEmbarcacao_<?php echo $emb; ?>" disabled/>
                                        </td>
                                        <td class="table-emb"><input id="potEmbarcacao_<?php echo $emb; ?>"
                                                                     value="<?php echo $pescaEmb->getMotorpotencia(); ?>"
                                                                     class="validate table-emb control-enabled"
                                                                     step="0.001" type="number"
                                                                     name="potEmbarcacao_<?php echo $emb; ?>" disabled/>
                                        </td>
                                        <td>
                                            <button class="btn waves-effect waves-light red control-enabled tooltipped"
                                                    data-tooltip="Clique para deletar a embarcação" type="button"
                                                    id="removerEmbarcacao" name="removerEmbarcacao" disabled><i
                                                    class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                    <?php
                                    $emb++;
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12">
                <div class="card  z-depth-3">
                    <div class="card-content">
                        <div class="row">
                            <button
                                class="btn waves-effect waves-light bt-default card-button right tooltipped control-enabled"
                                data-tooltip="Clique para adicionar um acampamento"
                                type="button" name="AdicionarAcampamento"
                                id="AdicionarAcampamento" disabled>
                                <i class="material-icons">add</i>
                            </button>
                            <span class="card-title">Acampamento(s)</span>
                        </div>
                        <div class="row" >
                            <table class="highlight centered responsive-table">
                                <thead>
                                <tr>
                                    <th>Nome do Acampamento</th>
                                    <th>Nome do Pesqueiro</th>
                                    <th>Ambiente</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="acampForm">
                                <?php foreach ($acampamentosPesca as $ac) {
                                    $acAmbientes = $controllerAmbiente->ListAllByIdAcampamento($ac->getId());
                                    $arrayAmbientes = array();
                                    foreach ($acAmbientes as $aca) array_push($arrayAmbientes,$aca->getId());
                                ?>
                                <tr>
                                    <td>
                                        <input id="nomeAcampamento_<?php echo $acam; ?>" class=" control-enabled" type="text" name="nomeAcampamento_<?php echo $acam; ?>" size="100" min="1" max="200" autocomplete="off" value="<?php echo $ac->getNome(); ?>" disabled/>
                                    </td>
                                    <td>
                                        <input id="nomePesqueiro_<?php echo $acam; ?>" class="validate control-enabled" required aria-required="true" type="text" name="nomePesqueiro_<?php echo $acam; ?>" size="100" min="1" max="200" autocomplete="off" value="<?php echo $ac->getNomePesqueiro(); ?>" disabled/>
                                    </td>
                                    <td>
                                        <select id="ambiente_<?php echo $acam; ?>" name="ambiente_<?php echo $acam; ?>[]" class="control-enabled" multiple disabled>
                                            <option value='' disabled selected>Selecione</option>
                                            <?php foreach ($ambientes as $ambiente) { ?>
                                                <option value='<?php echo $ambiente->getId(); ?>'<?php if (in_array($ambiente->getId(),$arrayAmbientes)) echo ' selected'; ?>><?php echo $ambiente->getDescricao(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php
                                $acam++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12">
                <div class="card z-depth-3">
                    <div class="card-content" id='arte'>
                        <span class="card-title">Arte da Pesca</span>
                        <div class='row'>
                            <div class='input-field col s8 m10' id='divInstrumentos'>
                                <select id="instrumentosPesca" name="instrumentosPesca[]" class="control-enabled"
                                        disabled>
                                    <option value='0' disabled selected>Escolha uma ou mais opções</option>
                                    <?php foreach ($instrumentos as $instrumento) {
                                        $selecionado = false;
                                        foreach ($pescaInstrumento as $pescaInst) {
                                            if ($pescaInst->getIdinstrumento() == $instrumento->getId()) {
                                                $selecionado = true;
                                            }
                                        } ?>
                                        <option id='instr<?php echo $instrumento->getId(); ?>'
                                                value='<?php echo $instrumento->getId(); ?>' <?php if ($selecionado) echo 'disabled' ?>><?php echo $instrumento->getDescricao(); ?></option>
                                    <?php } ?>
                                </select>
                                <label for="instrumentosPesca">Instrumentos de Pesca:</label>
                            </div>
                            <div class='input-field col s4 m2 center'>
                                <button class="btn waves-effect waves-light bt-default control-enabled tooltipped"
                                        data-tooltip="Selecione um tipo de instrumento e clique para adiciona-lo."
                                type="button" name="AdicionarInstrumento" id="AdicionarInstrumento" disabled><i
                                            class="material-icons">add</i></button>
                            </div>
                        </div>
                        <div class="row">
                            <table class="highlight centered responsive-table">
                                <thead>
                                <tr>
                                    <th>Instrumento</th>
                                    <th>Estratégia</th>
                                    <th>Quantidade</th>
                                    <th>Detalhes</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="instrForm">
                                <?php foreach ($pescaInstrumento as $pescaInst) {
                                    $instr = $controllerInstrumento->getAction()->getByIdInstrumento($pescaInst->getIdinstrumento());
                                    $est = $controllerEstrategia->getAction()->findByInstrumento($pescaInst->getIdinstrumento());
                                    $myEst = $controllerEstrategia->getAction()->findById($pescaInst->getIdestrategia());
                                    $malhadeiras = [];
                                    $malhadeiras = explode(",", $pescaInst->getDetalhes()); ?>
                                    <tr id="<?php echo $pescaInst->getIdinstrumento(); ?>">
                                        <td class="table-instr">
                                            <select name="instrumentos[]" disabled>
                                                <option id="<?php echo $pescaInst->getIdinstrumento(); ?>"
                                                        value='<?php echo $pescaInst->getIdinstrumento(); ?>'><?php echo $instr->getDescricao(); ?></option>
                                            </select>
                                        </td>
                                        <td id="instrEstrategia<?php echo $pescaInst->getIdinstrumento(); ?>"
                                            class="table-instr">
                                            <?php $enbEstrategia = false;
                                            if ($est != null)
                                                $enbEstrategia = true; ?>
                                            <select id="estrategia<?php echo $pescaInst->getIdinstrumento(); ?>"
                                                    name="estrategia<?php echo $pescaInst->getIdinstrumento(); ?>" <?php if ($enbEstrategia) echo 'class="control-enabled"'; ?>
                                                    disabled>
                                                <option value='0'
                                                        disabled><?php if ($enbEstrategia) echo 'Selecione'; ?></option>
                                                <?php foreach ($est as $estrategia) {
                                                    $selectEstrategia = '';
                                                    if (isset($myEst) && $myEst!=null && $myEst->getId()!=null)
                                                        $selectEstrategia = $estrategia->getId() == $myEst->getId() ? 'selected' : '';
                                                    ?>
                                                    <option id="instr<?php echo $pescaInst->getIdinstrumento(); ?>"
                                                            value="<?php echo $estrategia->getId(); ?>"<?php echo $selectEstrategia; ?>><?php echo $estrategia->getDescricao(); ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <?php $enbQtd = false;
                                        if (strcasecmp($instr->getDescricao(), "Espinhel") == 0 || strcasecmp($instr->getDescricao(), "Malhadeira") == 0)
                                            $enbQtd = true; ?>
                                        <td class="table-instr"><input
                                                    id="qtd<?php echo $pescaInst->getIdinstrumento(); ?>"
                                                    value="<?php echo $pescaInst->getQtd(); ?>"
                                                    class="validate table-instr <?php if ($enbQtd) echo 'control-enabled' ?>"
                                                    type="number"
                                                    name="qtd<?php echo $pescaInst->getIdinstrumento(); ?>" disabled/>
                                        </td>
                                        <td class="table-instr">
                                            <?php $selDetalhes = true;
                                            if (strtoupper($instr->getDescricao())=="MALHADEIRA")
                                                $selDetalhes = true; ?>
                                            <select name='tipoMalha<?php echo $pescaInst->getIdinstrumento(); ?>[]'
                                                    id='tipoMalha<?php echo $pescaInst->getIdinstrumento(); ?>' <?php if ($selDetalhes) echo 'class="control-enabled"' ?>
                                                    multiple disabled>
                                                <option value='0' disabled></option>
                                                <?php for ($i = 3; $i <= 22; $i++) {
                                                    $selecionado = false;
                                                    foreach ($malhadeiras as $malhadeira) {
                                                        if ($malhadeira == $i)
                                                            $selecionado = true;
                                                    } ?>
                                                    <option value='<?php echo $i; ?>' <?php if ($selecionado) echo 'selected' ?>><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn waves-effect waves-light red control-enabled tooltipped"
                                                    data-tooltip="Clique para deletar o instrumento <?php echo $instr->getDescricao(); ?> da pesca"
                                                    type="button" id="removerInstrumento" name="removerInstrumento"
                                                    onclick="removeInstrumento(<?php echo $pescaInst->getIdinstrumento(); ?>)"
                                                    disabled><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <div class="card z-depth-3">
                    <div class="card-content" id='peixesColetados'>
                        <span class="card-title">Peixes Coletados</span>
                        <div class='row'>
                            <div class="input-field col s8 m10">
                                <select id="especiePeixe" name="especiePeixe" class="control-enabled" disabled>
                                    <option value='0' disabled selected id="selecionePeixe">Selecione</option>
                                    <?php foreach ($especies as $especie) {
                                        $selecionado = false;
                                        foreach ($pescaEspecie as $pescaEsp) {
                                            if ($pescaEsp->getIdespecie() == $especie->getId())
                                                $selecionado = true;
                                        } ?>
                                        <option id='esp<?php echo $especie->getId(); ?>'
                                                value='<?php echo $especie->getId(); ?>'><?php echo $especie->getNomePopular() . ' (' . $especie->getGenero() . ' ' . $especie->getEspecie() . ' )'; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="especiePeixe">Peixes Coletados:</label>
                            </div>
                            <div class='input-field col s4 m2 center'>
                                <button class="btn waves-effect waves-light bt-default control-enabled tooltipped"
                                        data-tooltip="Selecione uma espécie e clique para adiciona-la" type="button"
                                        name="AdicionarPeixe" id="AdicionarPeixe" disabled><i
                                            class="material-icons">add</i></button>
                            </div>
                        </div>
                        <div class='row'>
                            <table class="highlight centered responsive-table">
                                <thead>
                                <tr>
                                    <th>Peixe</th>
                                    <th>Arte da Pesca</th>
                                    <th>Medição</th>
                                    <th>Fator kg/Cambo</th>
                                    <th>Quantidade Vendida</th>
                                    <th>Preço de Venda</th>
                                    <th>Quantidade Consumida</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="peixeForm">
                                <?php
                                $auxAddPeixe = 0;
                                foreach ($pescaEspecie as $pescaEsp) {
                                    $especie = $controllerEspecie->getAction()->getById($pescaEsp->getIdespecie()); ?>
                                    <tr id="<?php echo $pescaEsp->getIdespecie(); ?>">
                                        <input type="hidden" name="addPeixeIdEspecie<?php echo $auxAddPeixe; ?>" value="<?php echo $pescaEsp->getIdespecie(); ?>">
                                        <td class="table-peixe table-peixe-esp">
                                            <select name="peixes[]" disabled>
                                                <option id="<?php echo $pescaEsp->getIdespecie(); ?>"
                                                        value='<?php echo $auxAddPeixe; ?>'><?php echo $especie->getNomepopular() . ' (' . $especie->getGenero() . ' ' . $especie->getEspecie() . ')'; ?></option>
                                            </select>
                                        </td>
                                        <td class="table-peixe"><input
                                                    id="artepeixes<?php echo $pescaEsp->getIdespecie(); ?>"
                                                    value="<?php echo $pescaEsp->getArte(); ?>"
                                                    class="table-peixe control-enabled" type="text"
                                                    name="artepeixes<?php echo $auxAddPeixe; ?>" disabled/></td>

                                        <td>
                                            <div class="table-peixe">
                                                <select name="tipoMedicao<?=$auxAddPeixe?>" id="tipoMedicao<?php echo $pescaEsp->getIdespecie(); ?>" class="control-enabled" disabled>
                                                    <?php foreach (TipoMedicao::TIPOS as $tipo) {?>
                                                        <option value="<?=$tipo['id']?>" <?php echo $tipo['id'] == $pescaEsp->getTipoMedicao() ? "selected" : "";?>><?=$tipo['descricao']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="table-peixe">
                                            <input id="fator<?php echo $pescaEsp->getIdespecie(); ?>" value="<?php echo str_replace('.', ',', $pescaEsp->getFator()); ?>"
                                                class="dinheiro table-peixe control-enabled" type="text" name="fator<?php echo $auxAddPeixe; ?>" min="0" disabled/>
                                        </td>
                                        <td class="table-peixe validate">
                                            <input id="qtdvendida<?php echo $pescaEsp->getIdespecie(); ?>" value="<?php echo $pescaEsp->getQtdvendida(); ?>" class="table-peixe control-enabled validate"
                                                    type="number" step="0.001" name="qtdvendida<?php echo $auxAddPeixe; ?>" min="0" max="2000" disabled/>
                                        </td>
                                        <td class="table-peixe">
                                            <input id="preco<?php echo $pescaEsp->getIdespecie(); ?>" value="<?php echo str_replace('.', ',', $pescaEsp->getPreco()); ?>"
                                                   class="dinheiro table-peixe control-enabled" type="text" name="preco<?php echo $auxAddPeixe; ?>" disabled/>
                                        </td>
                                        <td class="table-peixe validate">
                                            <input id="qtdconsumida<?php echo $pescaEsp->getIdespecie(); ?>" value="<?php echo $pescaEsp->getQtdconsumida(); ?>" class="table-peixe control-enabled validate"
                                                   type="number" step="0.001" name="qtdconsumida<?php echo $auxAddPeixe; ?>" min="0" max="2000" disabled/>
                                        </td>
                                        <td>
                                            <button class="btn waves-effect waves-light red control-enabled tooltipped"
                                                    data-tooltip="Clique para deletar a especie <?php echo $especie->getNomepopular() . ' (' . $especie->getGenero() . ' ' . $especie->getEspecie() . ')'; ?> da pesca"
                                                    type="button" id="removerPeixe" name="removerPeixe"
                                                    onclick="removePeixe(<?php echo $pescaEsp->getIdespecie(); ?>)"
                                                    disabled><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                <?php
                                    $auxAddPeixe++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <div class="card z-depth-3">
                    <div class="card-content" id='contabilizacao'>
                        <span class="card-title">Contabilização</span>
                        <div class="row">
                            <div class='input-field col s12 m3'>
                                <input id="valorGelo" value="<?php echo str_replace('.', ',', $pesca->getGelo()); ?>"
                                       class=" control-enabled" type="text" name="valorGelo" disabled>
                                <label for="valorGelo">Gelo (R$ 0,0):</label>
                            </div>
                            <div class='input-field col s12 m3'>
                                <input id="valorRancho"
                                       value="<?php echo str_replace('.', ',', $pesca->getAlimento()); ?>"
                                       class=" control-enabled" type="text" name="valorRancho" disabled>
                                <label for="valorRancho">Rancho (R$ 0,0):</label>
                            </div>
                            <div class='input-field col s12 m3'>
                                <input id="valorCombustivel"
                                       value="<?php echo str_replace('.', ',', $pesca->getCombustivel()); ?>"
                                       class=" control-enabled" type="text" name="valorCombustivel" disabled>
                                <label for="valorCombustivel">Combustível (R$ 0,0):</label>
                            </div>
                            <div class='input-field col s12 m3'>
                                <input id="valorOutro"
                                       value="<?php echo str_replace('.', ',', $pesca->getOutrosGastos()); ?>"
                                       class=" control-enabled" type="text" name="valorOutro" disabled>
                                <label for="valorOutro">Outros (R$ 0,0):</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12 m4'>
                                <input id="qtdPescadores" value="<?php echo $pesca->getNumpescadores(); ?>"
                                       class="validate control-enabled" required aria-required="true" type="number"
                                       name="qtdPescadores" maxlength="200" disabled/>
                                <label for="qtdPescadores">Quantidade de pescadores:</label>
                            </div>
                            <div class='input-field col s12 m4'>
                                <select class="control-enabled" name='tipoComprador[]' id='tipoComprador' multiple
                                        disabled>
                                    <?php
                                    foreach ($tiposcomprador as $tipocomprador) {
                                        $selecionado = false;

                                        foreach ($pescaComprador as $comprador) {
                                            $selecionado = ($tipocomprador->getId() == $comprador->getIdtipocomprador()) ? true : false;
                                            if ($selecionado) break;
                                        }
                                        ?>
                                        <option value='<?php echo $tipocomprador->getId(); ?>' <?php if ($selecionado) echo 'selected'; ?>><?php echo $tipocomprador->getDescricao(); ?></option>
                                    <?php } ?>
                                </select>
                                <label for='tipoComprador'>Vendido para:</label>
                            </div>
                            <div class='input-field col s12 m4'>
                                <input id="valorGasto"
                                       value="<?php echo str_replace('.', ',', $pesca->getValorcusto()) ?>"
                                       class=" control-enabled" type="text" name="valorGasto" disabled/>
                                <label class="active" for="valorGasto">Valor gasto / Custo (R$ 0,0):</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12 m4'>
                                <input id="kgConsumido" value="<?php echo $pesca->getPesoconsumido(); ?>"
                                       class="control-enabled" type="number" step="0.001" name="kgConsumido"
                                       maxlength="200" disabled/>
                                <label for="kgConsumido">Total Consumido (Kg):</label>
                            </div>
                            <div class='input-field col s12 m4'>
                                <input id="kgVendido" value="<?php echo $pesca->getPesovendido(); ?>"
                                       class="control-enabled" type="number" step="0.001" name="kgVendido"
                                       maxlength="200" disabled/>
                                <label for="kgVendido">Total Vendido (Kg):</label>
                            </div>
                            <div class='input-field col s12 m4'>
                                <input id="valorVendido"
                                       value="<?php echo str_replace('.', ',', $pesca->getValorvenda()); ?>"
                                       class="control-enabled" type="text" name="valorVendido" disabled/>
                                <label class="active" for="valorVendido">Valor arrecadado (R$ 0,0):</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="row">

                <div>
                    <button class="btn waves-effect waves-light bt-default col s1" type="button" id="voltar"
                            name="voltar"
                            onclick="document.getElementById('form-voltar').submit();">Voltar
                    </button>
                </div>
                <div class="col s1"></div>
                <div class="col s1"></div>
                <!--voltando-->
                <?php
                    Session::start();
                    if (Session::get('72033f2bbd0a0891df6f24ee5eebfa6e')) {
                        if (in_array(Session::get('idperfil'), array(Perfil::ADMINISTRADOR))) { ?>
                            <div>
                                <button class="btn #e53935 red darken-1 col s2" type="button" id="desativar" name="excluir">
                                    <?php echo $pesca->getAtivo() ? 'Desativar' : 'Ativar'; ?>
                                </button>
                            </div>
                        <?php
                        }
                        if (in_array(Session::get('idperfil'), array(Perfil::ADMINISTRADOR , Perfil::DOCENTE))) { ?>
                            <div class="col s1"></div>
                            <div class="col s1"></div>
                            <div>
                                <button class="btn cyan darken-4 col s1" type="button" id="editar" name="editar">Editar</button>
                            </div>
                            <div class="col s1"></div>
                            <div class="col s1"></div>
                            <div class="col s1"></div>

                            <div>
                                <button class="btn light-green darken-4 col s1" type="submit" id="salvar" name="update-detalhes"
                                        disabled>Salvar
                                </button>
                                <input type="hidden" name="pescador" value="<?php echo $_POST['pescador'] ?>">
                                <input type="hidden" name="byPescador" value="<?php echo $_POST['byPescador'] ?>">
                                <input type="hidden" name="comunidade" value="<?php echo $_POST['comunidade'] ?>">
                                <input type="hidden" name="byComunidade" value="<?php echo $_POST['byComunidade'] ?>">
                                <input type="hidden" name="porto" value="<?php echo $_POST['porto'] ?>">
                                <input type="hidden" name="byPorto" value="<?php echo $_POST['byPorto'] ?>">
                                <input type="hidden" name="rio" value="<?php echo $_POST['rio'] ?>">
                                <input type="hidden" name="byRio" value="<?php echo $_POST['byRio'] ?>">
                                <input type="hidden" name="acampamento" value="<?php echo $_POST['acampamento'] ?>">
                                <input type="hidden" name="byAcampamento" value="<?php echo $_POST['byAcampamento'] ?>">
                                <input type="hidden" name="pesqueiro" value="<?php echo $_POST['pesqueiro'] ?>">
                                <input type="hidden" name="byPesqueiro" value="<?php echo $_POST['byPesqueiro'] ?>">
                                <input type="hidden" name="quant_pescadores" value="<?php echo $_POST['quant_pescadores'] ?>">
                                <input type="hidden" name="byQuantPescadores" value="<?php echo $_POST['byQuantPescadores'] ?>">
                                <input type="hidden" name="idAmbiente" value="<?php echo $_POST['idAmbiente'] ?>">
                                <input type="hidden" name="byIdAmbiente" value="<?php echo $_POST['byIdAmbiente'] ?>">
                                <input type="hidden" name="instrumento" value="<?php echo $_POST['instrumento'] ?>">
                                <input type="hidden" name="byInstrumento" value="<?php echo $_POST['byInstrumento'] ?>">
                                <input type="hidden" name="embarcacao" value="<?php echo $_POST['embarcacao'] ?>">
                                <input type="hidden" name="byEmbarcacao" value="<?php echo $_POST['byEmbarcacao'] ?>">
                                <input type="hidden" name="data_inicial" value="<?php echo $_POST['data_inicial'] ?>">
                                <input type="hidden" name="byDataInicial" value="<?php echo $_POST['byDataInicial'] ?>">
                                <input type="hidden" name="data_final" value="<?php echo $_POST['data_final'] ?>">
                                <input type="hidden" name="byDataFinal" value="<?php echo $_POST['byDataFinal'] ?>">
                                <input type="hidden" name="byInstituicao" value="<?php echo $_POST['byInstituicao']?>">
                                <input type="hidden" name="idInstituicao" value="<?php echo $_POST['idInstituicao']?>">
                                <input type="hidden" name="byAtivo" value="<?php echo $_POST['byAtivo']?>">
                                <input type="hidden" name="pescaAtiva" value="<?php echo $_POST['pescaAtiva'] ?>">
                                <input type="hidden" name="ConsultarPesca" value="1">
                            </div>
                        <?php
                        }
                    }
                ?>
            </div>
        </div>
    </form>
    <form method="post" name="form" id="form-voltar" action='index.php?action=consultas'>
        <input type="hidden" name="pescador" value="<?php echo $_POST['pescador'] ?>">
        <input type="hidden" name="byPescador" value="<?php echo $_POST['byPescador'] ?>">
        <input type="hidden" name="comunidade" value="<?php echo $_POST['comunidade'] ?>">
        <input type="hidden" name="byComunidade" value="<?php echo $_POST['byComunidade'] ?>">
        <input type="hidden" name="porto" value="<?php echo $_POST['porto'] ?>">
        <input type="hidden" name="byPorto" value="<?php echo $_POST['byPorto'] ?>">
        <input type="hidden" name="rio" value="<?php echo $_POST['rio'] ?>">
        <input type="hidden" name="byRio" value="<?php echo $_POST['byRio'] ?>">
        <input type="hidden" name="acampamento" value="<?php echo $_POST['acampamento'] ?>">
        <input type="hidden" name="byAcampamento" value="<?php echo $_POST['byAcampamento'] ?>">
        <input type="hidden" name="pesqueiro" value="<?php echo $_POST['pesqueiro'] ?>">
        <input type="hidden" name="byPesqueiro" value="<?php echo $_POST['byPesqueiro'] ?>">
        <input type="hidden" name="quant_pescadores" value="<?php echo $_POST['quant_pescadores'] ?>">
        <input type="hidden" name="byQuantPescadores" value="<?php echo $_POST['byQuantPescadores'] ?>">
        <input type="hidden" name="idAmbiente" value="<?php echo $_POST['idAmbiente'] ?>">
        <input type="hidden" name="byIdAmbiente" value="<?php echo $_POST['byIdAmbiente'] ?>">
        <input type="hidden" name="instrumento" value="<?php echo $_POST['instrumento'] ?>">
        <input type="hidden" name="byInstrumento" value="<?php echo $_POST['byInstrumento'] ?>">
        <input type="hidden" name="embarcacao" value="<?php echo $_POST['embarcacao'] ?>">
        <input type="hidden" name="byEmbarcacao" value="<?php echo $_POST['byEmbarcacao'] ?>">
        <input type="hidden" name="data_inicial" value="<?php echo $_POST['data_inicial'] ?>">
        <input type="hidden" name="byDataInicial" value="<?php echo $_POST['byDataInicial'] ?>">
        <input type="hidden" name="data_final" value="<?php echo $_POST['data_final'] ?>">
        <input type="hidden" name="byDataFinal" value="<?php echo $_POST['byDataFinal'] ?>">
        <input type="hidden" name="byInstituicao" value="<?php echo $_POST['byInstituicao']?>">
        <input type="hidden" name="idInstituicao" value="<?php echo $_POST['idInstituicao']?>">
        <input type="hidden" name="byAtivo" value="<?php echo $_POST['byAtivo']?>">
        <input type="hidden" name="pescaAtiva" value="<?php echo $_POST['pescaAtiva'] ?>">
        <input type="hidden" name="ConsultarPesca" value="1">
    </form>
    <br>
</div>

<script type="text/javascript" src="../../scripts/Validate.js"></script>
<script type='text/javascript'>
    var auxEmb = <?php echo $emb;?>;
    var auxAca = <?php echo $acam; ?>;
    var auxAddPeixe = <?php echo $auxAddPeixe; ?>;
    var formAca = [];
    var formEmb = [];

    for (i = 0; i < auxEmb; i++) {
        formEmb.push(i.toString());
    }
    for (i = 0; i < auxAca; i++) {
        formAca.push(i.toString());
    }

    $('#editar').on('click', function () {
        $('.control-enabled').removeAttr('disabled');
        $('#salvar').removeAttr('disabled');
        $('select').material_select();
        $('.tooltipped').tooltip();
    });

    $('#desativar').on('click', function () {
        var r = confirm("Confirma a mudança de status?");
        if(r == true){
            $.ajax({
                url: "<?php echo $pesca->getAtivo()  ? 'desativarFormPescaScript.php' : 'ativarFormPescaScript.php';?>",
                type: 'post',
                data: {idPescaAjax: <?php echo $idPesca; ?>},

                success: function () {
                    //se obter sucesso na exlusao
                    document.getElementById('form-voltar').submit();
                }
            });
        }
    });

    // caixa
    // de
    // confirmacao
    $('#excluir').on('click', function () {

        //inicio - caixa dialogo
        $("#msgExcluir").dialog({
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons: {
                "Sim": function () {

                    $.ajax({
                        url: "desativarFormPescaScript.php",
                        type: 'post',
                        data: {idPescaAjax: <?php echo $idPesca; ?>},

                        success: function () {

                            //se obter sucesso na exlusao
                            $(function (result) {
                                $("#dialog-message").dialog({
                                    modal: true,
                                    buttons: {
                                        Ok: function () {

                                            $(this).dialog("close");
                                            document.getElementById('form-voltar').submit();
                                        }
                                    }
                                });
                            });
                        }

                    });

                },
                Cancel: function () {
                    $(this).dialog("close");
                }
            }
        });
        //final - caixa dialogo

    });


    function addEstrategia(x) {
        $.ajax({
            url: "estrategiaScript.php",
            type: "POST",
            data: {
                idInstrumento: x
            }
        }).done(function (result) {
            if (result != '') {
                var objs = jQuery.parseJSON(result);
                $('#estrategia' + x).removeAttr('disabled');
                $('#estrategia' + x).append('<option value="0" selected disabled>Selecione</option>');
                $(objs).each(function (index, value) {
                    $('#estrategia' + x).append('<option value="' + value.id + '">' + value.descricao + '</option>');
                });
                $('select').material_select();
            }
        });
    }

    function addCidadesByEstado(x) {
        $.ajax({
            url: "cidadeScript.php",
            type: "POST",
            data: {
                idEstado: x
            }
        }).done(function (result) {
            if (result != '') {
                var objs = jQuery.parseJSON(result);
                $('#cidade').removeAttr('disabled');
                $('#cidade').append('<option value="0" selected disabled>Selecione</option>');
                $(objs).each(function (index, value) {
                    $('#cidade').append('<option value="' + value.id + '">' + value.descricao + '</option>');
                });
                $('select').material_select();
            }
        });
    }

    $('select[name=estado]').change(function (event) {
        var estado = $('#estado option:selected');
        $('#cidade').empty();
        addCidadesByEstado(estado.val());
    });

    $('html').on('click', '#removerEmbarcacao', function () {
        $('.tooltipped').tooltip('remove');
        $('.tooltipped').tooltip();
        var pid = $(this).parent().parent().attr("id");
        var id = pid.split('_')[1];
        formEmb.splice(formEmb.indexOf(id), 1);
        document.getElementById(pid).remove();
    });

    function removePeixe(x) {
        $('.tooltipped').tooltip('remove');
        $('.tooltipped').tooltip();
        document.getElementById(x).remove();
        document.getElementById('esp' + x).removeAttribute('disabled');
        $('select').material_select();
    }

    function removeInstrumento(x) {
        $('.tooltipped').tooltip('remove');
        $('.tooltipped').tooltip();
        document.getElementById(x).remove();
        document.getElementById('instr' + x).removeAttribute('disabled');
        $('select').material_select();
    }

    $(document).ready(function () {
        $('.dinheiro').maskMoney({
            thousands: '.',
            decimal: ','
        });
    });


    $('#horaInicio').on("change", function () {
        if ($('#horaInicio').val() != null && $('#horaFim').val() != null) {
            var inicio, fim, aInicio, aFim, tempo;
            inicio = $('#horaInicio').val();
            aInicio = inicio.split(":");
            fim = $('#horaFim').val();
            aFim = fim.split(":");
            if (aInicio[1] > aFim[1]) {
                aFim[1] = parseInt(aFim[1]) + 60;
                aFim[0] = parseInt(aFim[0]) - 1;
            }
            if (aInicio[0] > aFim[0]) {
                aFim[0] = parseInt(aFim[0]) + 24;
            }
            hora = aFim[0] - aInicio[0];
            minuto = aFim[1] - aInicio[1];
            tempo = '';
            if (hora < 10) {
                tempo += '0';
            }
            tempo += hora + ':';
            if (minuto < 10) {
                tempo += '0';
            }
            tempo += minuto;
            $('#tempoTotal').val(tempo);
        }
    });
    $('#horaFim').on("change", function () {
        if ($('#horaFim').val() != null && $('#horaInicio').val() != null) {
            var inicio, fim, aInicio, aFim, tempo, hora, minuto;
            inicio = $('#horaInicio').val();
            aInicio = inicio.split(":");
            fim = $('#horaFim').val();
            aFim = fim.split(":");
            if (aInicio[1] > aFim[1]) {
                aFim[1] = parseInt(aFim[1]) + 60;
                aFim[0] = parseInt(aFim[0]) - 1;
            }
            if (aInicio[0] > aFim[0]) {
                aFim[0] = parseInt(aFim[0]) + 24;
            }
            hora = aFim[0] - aInicio[0];
            minuto = aFim[1] - aInicio[1];
            tempo = '';
            if (hora < 10) {
                tempo += '0';
            }
            tempo += hora + ':';
            if (minuto < 10) {
                tempo += '0';
            }
            tempo += minuto;
            $('#tempoTotal').val(tempo);
        }
    });

    $('#AdicionarEmbarcacao').on('click', function () {
        $('#embForm').append(
            '<tr id="emb_' + auxEmb + '">' +
            '<td class="table-emb"><select name="tipoEmbarcacao_' + auxEmb + '" class="table-emb" required aria-required="true" id="tipoEmbarcacao_' + auxEmb + '">' +
            '<option value="0" disabled selected>Escolha uma ou mais opções</option>' +
            '<?php foreach ($embarcacoes as $embarcacao) { ?>' +
            '<option value="<?php echo $embarcacao->getId(); ?>""><?php echo $embarcacao->getDescricao(); ?></option>' +
            '<?php } ?>' +
            '</select></td>' +
            '<td class="table-emb"><input id="tamEmbarcacao_' + auxEmb + '" class="validate table-emb" step="0.001" type="number" name="tamEmbarcacao_' + auxEmb + '"/></td>' +
            '<td class="table-emb"><input id="potEmbarcacao_' + auxEmb + '" class="validate table-emb" step="0.001" type="number" name="potEmbarcacao_' + auxEmb + '"/></td>' +
            '<td><button class="btn waves-effect waves-light red tooltipped" data-tooltip="Clique para deletar a embarcação" type="button" id="removerEmbarcacao" name="removerEmbarcacao"><i class="material-icons">delete</i></button></td>' +
            '</tr>'
        );
        $('select').material_select();
        $('.tooltipped').tooltip();
        formEmb.push(auxEmb.toString());
        auxEmb++;
    });

    $('#AdicionarInstrumento').on('click', function () {
        var idInstrumento = $('#instrumentosPesca option:selected');
        if (idInstrumento.val() != '0') {
            idInstrumento.attr("disabled", true);
            var optMalhadeira = '';
            var optQtd = '';
            $('#instrForm').append(
                '<tr id="' + idInstrumento.val() + '">' +
                '<td class="table-instr">' +
                '<select name="instrumentos[]" disabled>' +
                '<option value="' + idInstrumento.val() + '" type="text">' + idInstrumento.text() + '</option>' +
                '<select>' +
                '</td>' +
                '<td id="instrEstrategia' + idInstrumento.val() + '" class="table-instr">' +
                '<select id="estrategia' + idInstrumento.val() + '" name="estrategia' + idInstrumento.val() + '" disabled>' +
                '<select>' +
                '</td>' +
                '<td class="table-instr"><input id="qtd' + idInstrumento.val() + '" class="validate table-instr" type="number" min="1" name="qtd' + idInstrumento.val() + '" ' + optQtd + '/></td>' +
                '<td class="table-instr">' +
                "<select name='tipoMalha"+idInstrumento.val()+"[]' id='tipoMalha' multiple " + optMalhadeira + ">" +
                "<option value='0' disabled selected></option>" +
                "<option value='3'>3</option>" +
                "<option value='4'>4</option>" +
                "<option value='5'>5</option>" +
                "<option value='6'>6</option>" +
                "<option value='7'>7</option>" +
                "<option value='8'>8</option>" +
                "<option value='9'>9</option>" +
                "<option value='10'>10</option>" +
                "<option value='11'>11</option>" +
                "<option value='12'>12</option>" +
                "<option value='13'>13</option>" +
                "<option value='14'>14</option>" +
                "<option value='15'>15</option>" +
                "<option value='16'>16</option>" +
                "<option value='17'>17</option>" +
                "<option value='18'>18</option>" +
                "<option value='19'>19</option>" +
                "<option value='20'>20</option>" +
                "<option value='21'>21</option>" +
                "<option value='22'>22</option>" +
                "</select>" +
                '</td>' +
                '<td><button class="btn waves-effect waves-light red tooltipped" data-tooltip="Clique para deletar o instrumento ' + idInstrumento.text() + ' da pesca" type="button" id="removerPeixe" name="removerPeixe" onclick="removeInstrumento(' + idInstrumento.val() + ')"><i class="material-icons">delete</i></button></td>' +
                '</tr>'
            );
            addEstrategia(idInstrumento.val());
            $('#instrumentosPesca option').eq('0').attr('disabled', false);
            $('#instrumentosPesca').val('0').change();
            $('#instrumentosPesca option').eq('0').attr('disabled', true);
            $('select').material_select();
            $('.tooltipped').tooltip();
        }
    });

    $('#AdicionarPeixe').on('click', function () {
        var idPeixe = $('#especiePeixe option:selected');
        if (idPeixe.val() != '0') {
            //idPeixe.attr("disabled", true);
            $('#peixeForm').append(
                '<tr id="addPeixe' + auxAddPeixe + '">' +
                '<td class="table-peixe table-peixe-esp">' +
                '<select name="peixes[]" disabled>' +
                '<option value="' + auxAddPeixe + '" type="text">' + idPeixe.text() + '</option>' +
                '<select>' +
                '</td>' +
                '<td class="table-peixe"><input id="artepeixes' + auxAddPeixe + '" class="validate table-peixe" type="text" name="artepeixes' + auxAddPeixe + '" maxlength="3"/></td>' +
                '<td><div class="table-peixe">' +
                '<select name="tipoMedicao' + auxAddPeixe +'" id="tipoMedicao' + auxAddPeixe +'">' +
                <?php foreach (TipoMedicao::TIPOS as $tipo) {
                    echo '\'<option value="' . $tipo['id'] . '">' . $tipo['descricao'] . '</option>\'+';
                }?>
                '</select>'+
                '</div></td>' +
                '<td class="table-peixe"><input id="fator' + auxAddPeixe + '" class="validate dinheiro table-peixe" type="text" name="fator' + auxAddPeixe + '"/></td>' +
                '<td class="table-peixe"><input id="qtdvendida' + auxAddPeixe + '" class="validate table-peixe" type="number" step="0.001" name="qtdvendida' + auxAddPeixe + '" min="0" max="9999"/></td>' +
                '<td class="table-peixe"><input id="preco' + auxAddPeixe + '" class="validate dinheiro table-peixe" type="text" name="preco' + auxAddPeixe + '"/></td>' +
                '<td class="table-peixe"><input id="qtdconsumida' + auxAddPeixe + '" class="validate table-peixe" type="number" step="0.001" name="qtdconsumida' + auxAddPeixe + '" min="0" max="9999"/></td>' +
                '<td><button class="btn waves-effect waves-light red tooltipped" data-tooltip="Clique para deletar a espécie ' + idPeixe.text() + ' da pesca" type="button" id="removerPeixe" name="removerPeixe" onclick="removePeixe(' + auxAddPeixe + ')"><i class="material-icons">delete</i></button></td>' +
                '<input type="hidden" name="addPeixeIdEspecie' + auxAddPeixe + '" value="' + idPeixe.val() + '">' +
                '</tr>'
            );
            $('.dinheiro').maskMoney({
                thousands: '.',
                decimal: ','
            });
            //$('#especiePeixe option').eq('0').attr('disabled', false);
            //$('#especiePeixe').val('0').change();
            //$('#especiePeixe option').eq('0').attr('disabled', true);
            $('select').material_select();
            $('.tooltipped').tooltip({
                outDuration: 0
            });
        }
        auxAddPeixe++;
    });

    $("select[name='idEstado']").change(function (event) {
        var estado = $(this, event).val();
        $("select[name='idCidade']").empty();

        $.getJSON('../../view/admin/cidades.php', {
            estado: estado
        }, function (data) {
            var option = new Array();
            $.each(data, function (i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value: obj.id
                });
                $(option[i]).append(obj.descricao);
                $("select[name='idCidade']").append(option[i]);
            });
        });
    });

    $('#salvar').on('click', function () {
        $('[name="instrumentos[]"]').removeAttr('disabled');
        $('[name="peixes[]"]').removeAttr('disabled');
        formEmb.forEach(function (value) {
            $('<input type="hidden">').attr({
                name: 'idsEmbarcacoes[]',
                value: value
            }).appendTo('[name="form"]');
        });
        formAca.forEach(function (value) {
            $('<input type="hidden">').attr({
                name: 'idsAcampamentos[]',
                value: value
            }).appendTo('[name="form"]');
        });
    });

    $(function () {
        $('#nomePescador').autocomplete({
            data: {
                <?php
                $stringPescadores = '';
                foreach ($pescador as $unidadePescador)
                    $stringPescadores .= '"' . $unidadePescador->getNomePescador() . '":null,';
                echo substr($stringPescadores, 0, -1);
                ?>
            },
            minLength: 1
        });
        $('#nomePorto').autocomplete({
            data: {
                <?php
                $stringPorto = '';
                foreach ($portos as $porto)
                    $stringPorto .= '"' . $porto->getNomePorto() . '":null,';
                echo substr($stringPorto, 0, -1);
                ?>
            },
            minLength: 1
        });
        $('#nomeRio').autocomplete({
            data: {
                <?php
                $stringRios = '';
                foreach ($rios as $rio)
                    $stringRios .= '"' . $rio->getNomeRio() . '":null,';
                echo substr($stringRios, 0, -1);
                ?>
            },
            minLength: 1
        });
        $("body").on("focus.autocomplete", "[id^=nomeAcampamento]", function () {
            $(this).autocomplete({
                data: {
                    <?php
                    $stringAcampamento = '';
                    foreach ($acampamentos as $acampamento)
                        $stringAcampamento .= '"' . $acampamento->getNome() . '":null,';
                    echo substr($stringAcampamento, 0, -1);
                    ?>
                },
                minLength: 1
            });
        });

        $("body").on("focus.autocomplete", "[id^=nomePesqueiro]", function () {
            $(this).autocomplete({
                data: {
                    <?php
                    $stringPesqueiros = '';
                    foreach ($pesqueiros as $pesqueiro) {
                        if ($pesqueiro->getNomePesqueiro()!=null && $pesqueiro->getNomePesqueiro()!='')
                            $stringPesqueiros .= '"' . $pesqueiro->getNomePesqueiro() . '":null,';
                    }
                    echo substr($stringPesqueiros, 0, -1);
                    ?>
                },
                minLength: 1
            });
        });
    });
    $('select').material_select();

    $('#AdicionarAcampamento').on('click', function () {
        $('#acampForm').append(
            '<tr id=aca_' + auxAca + '>'+
            '<td><input class="" id="nomeAcampamento_' + auxAca + '"'+
            'type="text" name="nomeAcampamento_' + auxAca + '"'+
            'size="100" min="1" max="200" autocomplete="off"/></td>'+
            '<td><input class="validate" id="nomePesqueiro_' + auxAca + '"'+
            'type="text" name="nomePesqueiro_' + auxAca + '"'+
            'size="100" min="1" max="200" autocomplete="off"/></td>'+

            '<td class="table-instr"><select id="ambiente" name="ambiente_' + auxAca + '[]" multiple>'+
            '<option value="" disabled selected>Selecione</option>'+
            <?php foreach ($ambientes as $ambiente) { ?>
            '<option value="<?php echo $ambiente->getId(); ?>"><?php echo $ambiente->getDescricao(); ?></option>'+
            <?php } ?>
            '</select></td>'+
            '<td><button class="btn waves-effect waves-light red tooltipped" data-tooltip="Clique para deletar o acampamento" type="button" id="removerAcampamento" name="removerAcampamento"><i class="material-icons">delete</i></button></td>'
        );
        $('select').material_select();
        formAca.push(auxAca.toString());
        auxAca++;
    });

    $('html').on('click', '#removerAcampamento', function () {
        $('.tooltipped').tooltip('remove');
        $('.tooltipped').tooltip();
        var pid = $(this).parent().parent().attr("id");
        var id = pid.split('_')[1];
        formAca.splice(formAca.indexOf(id), 1);
        document.getElementById(pid).remove();
    });

    function calculaKgConsumido() {
        let a = $('[name="peixes[]"]');
        let b;
        let sum = 0.0;
        for(var i=0; i<a.length; i++) {
            b = $('#qtdconsumida'+a[i].value).val();
            b = b.replace(".", "");
            b = b.replace(",", ".");
            if (b!=null && b!='') {
                if ($('#tipoMedicao'+a[i].value).val()=="2") {
                    sum += parseFloat(b);
                }
                else {
                    let c = $('#fator'+a[i].value).val();
                    if (c!=null && c!='') {
                        c = c.replace(".", "");
                        c = c.replace(",", ".");
                        sum+=parseFloat(b)*parseFloat(c);
                    }
                }
            }
        }
        sum = sum.toFixed(3);
        $('#kgConsumido').val(sum);
    }
    $("body").on("change","[id^='qtdconsumida']",calculaKgConsumido);
    $("body").on("change","[id^='tipoMedicao']",calculaKgConsumido);
    $("body").on("change","[id^='fator']",calculaKgConsumido);

    function calculaKgVendido() {
        let a = $('[name="peixes[]"]');
        let b;
        let sum = 0.0;
        for(var i=0; i<a.length; i++) {
            b = $('#qtdvendida'+a[i].value).val();
            b = b.replace(".", "");
            b = b.replace(",", ".");
            if (b!=null && b!='') {
                if ($('#tipoMedicao'+a[i].value).val()=="2") {
                    sum += parseFloat(b);
                }
                else {
                    let c = $('#fator'+a[i].value).val();
                    if (c!=null && c!='') {
                        c = c.replace(".", "");
                        c = c.replace(",", ".");
                        sum+=parseFloat(b)*parseFloat(c);
                    }
                }
            }
        }
        sum = sum.toFixed(3);
        $('#kgVendido').val(sum);
    }
    $("body").on("change","[id^='qtdvendida']",calculaKgVendido);
    $("body").on("change","[id^='tipoMedicao']",calculaKgVendido);
    $("body").on("change","[id^='fator']",calculaKgVendido);

    function calculaValorVendido() {
        let a = $('[name="peixes[]"]');
        let b; let c; let d;
        let sum = 0.0;
        for(var i=0; i<a.length; i++) {
            b = $('#preco'+a[i].value).val();
            b = b.replace(".", "");
            b = b.replace(",", ".");
            if (b!=null && b!='') {
                c = $('#qtdvendida'+a[i].value).val();
                c = c.replace(".", "");
                c = c.replace(",", ".");
                if (c!=null && c!='') {
                    if ($('#tipoMedicao' + a[i].value).val() == "2") {
                        sum += parseFloat(b)*parseFloat(c);
                    } else {
                        d = $('#fator' + a[i].value).val();
                        if (d != null && d != '') {
                            d = d.replace(".", "");
                            d = d.replace(",", ".");
                            sum += parseFloat(b) * parseFloat(c) * parseFloat(d);
                        }
                    }
                }
            }
        }
        sum = sum.toFixed(2).toString().replace(",","").replace(".",",");
        $('#valorVendido').val(sum);
    }
    $("body").on("change","[id^='qtdvendida']",calculaValorVendido);
    $("body").on("change","[id^='preco']",calculaValorVendido);
    $("body").on("change","[id^='tipoMedicao']",calculaValorVendido);
    $("body").on("change","[id^='fator']",calculaValorVendido);

    $('#diaSemana').on("change", function () {
        var count = $('#diaSemana option:selected').length-1;
        console.log(count);
        $('#qtdDias').val(count);
    });

    function valorGasto() {
        let g = $('#valorGelo').val();
        let r = $('#valorRancho').val();
        let c = $('#valorCombustivel').val();
        let o = $('#valorOutro').val();
        if (g!=null && g!='') {
            g = g.replace(".","");
            g = g.replace(",",".");
            g = parseFloat(g);
        }
        else g = 0.0;
        if (r!=null && r!='') {
            r = r.replace(".","");
            r = r.replace(",",".");
            r = parseFloat(r);
        }
        else r = 0.0;
        if (c!=null && c!='') {
            c = c.replace(".","");
            c = c.replace(",",".");
            c = parseFloat(c);
        }
        else c = 0.0;
        if (o!=null && o!='') {
            o = o.replace(".","");
            o = o.replace(",",".");
            o = parseFloat(o);
        }
        else o = 0.0;
        t = (g+r+c+o).toFixed(2);
        t = t.toString();
        t = t.replace(",","");
        t = t.replace(".",",");
        $('#valorGasto').val(t);
    }
    $('#valorGelo').on("change",valorGasto);
    $('#valorRancho').on("change",valorGasto);
    $('#valorCombustivel').on("change",valorGasto);
    $('#valorOutro').on("change",valorGasto);
</script>

