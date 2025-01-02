<?php
//@TODO OUT SISPLAD ATA
include_once 'File.php';

class LibUpload
{
	/**
	 * @author Vitor Castro
	 * @desc retorna um objeto encapsulado com o upload
	 * @param Somente o nome do Vetor FILES
	 * @since 04/08/2009
	 * @version 01/09/2009
	 * @see lin 27 - adicionada restrição para upload somente de arquivos PDF, MSWORD, DOC, ODT
	 */
	public function factoryFile()
	{
		return new File();
	}	
	
	public function upload($file)
	{
		$arquivo = $_FILES["$file"];

		include_once '../library/Documento.php';

		$documento = new Documento();

		$documento->setTmp($arquivo['tmp_name']);
		$documento->setType($this->verificaTipoArquivo($arquivo['type']));
		$documento->setSize($arquivo['size']);
		$documento->setNome($arquivo['name']);

		$tiposPermitidos = array(1, 8, 3, 10, 2, 4, 5,11,12); // PDF, MSWORD, DOC, ODT, DOCX

		if(is_uploaded_file($documento->getTmp()) && (in_array($documento->getType(), $tiposPermitidos)))
		{
			$documento->setBlob(file_get_contents($documento->getTmp()));
			return $documento;
				
		}else return false;

	}

	public function retornaTipoArquivo($tipo)
	{
		switch ($tipo)
		{
			// pdf
			case '1':
				{
					return $tipo = 'application/pdf';
					break;
				}
				// docx
			case '2':
				{
					return $tipo = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
					break;
				}
				// doc
			case '3':
				{
					return $tipo = 'application/doc';
					break;
				}
				// xls
			case '4':
				{
					return $tipo = 'application/vnd.ms-excel';
					break;
				}
				// xlsx
			case '5':
				{
					return $tipo = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
					break;
				}
				// pptx
			case '6':
				{
					return $tipo = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
					break;
				}
				// ppt
			case '7':
				{
					return $tipo = 'application/vnd.ms-powerpoint';
					break;
				}
			case '8':
				{
					return $tipo = 'application/msword';
					break;
				}
			case '9':
				{
					return $tipo = 'image/png';
					break;
				}
				//odt
			case '10':
				{
					return $tipo= 'application/vnd.oasis.opendocument.text';
					break;
				}
			case '11':
				{
					return 'application/vnd.oasis.opendocument.spreadsheet';
					break;
				}
			case '12':
				{
					return 'application/zip';
					break;
				}
					
			default:
				{
					return 'DOCUMENTO_INDEVIDO';
					break;
				}
		}
	}

	private	function verificaTipoArquivo($tipo)
	{
		switch ($tipo)
		{
			// pdf
			case 'application/pdf':
				{
					return $tipo = 1;
					break;
				}
				// docx
			case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
				{
					return $tipo = 2;
					break;
				}
				// doc
			case 'application/doc':
				{
					return $tipo = 3;
					break;
				}
				// xls
			case 'application/vnd.ms-excel':
				{
					return $tipo = 4;
					break;
				}
				// xlsx
			case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
				{
					return $tipo = 5;
					break;
				}
				// pptx
			case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
				{
					return $tipo = 6;
					break;
				}
				// ppt
			case 'application/vnd.ms-powerpoint':
				{
					return $tipo = 7;
					break;
				}
				// doc
			case 'application/msword':
				{
					return $tipo = 8;
					break;
				}
			case 'image/png':
				{
					return $tipo = 9;
					break;
				}
			case 'application/vnd.oasis.opendocument.text':
				{
					return $tipo = 10;
					break;
				}
			case 'application/vnd.oasis.opendocument.spreadsheet':
				{
					return 11;
					break;
				}
			case 'application/zip':
				{
					return 12;
					break;
				}

			default:
				{
					return 'DOCUMENTO_INDEVIDO';
					break;
				}
		}
	}
}


?>