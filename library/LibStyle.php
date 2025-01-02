<?php

class LibStyle
{

	public function divStyle($styles)
	{
		echo '<div style="',$styles,'">';
	}

	public function divClass($class)
	{
		echo '<div class="',$class,'">';
	}

	public function divFormLabel($label)
	{
		$this->divClass('form');
		$this->divClassStyleConteudo('label', '',$label);
	}

	public function divId($id)
	{
		echo '<div id="',$id,'">';
	}

	public function divClassId($class, $id)
	{
		echo '<div class="',$class,'" id="',$id,'">';
	}

	public function divClassStyle($class,$style)
	{
		echo '<div class="',$class,'" style="',$style,';">';
	}

	public function divIdStyle($id,$style)
	{
		echo '<div id="',$id,'" style="',$style,';">';
	}

	public function divIdStyleConteudo($id,$style,$conteudo)
	{
		$this->divIdStyle($id,$style);
		echo $conteudo;
		$this->divClose();
	}

	public function divClassStyleConteudo($id,$style,$conteudo)
	{
		$this->divClassStyle($id,$style);
		echo $conteudo;
		$this->divClose();
	}

	public function divClose()
	{
		echo '</div>';
	}

	public function divForm($label,$conteudo)
	{
		$this->divClass('form');
		$this->divClass('labelg');
		echo $label;
		$this->divClose();
		echo $conteudo;
		$this->divClose();
	}

	public function cabecalhoLista($widthsPx,$colunas) {
		$this->divClassId('consultaTitulo', 'consulta');

		$i = 0;

		foreach ($colunas as $col)
		$this->divIdStyleConteudo('consultaTitulo', 'width: '.$widthsPx[$i++].'%', $col);

		$this->divClose();
	}

	public function conteudoLista($widthsPx,$dados, $i) {
		$this->divClassId('consulta'.$i%2, 'consulta');

		$j = 0;

		foreach ($dados as $dd)
		{
			if ($dd)
			$conteudo = $dd;
			else $conteudo = ' - ';
			$this->divIdStyleConteudo('consulta', 'width: '.$widthsPx[$j++].'%', $conteudo);
		}
			
		$this->divClose();
	}
	
	public function listaEdicaoExclusao($cabecalho,$dados,$style = 'responsive-table centered') {
		echo '<form method="post"><input type="hidden" name="operacao" id="operacao" value="-1"/><input type="hidden" id="idUsuario" name="idUsuario" value="-1"/>';
		echo '<table class="'.$style.'"><thead><tr>';
		foreach ($cabecalho as $header) echo '<th>'.$header.'</th>';
		echo '</thead><tbody>';
		foreach ($dados as $linhas) {
			echo '<tr>';
			$i = 0;
			$tamanho = sizeof($linhas);
			//echo var_dump(sizeof($dados),$tamanho,$linhas,$dados); die();
			foreach ($linhas as $coluna) {
				$i++;
				if ($tamanho!=$i) echo '<td><input type="text" value="'.$coluna.'"/></td>';
				else {
					echo '<td><button class="btn waves-effect waves-light green darken-4" type="submit"><i class="material-icons">edit</i></button></td>';
					echo '<td><button class="btn waves-effect waves-light red darken-4" type="submit" onclick="document.getElementById(\'operacao\').value=\'1\'; document.getElementById(\'idUsuario\').value=\''.$coluna.'\'; if (confirm(\'Tem certeza que deseja excluir esse usuário?\')) return true; else return false;"><i class="material-icons">delete_forever</i></button></td>';
				}
			}
			echo '</tr>';
		}
		echo '</tbody></table></form>';
	}

}

?>