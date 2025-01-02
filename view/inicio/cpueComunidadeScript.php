<?php
include_once '../../controller/ControllerPesca.php';

$controllerPesca = new ControllerPesca();
$cpues = $controllerPesca->getAction()->getCpueComunidade();
$data = array();

foreach ($cpues as $cpue) {
    if ($cpue->comunidade != null && $cpue->cpue != null) {
        array_push($data, $cpue);
    }
}
if (count($data) > 5) {
    $data = array_slice($data, 0, 5);
}

echo json_encode($data);
?>