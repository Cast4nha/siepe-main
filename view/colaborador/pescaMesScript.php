<?php
include_once '../../controller/ControllerPesca.php';

$controllerPesca = new ControllerPesca();
$ano = $_GET['ano'];
$pescas = $controllerPesca->getAction()->getQtdPescaMesByAno($ano);

$data = array();
$found = false;
for($i = 1; $i <= 12; $i++)
{
    $found = false;
    foreach ($pescas as $pesca)
    {
        if (intval($pesca->getMespesca()) == $i) {
            $found = true;
            array_push($data, $pesca->qtd);
        }
    }
    if ($found==false) { array_push($data, 0); }
    
}
echo json_encode($data);
?>