<?php
include_once '../../library/Import.php';
Import::library('String');


class LinkHtml
{
	public static function linkToString($href,$link,$id='',$onclick='')
	{
		$string = new String();
		$base = '<a href="#1" id="#2" onclick="#3">#4</a>';
		$string->buildStringToParam($base, array($href,$id,$onclick,$link));
		return $string->get();
	} 
	
	public static function linkImageToString($href,$img,$title,$id='',$onclick='',$class='')
	{
		$string = new String();
		$base = '<a href="#1" id="#2" onclick="#3"><img title="#4" src="../styles/images/#5"/></a>';
		$string->buildStringToParam($base, array($href,$id,$onclick,$title,$img,$class));
		return $string->get();
	}
	
	public static function linkButtonToString($href,$label,$image='',$id='link',$onclick = '')
	{
		$stringBase = '<a class="linkButton" id="#4" href="#1" onclick="#5">';
		
		if ($image)
			$stringBase .= '<img src="../styles/images/#3" />';
		

		$stringBase .= '#2</a>';
		
		return String::getFromParam($stringBase, array($href,$label,$image,$id,$onclick));		
	}
	
	public static function ImageFindToString($href,$id)
	{
		return self::linkImageToString($href,'Find.png','Visualizar',$id);
	}
}
?>