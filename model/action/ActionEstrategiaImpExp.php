<?php
include_once '../../library/Import.php';
Import::action('AbstractAction');
Import::dao('EstrategiaImpExpDao');
Import::bean('EstrategiaImpExp');

class ActionEstrategiaImpExp extends AbstractAction
{
    
	protected function getDao()
	{
		if ($this->isNullDao())
			$this->dao = new EstrategiaImpExpDao();
		
		return $this->dao;
	}
	
	public function getAll()
	{
	    return $this->getDao()->selectAll();
	}
	
	public function dasativarTodasEstrategias()
	{
	    return $this->getDao()->desativarEstrategias();
	}
	
	public function ativarEstrategia($idEstrategia)
	{
	    return $this->getDao()->ativarEstrategia($idEstrategia);
	}
	
	public function buscarEstrategiaAtiva()
	{
	    return $this->getDao()->selectEstrategiaAtiva();
	}
	
}


?>