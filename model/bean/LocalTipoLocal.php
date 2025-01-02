<?php
 class LocalTipolocal
 {
     private $idlocal;
     private $idtipolocal;
     
     public function getIdlocal()
     {
         return $this->idlocal;
     }
 
     public function getIdtipolocal()
     {
         return $this->idtipolocal;
     }
 
     public function setIdlocal($idlocal)
     {
         $this->idlocal = $idlocal;
     }
 
     public function setIdtipolocal($idtipolocal)
     {
         $this->idtipolocal = $idtipolocal;
     }
 }
 ?>