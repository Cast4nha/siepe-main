<?php
include_once '../../controller/ControllerPesca.php';

$controllerPesca = new ControllerPesca();
$pescas = $controllerPesca->getAction()->getQtdPescaComunidade();

if(count($pescas) > 5) {
    $pescas = array_slice($pescas, 0, 5);
}
echo json_encode($pescas);
?>