<?php

include_once '../../controller/ControllerDetalhes.php';

$controllerDetalhes = new ControllerDetalhes();

$idpesca = $_POST['idPescaAjax'];

$controllerDetalhes->desativarPesca($idpesca);