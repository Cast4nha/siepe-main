<?php

include_once '../../library/Import.php';

Import::controller('Controller');

Import::action('ActionEstrategiaImpExp');

Import::bean('EstrategiaImpExp');

const PLANILHA_UNICA = 1;
const PLANILHA_SEPARADA = 2;

class ControllerEstrategiaImpExp extends Controller
{
    
    private $controller;
    
	public function getAction()
	{
		if ($this->action == null)
			$this->action = new ActionEstrategiaImpExp();

		return $this->action;
	}
	
	public function atualizarEstrategia()
	{
	    if(isset($_POST['salvar-estrategia'])){
	        extract($_POST);
	        
	        $this->getAction()->dasativarTodasEstrategias();
	        $this->getAction()->ativarEstrategia($idEstrategia);
	        
	        return array('card-panel center z-depth-3 white-text green darken-2 noselect','Estratégia de Importação/Exportação atualizada com Sucesso!');
	    }
	}
	
	public function exportar()
	{
	    $controller = $this->getControllerEstrategia();
	    
	    $controller->exportar();
	}
	
	public function importar()
	{
	    if (isset($_POST['ImportarCSV'])) {
	        
	        if ($_FILES['arquivo']['error'] != UPLOAD_ERR_OK  && !is_uploaded_file($_FILES['arquivo']['tmp_name'])) 
	            return array('card-panel center z-depth-3 white-text red darken-2 noselect','Falha no recebimento do arquivo.');
	            
            $controller = $this->getControllerEstrategia();
        	return $controller->importar();
	    }
	}
	
	private function getControllerEstrategia()
	{
	    if(!$this->controller)
	    {
	        $estrategia = $this->getAction()->buscarEstrategiaAtiva();
	        
	        Import::controller($estrategia->getController());
	        
	        $controller = $estrategia->getController();
	        $r = new ReflectionClass($controller);
	        $this->controller = $r->newInstance();
	    }
	    
	    return $this->controller;
	}
	
	public function getModelo(){
	    $controller = $this->getControllerEstrategia();
	    return $controller->getModelo();
	}
}
?>