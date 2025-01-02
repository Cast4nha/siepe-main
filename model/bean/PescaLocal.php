 <?php
 class PescaLocal
 {
     private $idpesca;
     private $idlocal;
     
     public function getIdpesca()
     {
         return $this->idpesca;
     }
 
     public function getIdlocal()
     {
         return $this->idlocal;
     }
 
     public function setIdpesca($idpesca)
     {
         $this->idpesca = $idpesca;
     }
 
     public function setIdlocal($idlocal)
     {
         $this->idlocal = $idlocal;
     }
 }
 ?>