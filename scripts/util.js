function formatCurrency(o, n, dig, dec)
{
	new function(c, dig, dec, m){
		addEvent(o, "keypress", function(e, _){
			if((_ = e.key == 45) || e.key > 47 && e.key < 58){
				var o = this, d = 0, n, s, h = o.value.charAt(0) == "-" ? "-" : "",
						l = (s = (o.value.replace(/^(-?)0+/g, "$1") + String.fromCharCode(e.key)).replace(/\D/g, "")).length;
				m + 1 && (o.maxLength = m + (d = o.value.length - l + 1));
				if(m + 1 && l >= m && !_) return false;
				l <= (n = c) && (s = new Array(n - l + 2).join("0") + s);
				for(var i = (l = (s = s.split("")).length) - n; (i -= 3) > 0; s[i - 1] += dig);
				n && n < l && (s[l - ++n] += dec);
				_ ? h ? m + 1 && (o.maxLength = m + d) : s[0] = "-" + s[0] : s[0] = h + s[0];
				o.value = s.join("");
			}
			e.key > 30 && e.preventDefault();
		});
	}(!isNaN(n) ? Math.abs(n) : 2, typeof dig != "string" ? "." : dig, typeof dec != "string" ? "," : dec, o.maxLength);
}

function FormataValor(id,tammax,teclapres) {

	if(window.event) { // Internet Explorer
		var tecla = teclapres.keyCode; }
	else if(teclapres.which) { // Nestcape / firefox
		var tecla = teclapres.which;
	}


	vr = document.getElementById(id).value;
	exp = /\D/g;
	vr = vr.toString().replace( exp, "" ); 

	tam = vr.length;

	//if (tam < tammax && tecla != 8){ tam = vr.length + 1; }

	//if (tecla == 8 ){ tam = tam - 1; }

	//if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ){
		if ( tam <= 2 ){
			document.getElementById(id).value = vr; }
		if ( (tam > 2) && (tam <= 5) ){
			document.getElementById(id).value = vr.substr( 0, tam - 2 ) + ',' + vr.substr( tam - 2, tam ); }
		if ( (tam >= 6) && (tam <= 8) ){
			document.getElementById(id).value = vr.substr( 0, tam - 5 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ); }
		if ( (tam >= 9) && (tam <= 11) ){
			document.getElementById(id).value = vr.substr( 0, tam - 8 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ); }
		if ( (tam >= 12) && (tam <= 14) ){
			document.getElementById(id).value = vr.substr( 0, tam - 11 ) + '.' + vr.substr( tam - 11, 3 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ); }
		if ( (tam >= 15) && (tam <= 17) ){
			document.getElementById(id).value = vr.substr( 0, tam - 14 ) + '.' + vr.substr( tam - 14, 3 ) + '.' + vr.substr( tam - 11, 3 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam );}
	//}
}

function formataNumero (fld, milSep, decSep) {
	len = fld.value.length;
	var strCheck = '0123456789';
	for(i = 0; i < len; i++)
		if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;
	aux = '';
	for(; i < len; i++)
		if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i);
	len = aux.length;
	if (len == 0) fld.value = '0';
	if (len == 1) fld.value = '0'+ decSep + '0' + aux;
	if (len == 2) fld.value = '0'+ decSep + aux;
	if (len > 2) {
		aux2 = '';
		for (j = 0, i = len - 3; i >= 0; i--) {
			if (j == 3) {
				aux2 += milSep;
				j = 0;
			}
			aux2 += aux.charAt(i);
			j++;
		}
		fld.value = '';
		len2 = aux2.length;
		for (i = len2 - 1; i >= 0; i--)
			fld.value += aux2.charAt(i);
		fld.value += decSep + aux.substr(len - 2, len);
	}
}

function validaData(str) 
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
	if ((dia < 01)||(dia < 01 || dia > 30) && (mes == 04 || mes == 06 || mes == 09 || mes == 11 ) || dia > 31) {
		cons = false;
	}

	// verifica se o mes e valido
	if (mes < 01 || mes > 12 ) {
		cons = false;
	}

	// verifica se e ano bissexto
	if (mes == 2 && ( dia < 01 || dia > 29 || ( dia > 28 && (parseInt(ano / 4) != ano / 4)))) {
		cons = false;
	}

	if (cons == false) {
		alert("A data inserida n�o � v�lida: " + str.value);
		str.value = "";
		str.focus();
		return false;
	}

}

//colocar no evento onKeyUp passando o objeto como parametro
function formata(val)
{
	var pass = val.value;
	var expr = /[0123456789]/;

	for(i=0; i<pass.length; i++){
		// charAt -> retorna o caractere posicionado no �ndice especificado
		var lchar = val.value.charAt(i);
		var nchar = val.value.charAt(i+1);

		if(i==0){
			// search -> retorna um valor inteiro, indicando a posi��o do inicio da primeira
			// ocorr�ncia de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o m�todo retornara -1
			// instStr.search(expReg);
			if ((lchar.search(expr) != 0) || (lchar>3)){
				val.value = "";
			}

		}else if(i==1){

			if(lchar.search(expr) != 0){
				// substring(indice1,indice2)
				// indice1, indice2 -> ser� usado para delimitar a string
				var tst1 = val.value.substring(0,(i));
				val.value = tst1;
				continue;
			}

			if ((nchar != '/') && (nchar != '')){
				var tst1 = val.value.substring(0, (i)+1);

				if(nchar.search(expr) != 0)
					var tst2 = val.value.substring(i+2, pass.length);
				else
					var tst2 = val.value.substring(i+1, pass.length);

				val.value = tst1 + '/' + tst2;
			}

		}else if(i==4){

			if(lchar.search(expr) != 0){
				var tst1 = val.value.substring(0, (i));
				val.value = tst1;
				continue;
			}

			if ((nchar != '/') && (nchar != '')){
				var tst1 = val.value.substring(0, (i)+1);

				if(nchar.search(expr) != 0)
					var tst2 = val.value.substring(i+2, pass.length);
				else
					var tst2 = val.value.substring(i+1, pass.length);

				val.value = tst1 + '/' + tst2;
			}
		}

		if(i>=6){
			if(lchar.search(expr) != 0) {
				var tst1 = val.value.substring(0, (i));
				val.value = tst1;
			}
		}
	}

	if(pass.length==10) {
		return validaData(val);
	}

	if(pass.length>10)
		val.value = val.value.substring(0, 10);

}

function ValidarCPF(Objcpf){
	var cpf = Objcpf.value;
	exp = /\D/g
		cpf = cpf.toString().replace( exp, "" );
	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
	var soma1=0, soma2=0;
	var vlr =11;

	if(cpf.length<vlr)
	{
		var digitoGerado = null;
	}

	for(i=0;i<9;i++){
		soma1+=eval(cpf.charAt(i)*(vlr-1));
		soma2+=eval(cpf.charAt(i)*vlr);
		vlr--;
	}   
	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
	soma2 = (((soma2+(2*soma1))*10)%11);

	if(cpf == "11111111111" || cpf == "22222222222" || cpf ==
		"33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf ==
			"66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf ==
				"99999999999" || cpf == "00000000000" )
	{
		var digitoGerado = null;
	}
	else
	{
		var digitoGerado = (soma1*10) + soma2;
	}

	if(digitoGerado != digitoDigitado)
	{
		alert("Atenção: CPF inválido");
		Objcpf.value = null;
		Objcpf.focus();
		return false;
	}
	return true;
} 

function somente_numero(campo){  
	var digits="0123456789"  
		var campo_temp   
		for (var i=0;i<campo.value.length;i++){  
			campo_temp=campo.value.substring(i,i+1)   
			if (digits.indexOf(campo_temp)==-1){  
				campo.value = campo.value.substring(0,i);  
			}  
		}  
} 

function Trim(str)
{
	return str.replace(/^\s+|\s+$/g,"");
}

function excluir()
{

	if (confirm("Confirma exclusão?"))
	{
		return true;
	}else return false;
}



function replaceAll(string, token, newtoken) {
	while (string.indexOf(token) != -1) {
		string = string.replace(token, newtoken);
	}
	return string;
}

/* FUN��O DE TRATAMENTO DE DATA */

function getDia(data)
{
	var retorno = data;
	return retorno.substring(0,2);
}

function getMes(data)
{
	var retorno = data;

	var primeiroDigito = retorno.substring(3,4);
	var segundoDigito = retorno.substring(4,5);
	var mes = retorno.substring(3,5);

	if (primeiroDigito == "0")
		return segundoDigito-1;
	else if (primeiroDigito == "1")
		return mes-1;
}

function getAno(data)
{
	var retorno = data;
	return retorno.substring(6,10);
}

function mascaraData(campoData)
{
	var data = campoData.value;
	if (data.length == 2){
		data = data + '/';
		campoData.value = data;
		return true;
	}
	if (data.length == 5){
		data = data + '/';
		campoData.value = data;
		return true;
	}
}

function getData(campo)
{
	var data = new Date();
	data.setFullYear(getAno(campo), getMes(campo), getDia(campo));
	return data;
}

/* FUN��O DE VALIDA��O DE CAMPOS */

function replaceAll(str, de, para){
	var pos = str.indexOf(de);
	while (pos > -1){
		str = str.replace(de, para);
		pos = str.indexOf(de);
	}
	return (str);
}

function isObrigatorio(campo,label)
{
	if (Trim(campo.value) == 0)
	{
		alert("Aten��o: O campo "+label+" � Obrigat�rio");
		campo.focus();
		return true;
	}
	return false;
}

function isDataValida(campo,label)
{

	var somenteNumero = replaceAll(campo.value,'/','');

	if(isNaN(somenteNumero))
	{
		alert("Atenção: O Campo "+ label +" não deve possuir letras");
		campo.value = "";
		campo.focus();
		return true;
	}

	dia = (campo.value.substring(0,2));
	mes = (campo.value.substring(3,5));
	ano = (campo.value.substring(6,10));

	cons = true;

	// verifica o dia valido para cada mes
	if ((dia < 01)||(dia < 01 || dia > 30) && (mes == 04 || mes == 06 || mes == 09 || mes == 11 ) || dia > 31) {
		cons = false;
	}

	// verifica se o mes e valido
	if (mes < 01 || mes > 12 ) {
		cons = false;
	}

	// verifica se e ano bissexto
	if (mes == 2 && ( dia < 01 || dia > 29 || ( dia > 28 && (parseInt(ano / 4) != ano / 4)))) {
		cons = false;
	}

	if (cons == false) 
	{
		alert("Atenção: O Campo "+ label +" não é uma data válida");
		campo.value = "";
		campo.focus();
		return true;
	}

	return false;
}



function isNumero(campo,label)
{
	if(isNaN(campo.value))
	{
		alert("Atenção: O campo "+label+" deve conter apenas números");
		campo.focus();
		return true;
	}
	return false;
}

function isStrNumero(value,label)
{
	if(isNaN(value))
	{
		alert("Atenção: O campo "+label+" deve conter apenas números");
		return true;
	}
	return false;
}

function isLimitLength(campo,limit,label)
{
	if (campo.value.length < limit)
	{
		alert("Atenção: O campo "+label+" deve conter no mínimo "+limit+" caracteres");
		campo.focus();
		return true;
	}
	return false;
}


function isNumeroInteiro(campo,label)
{
	if((isNaN(campo.value)) || (campo.value.indexOf(".") != -1 ))
	{
		alert("Atenção: O campo "+label+" deve conter apenas números inteiros.");
		campo.focus();
		return true;
	}
	return false;
}

function isSelecionado(campo,label)
{
	if (campo.value == '0')
	{
		alert("Atenção: O campo "+label+" deve ser selecionado");
		campo.focus();
		return true;
	}
	return false;
}

function isEmail(campo,label)
{

	if ( campo.value.indexOf("@") < 1 || campo.value.indexOf(".",campo.value.indexOf("@")) < 5)
	{
		alert('Atenção: O campo '+label+' é inválido');
		campo.focus();
		return true;
	}

	return false;
}

function voltar()
{
	window.history.back(-1);
}