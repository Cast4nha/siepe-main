<?php
include_once '../../controller/ControllerAcampamento.php';
include_once '../../controller/ControllerAmbiente.php';
include_once '../../controller/ControllerComunidade.php';
include_once '../../controller/ControllerEmbarcacao.php';
include_once '../../controller/ControllerEspecie.php';
include_once '../../controller/ControllerEstado.php';
include_once '../../controller/ControllerEstrategia.php';
include_once '../../controller/ControllerInstrumento.php';
include_once '../../controller/ControllerPesca.php';
include_once '../../controller/ControllerTipoComprador.php';
include_once '../../model/bean/TipoMedicao.php';
$controllerAcampamento = new ControllerAcampamento();
$controllerAmbiente = new ControllerAmbiente();
$controllerComunidade = new ControllerComunidade();
$controllerEmbarcacao = new ControllerEmbarcacao();
$controllerEspecie = new ControllerEspecie();
$controllerEstado = new ControllerEstado();
$controllerEstrategia = new ControllerEstrategia();
$controllerInstrumento = new ControllerInstrumento();
$controllerPesca = new ControllerPesca();
$controllerTipoComprador = new ControllerTipoComprador();
$resultado = $controllerPesca->cadastrar();
$embarcacoes = $controllerEmbarcacao->ListAllEmbarcacao();
$ambientes = $controllerAmbiente->ListAllAmbiente();
$acampamentos = $controllerAcampamento->ListAllNomeAcampamento();
$pesqueiros = $controllerAcampamento->ListAllNomePesqueiro();
$tiposcomprador = $controllerTipoComprador->ListAllTipoComprador();
$instrumentos = $controllerInstrumento->ListAllInstrumentoAtivo();
$especies = $controllerEspecie->ListAllEspecie();
$pescador = $controllerPesca->ListAllPescador();
$rios = $controllerPesca->ListAllRio();
$comunidade = $controllerComunidade->ListAllComunidade();
$portos = $controllerPesca->ListAllPorto();
//$pescadorEmbarcacao = $controllerPescador->getAction()->getAllPescadorEmbarcacao();
$estrategias = $controllerEstrategia->getAction()->getAll();
$estados = $controllerEstado->listAllEstados();

?>
<div class='container'>
    <form method="post" name="form">
        <div class="row">
            <div class="col s12 m12">
                <div id='resultado' class='<?php echo $resultado[0]; ?>'><?php echo $resultado[1]; ?></div>
                <br>
                <h5>Monitoramento Participativo da Pesca</h5>
                <br>
                <div class="card z-depth-3">
                    <div class="card-content">
                        <span class="card-title">Identificação</span>
                        <div class='row'>
                            <div class="input-field col s12 m6">
                                <input id="nomePescador" required aria-required="true" type="text" name="nomePescador" size="100" min="1" max="200" autofocus autocomplete="off"/>
                                <label for="nomePescador">Nome:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="idComunidade" name="idComunidade">
                                    <option value='0' selected disabled>Selecione uma comunidade</option>
                                    <?php foreach ($comunidade as $comu) { ?>
                                        <option value="<?php echo $comu->getId(); ?>"><?php echo $comu->getDescricao(); ?></option>
                                    <?php } ?>
                                </select>
                                <label for="idComunidade">Comunidade:</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input type="date" id="diaInicio" class='validate' name="diaInicio" required>
                                <label class='active' for="diaInicio">Dia do início da pesca:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input type="date" id="diaFim" class='validate' name="diaFim" required>
                                <label class='active' for="diaFim">Dia do fim da pesca:</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <select multiple id="diaSemana" name="diaSemana[]">
                                    <option value="" disabled selected>Selecione os dias</option>
                                    <option value="1">Domingo</option>
                                    <option value="2">Segunda</option>
                                    <option value="3">Terça</option>
                                    <option value="4">Quarta</option>
                                    <option value="5">Quinta</option>
                                    <option value="6">Sexta</option>
                                    <option value="7">Sábado</option>
                                </select>
                                <label>Quais dias você pescou na semana?</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="qtdDias" required aria-required="true" type="number" name="qtdDias" size="1" min="1" max="7" autocomplete="off" value="0"/>
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
                                <input id="nomePorto" class="validate" type="text" name="nomePorto" size="100" min="1" max="200" autocomplete="off"/>
                                <label for="nomePorto">Nome do Porto:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="nomeRio" class="validate" type="text" name="nomeRio" size="100" min="1" max="200" autocomplete="off"/>
                                <label for="nomeRio">Rio:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <select id="estado" name="estado">
                                    <option value='0' disabled selected>Selecione um estado</option>
                                    <?php foreach ($estados as $estado) { ?>
                                        <option value="<?php echo $estado->getId(); ?>"><?php echo $estado->getDescricao(); ?></option>
                                    <?php } ?>
                                </select> <label for="estado">Estado:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="cidade" name="cidade" disabled>
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
                            <button
                                    class="btn waves-effect waves-light bt-default card-button right tooltipped"
                                    data-tooltip="Clique para adicionar uma embarcação"
                                    type="button" name="AdicionarEmbarcacao"
                                    id="AdicionarEmbarcacao">
                                <i class="material-icons">add</i>
                            </button>
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
                                    class="btn waves-effect waves-light bt-default card-button right tooltipped"
                                    data-tooltip="Clique para adicionar um acampamento"
                                    type="button" name="AdicionarAcampamento"
                                    id="AdicionarAcampamento">
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
                                <select id="instrumentosPesca" name="instrumentosPesca[]"
                                        required aria-required="true">
                                    <option value='0' disabled selected>Escolha uma ou mais opções</option>
                                    <?php foreach ($instrumentos as $instrumento) { ?>
                                        <option id='instr<?php echo $instrumento->getId(); ?>'
                                                value='<?php echo $instrumento->getId(); ?>'><?php echo $instrumento->getDescricao(); ?></option>
                                    <?php } ?>
                                </select> <label for="instrumentosPesca">Instrumentos de Pesca:</label>
                            </div>
                            <div class='input-field col s4 m2 center'>
                                <button
                                        class="btn waves-effect waves-light bt-default tooltipped"
                                        data-tooltip="Selecione um tipo de instrumento e clique para adiciona-lo."
                                        type="button" name="AdicionarInstrumento"
                                        id="AdicionarInstrumento">
                                    <i class="material-icons">add</i>
                                </button>
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
                                <select id="especiePeixe" name="especiePeixe">
                                    <option value='0' disabled selected id="selecionePeixe">Selecione</option>
                                    <?php foreach ($especies as $especie) { ?>
                                        <option id='esp<?php echo $especie->getId(); ?>'
                                                value='<?php echo $especie->getId(); ?>'><?php echo $especie->getNomePopular() . ' (' . $especie->getGenero() . ' ' . $especie->getEspecie() . ' ' . $especie->getOrdem() . ' ' . $especie->getFamilia() . ')'; ?></option>
                                    <?php } ?>
                                </select> <label for="especiePeixe">Peixes Coletados:</label>
                            </div>
                            <div class='input-field col s4 m2 center'>
                                <button
                                        class="btn waves-effect waves-light bt-default tooltipped"
                                        data-tooltip="Selecione uma espécie e clique para adiciona-la"
                                        type="button" name="AdicionarPeixe" id="AdicionarPeixe">
                                    <i class="material-icons">add</i>
                                </button>
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
                                <input id="valorGelo" class="validate" type="text" name="valorGelo" value="0,0">
                                <label for="valorGelo">Gelo (R$ 0,0):</label>
                            </div>
                            <div class='input-field col s12 m3'>
                                <input id="valorRancho" class="validate" type="text" name="valorRancho" value="0,0">
                                <label for="valorRancho">Rancho (R$ 0,0):</label>
                            </div>
                            <div class='input-field col s12 m3'>
                                <input id="valorCombustivel" class="validate" type="text" name="valorCombustivel" value="0,0">
                                <label for="valorCombustivel">Combustível (R$ 0,0):</label>
                            </div>
                            <div class='input-field col s12 m3'>
                                <input id="valorOutro" class="validate" type="text" name="valorOutro" value="0,0">
                                <label for="valorOutro">Outros (R$ 0,0):</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12 m4'>
                                <input id="qtdPescadores" class="validate" required aria-required="true" type="number" name="qtdPescadores" min="1" max="200" value="1"/>
                                <label for="qtdPescadores">Quantidade de pescadores:</label>
                            </div>
                            <div class='input-field col s12 m4'>
                                <select name='tipoComprador[]' id='tipoComprador' multiple>
                                    <option value='' disabled selected>Escolha uma ou mais opções</option>
                                    <?php foreach ($tiposcomprador as $tipocomprador) { ?>
                                        <option value='<?php echo $tipocomprador->getId(); ?>'><?php echo $tipocomprador->getDescricao(); ?></option>
                                    <?php } ?>
                                </select>
                                <label for='tipoComprador'>Vendido para:</label>
                            </div>
                            <div class='input-field col s12 m4'>
                                <input id="valorGasto" class="validate" type="text" name="valorGasto" value="0,0"/>
                                <label class="active" for="valorGasto">Valor gasto / Custo (R$ 0,0):</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12 m4'>
                                <input id="kgConsumido" class="validate" type="number" step="0.001" name="kgConsumido" min="0" max="9999" value="0.000"/>
                                <label for="kgConsumido">Total Consumido (Kg):</label>
                            </div>
                            <div class='input-field col s12 m4'>
                                <input id="kgVendido" class="validate" type="number" step="0.001" name="kgVendido" min="0" max="9999" value="0.000"/>
                                <label for="kgVendido">Total Vendido (Kg):</label>
                            </div>
                            <div class='input-field col s12 m4'>
                                <input id="valorVendido" class="validate " type="text" name="valorVendido" value="0,0"/>
                                <label class="active" for="valorVendido">Valor arrecadado (R$ 0,0):</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="center">
            <!-- 		<input type="hidden" name="idsPeixes[]" id="idsPeixes"/> -->
            <!--  		<input type="hidden" name="idsEmbarcacao[]" id="idsEmbarcacao"/> -->
            <button class="btn waves-effect waves-light bt-default" type="submit" id="CadastrarPesca" name="CadastrarPesca"> <!-- onclick="return verificando();"> -->
                Cadastrar Pesca
            </button>
        </div>
        <br> <br>
    </form>
</div>
<script type="text/javascript" src="../../scripts/Validate.js"></script>
<script type="text/javascript">
    var auxEmb = 0;
    var auxAca = 0;
    var formEmb = [];
    var formAca = ["0"];

    $(document).ready(function () {
        $('.dinheiro').maskMoney({
            thousands: '.',
            decimal: ','
        });
        $('.tooltipped').tooltip();
    });

    Element.prototype.remove = function () {
        this.parentElement.removeChild(this);
    }
    NodeList.prototype.remove = HTMLCollection.prototype.remove = function () {
        for (var i = this.length - 1; i >= 0; i--) {
            if (this[i] && this[i].parentElement) {
                this[i].parentElement.removeChild(this[i]);
            }
        }
    }

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

    $('html').on('click', '#removerAcampamento', function () {
        $('.tooltipped').tooltip('remove');
        $('.tooltipped').tooltip();
        var pid = $(this).parent().parent().attr("id");
        var id = pid.split('_')[1];
        formAca.splice(formAca.indexOf(id), 1);
        document.getElementById(pid).remove();
    });

    function removePeixe(x) {
        $('.tooltipped').tooltip('remove');
        $('.tooltipped').tooltip();
        document.getElementById(x).remove();
        document.getElementById('esp' + x).removeAttribute('disabled');
        $('select').material_select();
    }

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

    function calculaKgConsumido() {
        let a = $('[name="peixes[]"]');
        let b;
        let sum = 0.0;
        for(var i=0; i<a.length; i++) {
            b = $('#pesoConsumido'+a[i].value).val();
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
    $("body").on("change","[id^='pesoConsumido']",calculaKgConsumido);
    $("body").on("change","[id^='tipoMedicao']",calculaKgConsumido);
    $("body").on("change","[id^='fator']",calculaKgConsumido);

    function calculaKgVendido() {
        let a = $('[name="peixes[]"]');
        let b;
        let sum = 0.0;
        for(var i=0; i<a.length; i++) {
            b = $('#pesoVendido'+a[i].value).val();
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
    $("body").on("change","[id^='pesoVendido']",calculaKgVendido);
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
                c = $('#pesoVendido'+a[i].value).val();
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
    $("body").on("change","[id^='preco']",calculaValorVendido);
    $("body").on("change","[id^='tipoMedicao']",calculaValorVendido);
    $("body").on("change","[id^='fator']",calculaValorVendido);

    function removeInstrumento(x) {
        $('.tooltipped').tooltip('remove');
        $('.tooltipped').tooltip();
        document.getElementById(x).remove();
        document.getElementById('instr' + x).removeAttribute('disabled');
        $('select').material_select();
    }

    $('#diaSemana').on("change", function () {
        var count = $('#diaSemana option:selected').length-1;
        console.log(count);
        $('#qtdDias').val(count);
    });

    $('#qtdDias').on("keyup",function() {
       let a = $('#qtdDias').val();
       a = a.replace(/\D/g,'');
       $('#qtdDias').val(a);
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
            '<td class="table-emb"><input id="tamEmbarcacao_' + auxEmb + '" class="validate table-emb" step="0.001" type="number" name="tamEmbarcacao_' + auxEmb + '" min="0"/></td>' +
            '<td class="table-emb"><input id="potEmbarcacao_' + auxEmb + '" class="validate table-emb" step="0.001" type="number" name="potEmbarcacao_' + auxEmb + '" min="0"/></td>' +
            '<td><button class="btn waves-effect waves-light red tooltipped" data-tooltip="Clique para deletar a embarcação" type="button" id="removerEmbarcacao" name="removerEmbarcacao"><i class="material-icons">delete</i></button></td>' +
            '</tr>'
        );
        $('select').material_select();
        $('.tooltipped').tooltip();
        formEmb.push(auxEmb.toString());
        auxEmb++;
    });

    $('#AdicionarAcampamento').on('click', function () {
        $('#acampForm').append(
            '<tr id=aca_' + auxAca + '>'+
                '<td><input class="validate" id="nomeAcampamento_' + auxAca + '"' +
                'type="text" name="nomeAcampamento_' + auxAca + '"'+
                'size="100" autocomplete="off"/></td>'+
                '<td><input class="validate" id="nomePesqueiro_' + auxAca + '"' +
                'type="text" name="nomePesqueiro_' + auxAca + '"'+
                'size="100" autocomplete="off"/></td>'+

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
                '<td><button class="btn waves-effect waves-light red tooltipped" data-tooltip="Clique para deletar o instrumento ' + idInstrumento.text() + ' da pesca" type="button" id="removerInstrumento" name="removerInstrumento" onclick="removeInstrumento(' + idInstrumento.val() + ')"><i class="material-icons">delete</i></button></td>' +
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

    var auxAddPeixe = 0;
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
                '<td class="table-peixe"><input id="pesoVendido' + auxAddPeixe + '" class="validate table-peixe" type="number" step="0.001" name="pesoVendido' + auxAddPeixe + '" min="0" max="9999"/></td>' +
                '<td class="table-peixe"><input id="preco' + auxAddPeixe + '" class="validate dinheiro table-peixe" type="text" name="preco' + auxAddPeixe + '"/></td>' +
                '<td class="table-peixe"><input id="pesoConsumido' + auxAddPeixe + '" class="validate table-peixe" type="number" step="0.001" name="pesoConsumido' + auxAddPeixe + '" min="0" max="9999"/></td>' +
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

    $('#CadastrarPesca').on('click', function () {
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
</script>
<script type="text/javascript" src="../../scripts/combo.js"></script>