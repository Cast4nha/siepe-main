<?php
include_once '../../controller/ControllerCidade.php';

$controllerCidade = new ControllerCidade();
$idEstado = $_POST['idEstado'];

$cidades = $controllerCidade->getAction()->getAllByEstado($idEstado);
$response = "";

if (count($cidades) != 0) {
    $response = json_encode($cidades, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
} else {
    $response = null;
}

echo $response;
?>