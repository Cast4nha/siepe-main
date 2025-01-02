<?php

	function intGet( $campo ){
		return isset( $_GET[$campo] ) ? (int)$_GET[$campo] : 0;
	}	
	function retorno( $id )
	{
		$sql = "SELECT id,descricao
			FROM cidade 
			WHERE idEstado = $id ";
		$sql .= "ORDER BY descricao ";	
		
		$mysqli = new mysqli("localhost", "rromulo", "rr3131", "csc");	
		$q = $mysqli->query( $sql ); 

		$json = ' [';
		if( $q->num_rows > 0 ) 
		{
			while( $dados = $q->fetch_object() )
			{
				$json .= '{"descricao":"'.utf8_encode($dados->descricao).'","id":"'.$dados->id.'"}, ';
			}
		}
		else
			$json .= '{"descricao": "'.$id.'"}';
		$json .= ']';		
		return $json;
	}
	
	echo retorno( intGet('estado') );
	?>