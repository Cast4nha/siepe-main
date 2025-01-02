<?php

class File
{
	private $tmpName;
	private $size;
	private $name;
	private $blob;
	private $type;
	
	public function setNewFile($name,$tmpName,$size,$type)
	{
		$this->tmpName = $tmpName;
		$this->name = $name;
		$this->size = $size;
		$this->type = $type;
		$this->upload();
	}
	
	public function setFileFromArray($arrayFile)
	{
		$this->setNewFile($arrayFile['name'], $arrayFile['tmp_name'],$arrayFile['size'], $arrayFile['type']);
	}
	
	public function setFileDownload($name,$type,$blob)
	{
		$this->blob = $blob;
		$this->name = $name;
		$this->type = $type;
	}
	
	public function setFileOutPutDownload($name,$type,$blob)
	{
		$this->setFileDownload($name, $type, $blob);
		$this->download();
	}
	
	public function upload()
	{
		$typePermission = array(1, 2, 3, 4, 8, 9, 10, 11);
		
		if(is_uploaded_file($this->tmpName) && (in_array($this->getIdFromType(), $typePermission)))
			$this->blob = file_get_contents($this->tmpName);
	}
	
	public function download()
	{
		header("Content-Disposition: attachment; filename=".$this->getNameFileDownload()."");
		header("Content-type: ".$this->getTypeFromId($this->type)." ");
		echo $this->blob;
	}
	
	private function getNameFileDownload()
	{
		return str_replace(' ', '_', $this->name);
	}
	
	public function isUpload()
	{
		if ($this->blob)
			return true;
		
		return false;
	}
	
	public function getTmpName()
	{
		return $this->tmpName;
	}
	
	public function getSize()
	{
		return $this->size;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getBlob()
	{
		return $this->blob;
	}
	
	public function getIdFromType()
	{
		switch ($this->type)
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
			case 'image/jpeg':
				{
					return $tipo = 11;
					break;
				}
			default:
				{
					return 'DOCUMENTO_INDEVIDO';
					break;
				}
		}
	}
	
	public function getTypeFromId($id)
	{
		switch ($id)
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
			case '10':
				{
					return $tipo = 'application/vnd.oasis.opendocument.text';
					break;
				}
			case '11':
				{
					return $tipo = 'image/jpeg';
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