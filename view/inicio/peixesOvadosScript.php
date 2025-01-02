<?php
include_once '../../controller/ControllerPesca.php';

$controllerPesca = new ControllerPesca();
$peixes = $controllerPesca->getAction()->getQtdPeixesOvados();

if(count($peixes) > 5) {
    $peixes = array_slice($peixes, 0, 5);
}
echo json_encode($peixes);
?>