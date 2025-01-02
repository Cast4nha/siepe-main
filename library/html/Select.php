<?php
include_once '../../library/Import.php';
Import::library('String');
Import::library('persistence/ReflectionBean');

class Select
{
	public function buildSelect($name,$list,$idList,$option,$selected,$title='',$validate='',$onchange='')
	{
		echo $this->open($name,$title,$validate,$onchange);
		echo $this->option(0, 'Selecione', 0);
		
		if ($list)
		{
			$reflection = new ReflectionBean();
			$reflection->setReflectionClass($list[0]);
			
			foreach ($list as $object)
				echo $this->option($reflection->getValueAtributoByName($idList, $object), $reflection->getValueAtributoByName($option, $object), $selected);
		}

		echo $this->close();
	}
	
	
	private function open($name,$title,$validate,$onchange='')
	{
		$open = '<select name="#1" title="#2" validate="#3" onchange="#4" >';
		$string = new String();
		$string->buildStringToParam($open, array($name,$title,$validate,$onchange));
		return $string->get();
	}
	
	private function close()
	{
		return '</select>';
	}
	
	private function option($value,$label,$selected)
	{
		$option = '<option value="#1" #2>#3</option>';
		$string = new String();
		
		if ($value == $selected)
			$selected = 'selected';
		else $selected = '';
		
		$string->buildStringToParam($option, array($value,$selected,$label));
		return $string->get();
	}
	
}

?>