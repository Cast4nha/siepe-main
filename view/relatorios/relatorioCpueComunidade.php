<?php
include_once '../../library/vendor/autoload.php';
include_once '../../controller/ControllerComunidade.php';
include_once 'RelatorioHelper.php';

$controllerComunidade = new ControllerComunidade();
$helper = RelatorioHelper::getInstance();

if (isset($_POST['gerarCpueComunidade'])) {
    extract($_POST);
    
    $cpue = array();
    $desc = '<div class="desc"> <b>Busca realizada:</b> <br>';
    $desc .= '<b>Comunidades:</b><br>';
    
    if ($comunidades != null) {
        foreach ($comunidades as $comunidade) {
            $desc .= $controllerComunidade->getAction()
                ->getById($comunidade)
                ->getDescricao() . '<br>';
            
            $resCpue = $controllerComunidade->getAction()->getCpueComunidade($comunidade);
            
            if (is_object($resCpue))
                array_push($cpue, $resCpue);
        }
        
        if (count($cpue) != 0) {
            $result = '<table>
                <tr>
                    <th>Comunidade</th>
                    <th>CPUE</th>
                </tr>';
            foreach ($cpue as $res) {
                $result .= '<tr>
                        <td>' . $res->getDescricao() . '</td>
                        <td>' . number_format($res->cpue, 3) . '</td>
                    </tr>';
            }
            
            $result .= '</table>';
        } else {
            $result = '<div class="wrong-search">Não há resultados para a busca realizada!</div>';
        }
    } else {
        $cpue = $controllerComunidade->getAction()->getAllCpueComunidade();
        
        if (count($cpue) != 0) {
            $result = '<table>
                <tr>
                    <th>Comunidade</th>
                    <th>CPUE</th>
                </tr>';
            foreach ($cpue as $res) {
                
                $result .= '<tr>
                        <td>' . $res->getDescricao() . '</td>
                        <td>' . number_format($res->cpue, 3) . '</td>
                    </tr>';
            }
            
            $result .= '</table>';
            $desc .= "Todas.";
        } else {
            $result = '<div class="wrong-search">Não há resultados para a busca realizada!</div>';
        }
    }
    $desc .= '</div>';
    
    // Montar PDF
    $mpdf = new \Mpdf\Mpdf(['tempDir' => '/tmp']);
    $mpdf->SetDisplayMode('fullpage');
    $css = file_get_contents('../../css/relatorio.css');
    
    $mpdf->WriteHTML($helper->getCss(), 1);
    $mpdf->WriteHTML($helper->getHeader());
    $mpdf->WriteHTML($helper->getTitle('Relatório de CPUE por Comunidade'));
    $mpdf->WriteHTML($desc);
    $mpdf->WriteHTML($result);
    $mpdf->SetHTMLFooter($helper->getFooter());
    
    $mpdf->Output('siepe_rel_cpue_com' . date("d_m_Y_H_i_s") . '.pdf', 'I');
}
?>
