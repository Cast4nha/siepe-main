<?php
include_once '../../controller/ControllerPesca.php';

$controllerPesca = new ControllerPesca();
$ano = $_GET['ano'];
$pescas = $controllerPesca->getAction()->getQtdPescaComunidadeByAno($ano);

if(count($pescas) > 5) {
    $pescas = array_slice($pescas, 0, 5);
}
echo json_encode($pescas);
?>