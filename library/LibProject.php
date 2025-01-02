<?php
class LibProject
{

    public static function removerAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
    
	public function index()
	{
		include_once '../controller/Controller.php';
		$controller = new Controller();
		
		if ( !( isset($_GET['view']) ) )
		{
			$view = $_GET['view'];
			$caminho = "../$view/inicio.php";

			if (file_exists($caminho))
			{
				include "$caminho";
			}else 
			{
				$controller->LibMessage()->msgErro('Página inválida.', 400);
			}
		}
		else 
		{
			$view = $_GET['view'];
			$action = $_GET['action'];
			
			$caminho = "../$view/$action.php";
			
			
			if (file_exists($caminho))
			{
				include "$caminho"; 
			}else 
			{
				$controller->LibMessage()->msgErro('Página inválida.', 400);
			}
		}
	}
	
	public function ListDia($nome)
	{
		echo '<select name="',$nome,'">';
		echo '<option value="0">Dia</option>';
				
		for($i=1;$i<=31;$i++)
		{
			if (strlen($i) == 1)
			{
				$d = '0'.$i;
			}else $d = $i;
			
			echo '<option value="',$d,'">',$d,'</option>';
		}

		echo '</select>';
	}
	
	public function ListMes($nome)
	{
		echo '<select name="',$nome,'">';
		echo '<option value="0">Mês</option>';
		
		for($i=1;$i<=12;$i++)
		{
			if (strlen($i) == 1)
			{
				$m = '0'.$i;
			}else $m = $i;
			
			echo '<option value="',$m,'">',$this->getMes($m),'</option>';
		}

		echo '</select>';
	}
	
	public function getMes($mes)
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
	
	public function ListAno($nome)
	{
		echo '<select name="',$nome,'">';
		echo '<option value="0">Ano</option>';
		
		for($i=2009;$i<=2010;$i++)
		{
			echo '<option value="',$i,'">',$i,'</option>';
		}
		echo '</select>';
	}
	
	public function ListHora($nome)
	{
		echo '<select name="',$nome,'">';
		echo '<option value="0">Hora</option>';
		
		for($i=0;$i<=24;$i++)
		{
			if (strlen($i) == 1)
			{
				$h = '0'.$i;
			}else $h = $i;
			echo '<option value="',$h,'">',$h,'</option>';
		}
		echo '</select>';
	}
	
	public function ListMinutos($nome)
	{
		echo '<select name="',$nome,'">';
		echo '<option value="0">Minutos</option>';
		
		for($i=0;$i<60; $i= $i+15)
		{
			if (strlen($i) == 1)
			{
				$m = '0'.$i;
			}else $m = $i;
			
			echo '<option value="',$m,'">',$m,'</option>';
		}
		echo '</select>';
	}
	
	public function trataData($data)
	{
		$ano = substr($data,0,4);
		$mes = substr($data,5,2);
		$dia = substr($data,8,2);
		return $data = $dia."/".$mes."/".$ano;
	}
	
	public function trataDataBD($data)
	{
		$dataT['ano'] = substr($data,0,4);
		$dataT['mes'] = substr($data,5,2);
		$dataT['dia'] = substr($data,8,2);
		return $dataT;
	}
	
	public function formataData($data)
	{
		$ano = substr($data,6,4);
		$mes = substr($data,3,2);
		$dia = substr($data,0,2);
		return $data = $ano.'-'.$mes.'-'.$dia;
	}
	
	public function trataHora($hora)
	{
		$hora = substr($hora,11,5);
		return $hora;
	}
	
	public function verificaReal($value)
	{
    	$value = preg_replace('#^([-]*[0-9\.,\' ]+?)((\.|,){1}([0-9-]{1,2}))*$#e', "str_replace(array('.', ',', \"'\", ' '), '', '\\1') . '.' . sprintf('%02d','\\4')", $value);
    	return floatval($value);
	}
	
	public function replaceVirgula($string)
	{
		return str_replace(",",".",$string);
	}
	
	public function replacePontoParaVirgula($string)
	{
		return str_replace(".",",",$string);
	}
	
	public function verificaTexto($texto)
	{
		if (strlen($texto) == 0)
		{
			return $texto = 'Não Cadastrado';
		}else return nl2br($texto);	
	}
	
	public function ListMesExecucao($name,$selected)
	{
		include_once '../../library/LibHtml.php';
		$html = new LibHtml();
		
		$html->openSelect($name);
		
		for ($i=1;$i<=24;$i++)
		{
			if ($i == $selected)
			{
				$html->optionSelected($i,"$i".'° Mês de Execução',true);
			}else $html->optionSelect($i,"$i".'° Mês de Execução');
		}
		
		$html->closeSelect();
	}
	
	public function formatNumber($numero)
	{
		return number_format($numero,'2',',','.');
	}
	
	/**
	 * @author Vitor Castro <vitor@ufpa.br>
	 * @desc
	 * @param $operacao [C ->cadastrar, E ->distribuição, X ->exclusão] 
	 * @return
	 * @since 05/03/2010
	 * @uses 
	 */
	public function redirectRubrica($idRubrica,$operacao)
	{
		include_once '../../library/LibScript.php';
		$script = new LibScript();
		
		$rubrica = $this->trataRubrica($idRubrica);
		$operacao = $this->trataOperacao($operacao);
				
		$return = array();
		
		$return['action'] = $operacao['menu'].$rubrica['menu'];
		$return['msg'] = $operacao['msg'].$rubrica['msg'].'realizado com sucesso';		
		$return['erro'] = $operacao['erro'].$rubrica['msg'];		
		
		return $return; 
	}
	
	public function trataRubrica($idRubrica)
	{
		$return = array();
		
		switch ($idRubrica)
		{
			case '2':
				{
					$return['menu'] = 'Diaria';
					$return['msg'] = ' Diárias ';
					return $return;
				}
			case '3':
				{
					$return['menu'] = 'ServicoJuridica';
					$return['msg'] = ' Serviço de Terceiros Pessoa Jurídica ';
					return $return;
				}
			case '4':
				{
					$return['menu'] = 'ServicoFisica';
					$return['msg'] = ' Serviço de Terceiros Pessoa Física ';
					return $return;
				}
			case '5':
				{
					$return['menu'] = 'MaterialPermanente';
					$return['msg'] = ' Material Permanente ';
					return $return;
				}
			case '6':
				{
					$return['menu'] = 'MaterialConsumo';
					$return['msg'] = ' Material de Consumo ';
					return $return;
				}
			case '7':
				{
					$return['menu'] = 'BolsistaProjeto';
					$return['msg'] = ' Bolsista ';
					return $return;
				}
			case '8':
				{
					$return['menu'] = 'Passagem';
					$return['msg'] = ' Passagens ';
					return $return;
				}
				
				
			default:
				{
					return false;
				}
		}
		
		
	}
	
	public function trataOperacao($operacao)
	{
		$return = array();
		
		switch ($operacao)
		{
			case 'CAD':
				{
					$return['menu'] = 'cadastrar';
					$return['msg'] = 'Cadastro de ';
					$return['erro'] = 'Falha no cadastro de';
					return $return;
				}
			case 'GER':
				{
					$return['menu'] = 'gerenciar';
					$return['msg'] = 'Edição de ';
					$return['erro'] = 'Falha no cadastro de';
					return $return;
				}
			case 'CON':
				{
					$return['menu'] = 'consultar';
					$return['msg'] = 'Cadastro de ';
					$return['erro'] = 'Falha na ..';
					return $return;
				}
			case 'EXC':
				{
					$return['menu'] = 'gerenciar';
					$return['msg'] = 'Exclusão de ';
					$return['erro'] = 'Falha na exclusão';
					return $return;
				}
			case 'EDI':
				{
					$return['menu'] = 'editar';
					$return['msg'] = 'Edição de ';
					$return['erro'] = 'Falha na edição';
					return $return;
				}
		}
	}
	
	 public function trataPeriodoBolsista($periodo)
	 {
		$i = $this->trataPeriodo($periodo);
		$tmpi = 0;
		$vet = array();
		for($j=1;$j<=$i;$j++)
		{
		if ($teste = substr($periodo,$tmpi,2))
		{
			$tmpi =$tmpi + 2;
			$vet["$teste"] = $teste;
		}
	
		}
		return $vet;
	 }
	 
	 public function trataPeriodo($periodo)
	 {
		return $periodo = strlen($periodo) / 2;
	 }
	public function cabecalhoAjax()
	{
		header("Content-type: text/html; charset=iso-8859-1");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
	}
	
}
?>