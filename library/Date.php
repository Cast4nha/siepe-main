<?php

class Date
{
	public static function getMes($mes)
	{
		switch ($mes)
		{
			case '01': return $mes = 'Janeiro';
			case '02': return $mes = 'Fevereiro';
			case '03': return $mes = 'Março';
			case '04': return $mes = 'Abril';
			case '05': return $mes = 'Maio';
			case '06': return $mes = 'Junho';
			case '07': return $mes = 'Julho';
			case '08': return $mes = 'Agosto';
			case '09': return $mes = 'Setembro';
			case '10': return $mes = 'Outubro';
			case '11': return $mes = 'Novembro';
			case '12': return $mes = 'Dezembro';
		}
	}
	
	public static function format($data)
	{
		$ano = substr($data,0,4);
		$mes = substr($data,5,2);
		$dia = substr($data,8,2);
		return $data = $dia."/".$mes."/".$ano;
	}
	
	public static function convertToBD($data)
	{
		$ano = substr($data,6,4);
		$mes = substr($data,3,2);
		$dia = substr($data,0,2);
		return $data = $ano.'-'.$mes.'-'.$dia;
	}
	
	public static function getHora($hora)
	{
		$hora = substr($hora,11,5);
		return $hora;
	}
	
	public static function formatDataHora($data) 
	{
		$dataHora = self::format($data).' às '.self::getHora($data); 
		return $dataHora;
	}
	
	public static function today()
	{
		return date('d/m/Y');
	}
}

?>