<?php
include_once '../../controller/ControllerEstrategia.php';

$controllerEstrategia = new ControllerEstrategia();
$idInstrumento =  $_POST['idInstrumento'];

$estrategias = $controllerEstrategia->getAction()->findByInstrumento($idInstrumento);
$response = "";
if(count($estrategias) != 0){
  $response = json_encode($estrategias, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
} else {
  $response = null;
}
echo $response;
?>
