<?php
class LibMessage
{
	
	private function LibraryStyle()
	{
		include_once '../../library/LibStyle.php';
		return $library = new LibStyle();
	}
	
	private function LibraryHtml()
	{
		include_once '../../library/LibHtml.php';
		return $library = new LibHtml();
	}
	
	public function getMsg()
	{
		if(isset($_GET['msg']))
		{
			$this->msgSucesso($_GET['msg'],400);
		}else if (isset($_REQUEST['erro']))
		{
			$this->msgErro($_REQUEST['erro'],400);
		}
	}
	
	public function msgSucesso($msg, $width)
	{
		$style = $this->LibraryStyle();
		#$html = $this->LibraryHtml();
		
		$style->divClass('form');
		$style->divClassStyle('caixa sucesso','width:'.$width.'px');

			#$html->imgId('alert2.png','Erro na requisição','imgMessage');
			
			$style->divId('caixatexto');
				echo '<b>Sucesso:</b><br>'.$msg;
			$style->divClose();
		$style->divClose();
		$style->divClose();
	}
	
	public function msgErro($msg, $width)
	{
		$style = $this->LibraryStyle();
		#$html = $this->LibraryHtml();
		
		$style->divClass('form');
		$style->divClassStyle('caixa erro','width:'.$width.'px');

			#$html->imgId('alert2.png','Erro na requisição','imgMessage');
			
			$style->divId('caixatexto');
				echo '<b>Erro:</b><br>'.$msg;
			$style->divClose();
		$style->divClose();
		$style->divClose();
		
	}
	
	public function msgInformacao($msg, $width)
	{
		if ($msg)
		{
			$style = $this->LibraryStyle();
			
			//$style->divId('space');
			$style->divClass('form');
			
				$style->divClassStyle('caixa info','width:'.$width.'px');
			
					$style->divId('caixatexto');
					
					echo '<b>Informação:</b><br>'.$msg;
					
					$style->divClose();
	
				$style->divClose();
			
			$style->divClose();
		}
		
	}
	
	public function msgAtencao($msg, $width)
	{
		
		$style = $this->LibraryStyle();
		#$html = $this->LibraryHtml();
		
		$style->divClass('form');
		$style->divClassStyle('caixa atencao','width:'.$width.'px');

			#$html->imgId('alert2.png','Erro na requisição','imgMessage');
			
			$style->divId('caixatexto');
				echo '<b>Atenção:</b><br>'.$msg;
			$style->divClose();
		$style->divClose();
		$style->divClose();
		
	}

}
?>