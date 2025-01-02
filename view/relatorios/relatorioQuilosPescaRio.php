<?php
include_once ('../../library/vendor/autoload.php');
include_once ('../../controller/ControllerPesca.php');
include_once ('RelatorioHelper.php');

$controllerPesca = new ControllerPesca();
$helper = RelatorioHelper::getInstance();

if (isset($_POST['gerarQuantPesca'])) {
    extract($_POST);
    
    $quantitativo = $controllerPesca->getAction()->getQuantPesca($data_inicial, $data_final, $rio);
    
    $desc = '<div class="desc"> <b>Busca Geral</b> <br>';
    
    if (! empty($data_inicial) || ! empty($data_final) || ! empty($rio)) {
        $desc = '<div class="desc"> <b>Busca realizada:</b> <br>';
        
        if (! empty($data_inicial))
            $desc .= '<b>Data Inicial:</b> ' . date_format(new DateTime($data_inicial), 'd/m/Y') . '<br>';
        if (! empty($data_final))
            $desc .= '<b>Data Final:</b> ' . date_format(new DateTime($data_final), 'd/m/Y') . '<br>';
        if (! empty($rio))
            $desc .= '<b>Rio:</b> ' . $rio . '<br>';
        
        $desc .= '</div>';
    }
    // Resultado da busca
    if (count($quantitativo) != 0) {
        $result = '<table>
                <tr>
                    <th>Rio</th>
                    <th>Quantitativo(kg)</th>
                </tr>';
        foreach ($quantitativo as $quant) {
            $result .= '<tr>
                        <td>' . $quant->descricao . '</td>
                        <td>' . $quant->quant . '</td>
                    </tr>';
        }
        $result .= '</table>';
    } else {
        $result = '<div class="wrong-search">Não há resultados para a busca realizada!</div>';
    }
    
    //Montar PDF
    $mpdf = new \Mpdf\Mpdf(['tempDir' => '/tmp']);
    $mpdf->SetDisplayMode('fullpage');
    $css = file_get_contents('../../css/relatorio.css');
    
    $mpdf->WriteHTML($helper->getCss(), 1);
    $mpdf->WriteHTML($helper->getHeader());
    $mpdf->WriteHTML($helper->getTitle('Relatório de Quilos de Pescado por Rio'));
    $mpdf->WriteHTML($desc);
    $mpdf->WriteHTML($result);
    $mpdf->SetHTMLFooter($helper->getFooter());
    
    $mpdf->Output('siepe_rel_quilos' . date("d_m_Y_H_i_s") . '.pdf', 'I');
}
?>
