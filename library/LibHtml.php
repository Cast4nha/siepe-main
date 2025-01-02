<?php

include_once 'StringTeste.php';

class LibHtml
{
	

	public function form($action,$name,$method)
	{
		echo '<form name="',$name,'" method="',$method,'" action="',$action,'">';
	}
	

	public function closeForm()
	{
		echo '</form>';
	}
	

	public function linkImage($view,$action,$image)
	{
		echo '<a href="index.php?view=',$view,'&action=',$action,'"><img src="../imagens/',$image,'"></a>';
	}
	
	/**
	 * @tutorial Funcao utilizada para retornar um link com image
	 * @return unknown_type
	 */
	public function alinkImage($action,$image,$title,$id = '')
	{
		return '<a href="?action='.$action.'" id="link-'.$id.'"><img title="'.$title.'" src="../styles/images/'.$image.'"></a>';
	}
	
	public function alinkImageId($action,$image,$title,$id='')
	{
		return '<a id="link-'.$id.'" href="?action='.$action.'"><img title="'.$title.'" src="../styles/images/'.$image.'"></a>';
	}
	
	public function alinkImageOnClick($action,$image,$title,$onclick,$id='')
	{
		return '<a href="?action='.$action.'" id="link-'.$id.'" onclick="return '.$onclick.';"><img title="'.$title.'" src="../styles/images/'.$image.'"></a>';
	}
	
	public function alinkImageOnClickId($action,$image,$title,$onclick,$id='')
	{
		return '<a id="link-'.$id.'" href="?action='.$action.'"><img title="'.$title.'" onclick="return '.$onclick.';" src="../styles/images/'.$image.'"></a>';
	}
	
	/**
	 * @return string
	 */
	public function alinkImageHref($href,$image,$title,$target = '_blank',$id='link-')
	{
		return "<a id='link-$id' href='$href' target='$target'><img title='$title' src='../styles/images/$image'></a>";
	}
	
	public function alinkImageHrefId($href,$image,$title,$target = '_blank',$id='')
	{
		return "<a id='link-$id' href='$href' target='$target'><img title='$title' src='../styles/images/$image'></a>";
	}
	
	public function alinkHref($href,$link)
	{
		return "<a href='$href'>$link</a>";
	}
	

	public function link($view,$action,$link)
	{
		echo '<a href="index.php?view=',$view,'&action=',$action,'">',$link,'</a>';
	}
	
	public function linkOnClick($view,$action,$link,$onclick)
	{
		echo '<a href="index.php?view=',$view,'&action=',$action,'" onclick="return ',$onclick,';">',$link,'</a>';
	}
	
	public function linkImageOnClick($href,$event,$icon,$alt)
	{
		$a = '';
		$a .= '<a onclick="return '.$event.'()" href="'.$href.'">';
		$a .= '<img src="../styles/images/'.$icon.'" title="'.$alt.'">';
		$a .= '</a>';
		return $a;
	}
	
	public function linkA($href,$link)
	{
		echo '<a href="',$href,'">',$link,'</a>';
	}
	
	public function linkEvent($href,$link,$event) {
		echo '<a href="',$href,'" ',$event,'>',$link,'</a>';
	}
	
	public function linkAimg($href,$src,$alt)
	{
		echo '<a href="',$href,'">';
		$this->img($src,$alt);
		echo '</a>';
	}
	
	
	/**
	 * @author Vitor Castro
	 * @desc Redirecionamento atraves do HEADER
	 * @param
	 * @since 04/08/2009
	 */
	public function header($view,$action)
	{
		header("Location: index.php?view=$view&action=$action");
	}
	
	
	public function buttonSubmit($name,$value,$js,$limpar)
	{
		echo '<div id="space" style="margin-top: 20px">';
		echo '<input type="submit" onclick="return '.$js.';"  value="',$value,'" name="',$name,'" class="butao">'; 		
		if ($limpar) echo '&nbsp<input type="reset" value="Limpar" class="butao">';
		echo '</div>';
	}
	
	/**
	 * @author Vitor Castro
	 * @desc INPUT TEXT estilizado com class form e label 
	 * @param
	 * @since 04/08/2009
	 */
	public function inputTextStyles($name,$value,$label,$size,$maxlength,$title='',$validate='')
	{
		echo '<div class="form">';
		echo '<div class="label">',$label,'</div>'; 
		$this->inputText($name,$value,$size,$maxlength,$title,$validate);
		echo '</div>';
	}
	
	public function inputTextFunctionStyles($name,$value,$label,$size,$maxlength,$function,$title='',$validate='')
	{
		echo '<div class="form">';
		echo '<div class="label">',$label,'</div>'; 
		$this->inputTextFunction($name,$value,$size,$maxlength,$function,$title,$validate);
		echo '</div>';
	}
	
	public function inputTextCargaHoraria($name,$value,$label,$title)
	{
		$this->inputTextFunctionStyles($name, $value, $label, 3, 5, 'onkeyup=maskDecimal(this,",",".");',$title,'required;number;');
	}
	
	
	/**
	 * @author Vitor Castro
	 * @desc INPUT type TEXT sem estilo
	 * @param
	 * @since 04/08/2009
	 */
	public function inputText($name,$value,$size,$maxlength,$title='',$validate='')
	{
		echo '<input type="text" name="',$name,'" value="',$value,'" size="',$size,'" maxlength="',$maxlength,'" title="',$title,'" validate="',$validate,'"/>';
	}
	
	public function inputTextFunction($name,$value,$size,$maxlength,$function,$title='',$validate='')
	{
		echo '<input type="text" name="',$name,'" value="',$value,'" size="',$size,'" maxlength="',$maxlength,'" ',$function,' title="',$title,'" validate="',$validate,'"/>';
	}
	
	public function inputTextStr($name,$value,$size,$maxlength)
	{
		return '<input type="text" name="'.$name.'" value="'.$value.'" size="'.$size.'" maxlength="'.$maxlength.'">';
	}
	
	/**
	 * @author Vitor Castro
	 * @desc INPUT type HIDDEN
	 * @param
	 * @since 04/08/2009
	 */
	public function inputHidden($name,$value)
	{
		echo "<input type='hidden' name='$name' value='$value'>";
	}
	
	
	/**
	 * @author Vitor Castro
	 * @desc TextArea Estilizado
	 * @param
	 * @since 04/08/2009
	 */
	public function textAreaStyles($name,$value,$label,$cols,$rows)
	{
		echo '<div class="form">';
		echo '<div class="label">',$label,'</div>'; 
		$this->textArea($name,$value,$cols,$rows);
		echo '</div>';
	}
	
	public function textArea($name,$value,$cols,$rows)
	{
		echo '<textarea name="',$name,'" cols="',$cols,'" rows="',$rows,'">';
		echo $value;
		echo '</textarea>';
	}
	
	public function textAreaStr($name,$value,$cols,$rows)
	{
		return '<textarea name="'.$name.'" cols="'.$cols.'" rows="'.$rows.'">'.$value.'</textarea>';
	}
	
	
	/**
	 * @author Vitor Castro
	 * @desc Contrucao de Select
	 * @param
	 * @since 04/08/2009
	 */
	public function openSelect($name,$title='',$validate='',$onchange='')
	{
		$string = new StringTeste();
		$select = "<select name='#1' title='#2' validate='#3' onchange='#4'>";
		$string->buildStringToParam($select,array($name,$title,$validate,$onchange));
		echo $string->get();
	}
	
	
	/**
	 * @author Vitor Castro
	 * @desc Fechamento de Select
	 * @param
	 * @since 04/08/2009
	 */
	public function closeSelect()
	{
		echo '</select>';
	}
	
	
	/**
	 * @author Vitor Castro
	 * @desc Option do Select
	 * @param
	 * @since 04/08/2009
	 */
	public function optionSelect($value,$option)
	{
		echo "<option value='$value'>$option</option>";
	}
	
	/**
	 * @author Vitor Castro
	 * @desc Option do Select com opção selecionado
	 * @param
	 * @since 04/08/2009
	 */
	public function optionSelected($value,$option,$selected)
	{
		echo "<option value='$value'";
		if($selected == $value) echo 'selected';
		echo ">$option</option>";
	}
	
	/**
	 * @author Vitor Castro
	 * @desc TAG img
	 * @param nome da Imagem ../styles/imagens/nome_imagem
	 * @since 04/08/2009
	 */
	public function img($src,$alt)
	{
		echo '<img src="../styles/imagens/',$src,'" title="',$alt,'">';	
	}
	
	public function imgStr($src,$alt)
	{
		return '<img src="../styles/images/'.$src.'" title="'.$alt.'">';	
	}
	
	
	
	
	/**
	 * @author Vitor Castro
	 * @desc TAG img com ID
	 * @param
	 * @since 04/08/2009
	 */
	public function imgId($src,$alt,$id)
	{
		echo '<img id="',$id,'" src="../styles/imagens/',$src,'" title="',$alt,'">';	
	}
	
	public function radioGroup($name,$options,$selected)
	{
		foreach ($options as $object)
		{
			echo '<input type="radio" name="',$name,'" value="',$object->id,'"';
			if ($selected == $object->id) echo 'checked';
			echo '>',$object->nome;
		}
	}
	
	public function inputRadio($name,$option,$label,$check)
	{
		echo '<input type="radio" name="',$name,'" value="',$option,'"';
		if ($option == $check) echo ' checked ';
		echo '>',$label;
	}
	
	public function inputCheckStyle($name,$option,$descricao,$label,$check,$select)
	{
		echo '<div class="form">';
		echo '<div class="label">',$label,'</div>'; 
		$this->checkbox($name,$option,$descricao,$check,$select);
		echo '</div>';
	}
	
	
	
	public function checkbox($name,$value,$label,$check,$select,$event = '')
	{
		echo '<input type="checkbox"';
		
		if ($select) echo " disabled='true'";
		
		if ($check) echo " checked ";
		
		if ($event) echo $event;
		
		echo 'name="',$name,'" value="',$value,'">',$label;
	}
	
	public function select($name,$options,$tooltips,$selected)
	{
		echo '<select name="',$name,'" tooltipText="',$tooltips,'">';
		echo '<option value="0">(Selecione)</option>';
		foreach ($options as $object)
		{
			echo '<option value="',$object->id,'"';
			if ($selected == $object->id) echo 'selected'; 
			echo '>',$object->getNome(),'</option>';
		}
		echo '</select>';
	}
	
	public function inputFileStr($name)
	{
		return '<input type="file" name="'.$name.'">';
	}
	
	public function field($legend)
	{
		echo '<fieldset><legend>',$legend,'</legend>';
	}
	
	public function closeField()
	{
		echo '</fieldset>';
	}
	
	
	public function divTableTitulo($widths,$value)
	{
			echo '<div class="consulta">';
			echo '<div class="linha" style="text-align: left; padding: 0px 0px 0px 5px;">';
			$i = 0;
			foreach ($value as $coluna)
			{
				$this->linha('colunaTitulo',$widths[$i],$coluna);
				$i++;
			}
			echo '</div>';
	}
	
	public function divTableLinha($widths,$values)
	{
		echo '<div class="linha" style="text-align: left; padding: 0px 0px 0px 5px;">';
		
		$i = 0;
		
		foreach ($values as $coluna)
		{
			$this->linha('coluna',$widths[$i],$coluna);
			$i++;
		}
		
		echo '</div>';
	}
	
	
	public function linha($class,$width,$value)
	{
		echo '<div class="',$class,'" style="width:',$width,'%">',$value,'</div>';
	}
	
	public function linha2($vetor)
	{
		echo '<tr>';
		
		foreach ($vetor as $linha)
		{
			echo '<td>',$linha,'</td>';
		}
		
		echo '</tr>';
	}
	
	public function tituloTabela($vetor)
	{
		echo '<tr>';
		
		foreach ($vetor as $titulo)
		{
			echo '<th>',$titulo,'</td>';
		} 
		
		echo'</tr>';
	}
	
}


?>
