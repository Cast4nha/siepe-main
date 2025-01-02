<?php

include_once 'ArrayList.php';

class Number
{
	public static function formatDecimal($number)
	{
		return	number_format($number,2,',','.');
	}
	
	public static function format($number)
	{
		return	number_format($number,2,'.',',');
	}
	
	public static function formatDecimalArray(IArrayList $arrayList)
	{
		$list = new ArrayList();
				
		if($arrayList->getAll())
			foreach ($arrayList->getAll() as $number)
				$list->add(self::formatDecimal($number));

		return $list;
	}
	
	public static function forceInteger($value)
	{
		return intval($value);
	}
	
	public static function forceFloat($value)
	{
		return floatval($value);
	}
	
} 



?>