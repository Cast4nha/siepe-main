<?php

class RelatorioHelper
{

    private static $instance;

    private function __construct()
    {}

    static public function getInstance()
    {
        if (! isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class();
        }
        
        return self::$instance;
    }

    public function getHeader()
    {
        $header = '<img id="brasao" src="../../images/brasao.png">
    	<div class="header_text">Universidade Federal do Sul e Sudeste do Pará</div>
    	<div class="header_text">Laboratório de Computação Científica - LCC</div>
    	<div class="header_text">Sistema Integrado de Estatística Pesqueira - SIEPE</div>';
        return $header;
    }

    public function getTitle($text)
    {
        $title = '<div class="title">' . $text . '</div>';
        return $title;
    }

    public function getFooter()
    {
        $footer = '_______________________________________________________________________________________________________';
        
        $footer .= '<br><div class="footer">Emitido em ' . date("d/m/Y") . ' as ' . date('H:i:s') . '</div>';
        
        return $footer;
    }

    public function getCss()
    {
        return file_get_contents('../../css/relatorio.css');
    }
}

