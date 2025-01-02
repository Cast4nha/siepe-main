<?php
class LibUtils
{
    public static function calcularDiferencaHoras ($horaInicio, $horaFim) {
        
        $horaInicio = explode(":", $horaInicio); 
        $horaFim = explode(":", $horaFim);
        
        if ($horaInicio[1] > $horaFim[1]) {
            $horaFim[1] = $horaFim[1] + 60;
            $horaFim[0] = $horaFim[0] - 1;
        }
        if ($horaInicio[0] > $horaFim[0]) {
            $horaFim[0] = $horaFim[0] + 24;
        }
        $hora = $horaFim[0] - $horaInicio[0];
        $minuto = $horaFim[1] - $horaInicio[1];
        $tempo = '';
        if ($hora < 10) {
            $tempo .= '0';
        }
        $tempo .= $hora . ':';
        if ($minuto < 10) {
            $tempo .= '0';
        }
        $tempo .= $minuto;
        return $tempo;
    }
}