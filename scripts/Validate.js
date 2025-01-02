function isValida()
{
	var elements = document.form.elements;

	for ( var i = 0; i < elements.length; i++)
	{
		if (isTypeValidate(elements[i].type))
		{
			var validate = elements[i].getAttribute('validate');
			
			if (validate != null)
			{
				var validacao = "";
				var itemValidacao = new Array;
				var totalValidacao = 0;

				for(var x = 0; x < validate.length; x++)
				{
					var letra = validate.charAt(x);
					
					if (letra != ";")
						validacao += letra;
					else
					{
						itemValidacao[totalValidacao++] = validacao;
						validacao = "";
					}
				}
				
				for ( var int = 0; int < totalValidacao; int++)
				{
					if (trataValidate(itemValidacao[int], elements[i]))
						return false;
				}
			}
		}
		
	}
	
	return true;
}

function trataValidate(validate,campo,label)
{
	var campoValidate = validate;

	
	if (campoValidate.indexOf("(",0) != -1)
	{
		return trataValidateFunction(validate, campo);
	}
	
	switch (validate) 
	{
	case "required": 
	{
		if (isSelect(campo))
			return isNotSelected(campo, label);
		else if (isCheckBox(campo))
		{
			return isNotCheckedCampo(campo, label);
		}else
			return isEmpty(campo, label);
	}
	case "number": return isNotNumber(campo, label);
	case "notZero": return isNumeroIgualZero(campo,label);
	case "date": return isNotDate(campo,label);
	case "cpf": return isNotCPF(campo, label);
	case "email": return isNotEmail(campo,label);
	case "integer": return isNumeroInteiro(campo,label);
	case "confirm": return (!confirm("Confirma os Dados ?"));
	case "notNumber": return isNotNumero(campo);
	default: return false;
	}
}

function isNotNumero(campo)
{
	if(!isNaN(campo.value))
	{
		alert("Atenção: O campo "+campo.title+" deve conter apenas letras.");
		campo.focus();
		return true;
	}
	return false;
}

function isNotCheckedCampo(campo,label)
{
	var elements = document.form.elements;

	var checked = 0;
	
	for ( var i in elements)
	{
		if (isCheckBox(elements[i]))
			if (elements[i].name == campo.name)
				if (elements[i].checked)
					checked++;
	}
	
	if (checked == 0)
	{
		if (label == null)
			label = campo.title;
		
		alert("Atenção: Deve ser marcado pelo menos um "+ label);
		campo.focus();
		return true;
	}
	
	return false;
	
}

function isCheckBox(campo)
{
	if (campo.type == "checkbox")
		return true;

	return false;
}

function trataValidateFunction(validate,campo)
{
	var posicaoParentese = validate.indexOf("(",0);

	var functionValidate = validate.substr(0,posicaoParentese);

	switch (functionValidate) 
	{
	case "max":
	{
		var parametro = validate.substr(posicaoParentese,validate.length);
		parametro = parametro.replace("(","");
		parametro = parametro.replace(")","");

		return isNotLimitMaxLength(campo,parametro);
	}
	case "min":
	{
		var parametro = validate.substr(posicaoParentese,validate.length);
		parametro = parametro.replace("(","");
		parametro = parametro.replace(")","");

		return isNotLimitMinLength(campo,parametro);
	}
	case "equals":
		{
			var parametro = validate.substr(posicaoParentese,validate.length);
			parametro = parametro.replace("(","");
			parametro = parametro.replace(")","");

			eval("var parametro = document.form."+parametro+";");
			
			if (campo.value != parametro.value)
			{
				alert("Atenção: O campo "+campo.title+" não coincide com o campo "+parametro.title);
				campo.focus();
				return true;
			}
			return false;
		}

	default: return false;
	}



}

function isSelect(campo)
{
	if (campo.type == "select-one")
		return true;

	return false;
}

function isTypeValidate(type)
{
	switch (type) 
	{
		case "text": return true;
		case "select-one": return true;
		case "textarea": return true;
		case "checkbox": return true;
		case "submit": return true;
		case "password": return true;
		default: return false;
	}

}

function Trim(str)
{
	return str.replace(/^\s+|\s+$/g,"");
}

function isEmpty(campo,label)
{
	if (Trim(campo.value) == '')
	{
		if (label == null)
			label = campo.title;

		alert("Atenção: O campo "+label+" é obrigatório.");
		campo.focus();
		campo.value = '';
		return true;
	}
	return false;
}

function isNotNumber(campo,label)
{
	if(isNaN(campo.value))
	{
		if (label == null)
			label = campo.title;

		alert("Atenção: O campo "+label+" deve conter apenas números.");
		campo.focus();
		return true;
	}
	return false;
}

function isNotSelected(campo,label)
{
	if (campo.value == '0')
	{
		if (label == null)
			label = campo.title;


		alert("Atenção: O campo "+label+" deve ser selecionado.");
		campo.focus();
		return true;
	}
	return false;
}


function isNotLimitMaxLength(campo,limit,label)
{
	if (campo.value.length > limit)
	{
		if (label == null)
			label = campo.title;

		alert("Atenção: O campo "+label+" deve conter no máximo "+limit+" caracteres.");
		campo.focus();
		return true;
	}
	return false;
}

function isNotLimitMinLength(campo,limit,label)
{
	if (campo.value.length < limit)
	{
		if (label == null)
			label = campo.title;

		alert("Atenção: O campo "+label+" deve conter no mínimo "+limit+" caracteres.");
		campo.focus();
		return true;
	}
	return false;
}



function isNumeroInteiro(campo,label)
{
	if((isNaN(campo.value)) || (campo.value.indexOf(".") != -1 ))
	{
		if (label == null)
			label = campo.title;

		alert("Atenção: O campo "+label+" deve conter apenas números inteiros.");
		campo.focus();
		return true;
	}
	return false;
}

function isNumeroIgualZero(campo,label)
{
	var numero = parseFloat(campo.value);

	if(numero == 0)
	{
		if (label == null)
			label = campo.title;

		alert("Atenção: O campo "+label+" não pode ser zero.");
		campo.focus();
		return true;
	}
	return false;
}

function isNotEmail(campo,label)
{

	if ( campo.value.indexOf("@") < 1 || campo.value.indexOf(".",campo.value.indexOf("@")) < 5)
	{
		if (label == null)
			label = campo.title;

		alert('Atenção: O campo '+label+' é inválido.');
		campo.focus();
		return true;
	}

	return false;
}

function isNotDate(str,label) 
{
	dia = (str.value.substring(0,2));
	mes = (str.value.substring(3,5));
	ano = (str.value.substring(6,10));

	cons = true;
	// verifica se foram digitados n�meros
//	if (isNaN(dia) || isNaN(mes) || isNaN(ano)){
//	alert("Preencha a data somente com n�meros.");
//	str.value = "";
//	str.focus();
//	return false;
//	}

	// verifica o dia valido para cada mes
	if ((dia < 1) || (dia > 30 && (mes == 4 || mes == 6 || mes == 9 || mes == 11)) || dia > 31) {
		cons = false;
	}

	// verifica se o mes e valido
	if (mes < 1 || mes > 12 ) {
		cons = false;
	}

	// verifica se e ano bissexto
	if (mes == 2 && ( dia < 1 || dia > 29 || ( dia > 28 && (parseInt(ano / 4) != ano / 4)))) {
		cons = false;
	}

	if (cons == false) 
	{
		if (label == null)
			label = str.title;

		alert("Atenção: O campo "+label+" é inválida");
		str.value = "";
		str.focus();
		return true;
	}
	return false;
}


function isNumeroNotNull(campo,label)
{
	if(isNaN(campo.value)==0 )
	{
		if (label == null)
			label = campo.title;

		alert("Atenção: O campo "+label+ " deve conter número maior que zero.");
		campo.focus();
		return true;
	}
	return false;
}

function isNotCPF(Objcpf, label)
{
	var cpf = Objcpf.value;

	var nonNumbers = /\D/;

	if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || 
			cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || 
			cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || 
			cpf == "99999999999")
	{
		return false;
	}
	
	
	var a = [];
	var b = new Number;

	var c = 11;
	for (var i=0; i<11; i++){
		a[i] = cpf.charAt(i);
		if (i < 9) b += (a[i] * --c);
	}
	if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
	b = 0;
	c = 11;
	for (var y=0; y<10; y++) b += (a[y] * c--);
	if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
	if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]))
	{
		if (label == null)
			label = Objcpf.title;

		alert("Atenção: O campo "+label+" é inválido");
		Objcpf.value = null;
		Objcpf.focus();
		return true;
	}

	return false;
	
//	var cpf = Objcpf.value;
//	exp = /\D/g
//		cpf = cpf.toString().replace( exp, "" );
//	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
//	var soma1=0, soma2=0;
//	var vlr =11;
//
//	if(cpf.length<vlr)
//	{
//		var digitoGerado = null;
//	}
//
//	for(i=0;i<9;i++){
//		soma1+=eval(cpf.charAt(i)*(vlr-1));
//		soma2+=eval(cpf.charAt(i)*vlr);
//		vlr--;
//	}   
//	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
//	soma2 = (((soma2+(2*soma1))*10)%11);
//
//	if(cpf == "11111111111" || cpf == "22222222222" || cpf ==
//		"33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf ==
//			"66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf ==
//				"99999999999" || cpf == "00000000000" )
//	{
//		var digitoGerado = null;
//	}
//	else
//	{
//		var digitoGerado = (soma1*10) + soma2;
//	}
//
//	if(digitoGerado != digitoDigitado)
//	{
//		if (label == null)
//			label = Objcpf.title;
//
//		alert("Aten��o: O campo "+label+" � inv�lido");
//		Objcpf.value = null;
//		Objcpf.focus();
//		return true;
//	}
//	return false;
} 

function voltar()
{
	window.back();
}

function verificar()
{
	var descricao = form.descricao.value;

	if (Trim(descricao) == 0)
	{
		alert('Atenção: O campo Descrição é Obrigatório');
		return false;
	}
}

function confirmaExclusao()
{
	return confirm('Não será possível recuperar dados excluídos. Você tem certeza que deseja excluir?')
}

function verificarTurma()
{
	var descricao = form.descricao.value;
	var ano = form.ano.value;
	var idEtapa = form.idEtapa.value;
	var turno = form.turno.value;

	if (Trim(descricao) == 0)
	{
		alert('Atenção: O campo Descrição é Obrigatório');
		return false;
	}

	if (Trim(ano) == 0)
	{
		alert('Atenção: O campo Ano é Obrigatório');
		return false;
	}

	if (Trim(turno) == 0)
	{
		alert('Atenção: O campo Turno é Obrigatório');
		return false;
	}

	if (Trim(idEtapa) == 0)
	{
		alert('Atenção: O campo Etapa é Obrigatório');
		return false;
	}
}

function verificarUsuario()
{
	var login = form.login.value;
	var senha = form.senha.value;
	var idperfil = form.idperfil.value;
	var nome = form.nome.value;
	var email = form.email.value;

	if (Trim(login) == 0)
	{
		alert('Atenção: O campo Login é obrigatório');
		return false;
	}

	if (Trim(senha) == 0)
	{
		alert('Atenção: O campo Senha é obrigatório');
		return false;
	}

	if (Trim(idperfil) == 0)
	{
		alert('Atenção: O campo Perfil é obrigatório');
		return false;
	}

	if (Trim(nome) == 0)
	{
		alert('Atenção: O campo Nome é obrigatório');
		return false;
	}

	if (Trim(email) == 0)
	{
		alert('Atenção: O campo Email é obrigatório');
		return false;
	}
}

function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }

// JavaScript Document//adiciona mascara de cnpj
function mascaraCNPJ(cnpj,event){	
	return formataCampo(mascaraInteiro(cnpj), '00.000.000/0000-00', event);
}
//adiciona mascara de cep
function mascaraCep(cep,event){		
	return formataCampo(cep, '00.000-000', event);
}
//adiciona mascara de dinheiro
function mascaraDinheiro(dinheiro,event){		
	return formataCampo(dinheiro, '0,00', event);
}
//adiciona mascara de hora
function mascaraHora(hora,event){		
	return formataCampo(hora, '00:00', event);
}
//adiciona mascara de data
function mascaraData(data,event){	
	return formataCampo(data, '00/00/0000', event);
}
//adiciona mascara ao telefone
function mascaraTelefone(telefone,event){		
	return formataCampo(telefone, '(00) 0000-0000', event);
}

function mascaraCelular(celular,event){		
	return formataCampo(celular, '(00) 00000-0000', event);
}
//adiciona mascara ao CPF
function mascaraCPF(cpf,event){	
	return formataCampo(cpf, '000.000.000-00', event);
}
//valida telefone
function validaTelefone(tel){	exp = /\(\d{2}\)\ \d{4}\-\d{4}/;	if(!exp.test(tel.value))		alert('Numero de Telefone Invalido!');}
//valida CEP
function validaCep(cep){	
	exp = /\d{2}\.\d{3}\-\d{3}/;	
	if(!exp.test(cep.value))		alert('Numero de Cep Invalido!');		
}
//valida data
function validaData(data){	exp = /\d{2}\/\d{2}\/\d{4}/;	if(!exp.test(data.value))		alert('Data Invalida!');			}
//valida o CPF digitado
function validarCPF(Objcpf){	
	var cpf = Objcpf.value;	
	exp = /\.|\-/g;	
	cpf = cpf.toString().replace( exp, "" ); 	
	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));	
	var soma1=0, soma2=0;	var vlr =11;		
	for(i=0;i<9;i++){		
		soma1+=eval(cpf.charAt(i)*(vlr-1));		
		soma2+=eval(cpf.charAt(i)*vlr);		
		vlr--;	
	}		
	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));	
	soma2=(((soma2+(2*soma1))*10)%11);		
	var digitoGerado=(soma1*10)+soma2;	
	if(digitoGerado!=digitoDigitado) alert('CPF Invalido!');		
}
//valida numero inteiro com mascara
function mascaraInteiro(campo){	
	campo.value = campo.value.toString().replace(/\D/g,'');
	return campo;
}
//valida o CNPJ digitado
function validarCNPJ(ObjCnpj){	var cnpj = ObjCnpj.value;	var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);	var dig1= new Number;	var dig2= new Number;		exp = /\.|\-|\//g;	cnpj = cnpj.toString().replace( exp, "" ); 	var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));			for(i = 0; i<valida.length; i++){		dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);			dig2 += cnpj.charAt(i)*valida[i];		}	dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));	dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));		if(((dig1*10)+dig2) != digito)			alert('CNPJ Invalido!');		}
//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 	
	var boleanoMascara; 		
	var Digitato = evento.keyCode;	
	exp = /\D/g;
	campoSoNumeros = campo.value.toString().replace( exp, "" );    	
	var posicaoCampo = 0;	 	
	var NovoValorCampo="";	
	var TamanhoMascara = campoSoNumeros.length;; 		
	if (Digitato != 8) { // backspace 		
		for(i=0; i<= TamanhoMascara; i++) { 			
			boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")	|| (Mascara.charAt(i) == "/") || (Mascara.charAt(i) == ":"));
			boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ") || (Mascara.charAt(i) == ","));
			if (boleanoMascara) { 				
				NovoValorCampo += Mascara.charAt(i); 				  
				TamanhoMascara++;		
			}
			else { 				
				NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 				
				posicaoCampo++; 			  
			}	   	 		  
		}	 		
		campo.value = NovoValorCampo;		  
		return true; 	
	}
	else { 		
		return true; 	
	}
}
$('#resultado').on('click', function() {
	$('#resultado').remove();
});