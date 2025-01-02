<?php
include_once '../../controller/ControllerPesca.php';

$controllerPesca = new ControllerPesca();
$cpues = $controllerPesca->getAction()->getCpueAno();
$data = array();
foreach ($cpues as $cpue) {
    if ($cpue->cpue != null && $cpue->ano != null) {
        array_push($data, $cpue);
    }
}
echo json_encode($data);
?>