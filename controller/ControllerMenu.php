<?php
include_once '../../library/Import.php';
Import::controller('Controller');
Import::controller('ControllerPlanoAcademico');
Import::bean('Perfil');
Import::library('Session');

class ControllerMenu extends Controller
{

    public function getMenu()
    {
        $session = $this->LibSession();
        
        $idPerfil = $session->getSession('idperfil');
        
        switch ($idPerfil) {
            // Adminstrador do Sistema
            case Perfil::ADMINISTRADOR:
                {
                    $this->getMenuAdmin();
                    break;
                }
            case Perfil::DOCENTE:
                {
                    $this->getMenuDocente();
                    break;
                }
            case Perfil::COLABORADOR:
                {
                    $this->getMenuColaborador();
                    break;
                }
            case Perfil::BOLSISTA:
                {
                    $this->getMenuBolsista();
                    break;
                }
        }
    }

    private function getMenuAdmin()
    {
        echo '<nav><div class="nav-wrapper light-blue darken-4"><span>&nbsp&nbsp&nbsp</span><a href="index.php?action=inicio" class="brand-logo left"><i class="large material-icons">directions_boat</i>SIEPE</a><a href="" data-activates="menu-mobile" class="right button-collapse"><i class="material-icons">menu</i></a><ul id="nav-mobile" class="right hide-on-med-and-down">';
        
        $this->liMenuLink('?action=inicio', 'Início', 1);
        
        $this->liMenuLink('opcoesConfiguracoes', 'Configurações', 2, true);
	        $this->ulMenu('opcoesConfiguracoes');
	       		$this->liMenu('gerenciarUsuario','Gerenciar Usuários');
	       		$this->liMenu('estrategiaGerenciar','Estratégia de Importação/Exportação');
	        $this->ulClose();
        $this->liMenuLink('?action=cadastrarPesca', 'Registrar Pesca', 3);
        $this->liMenuLink('opcoesCadastros', 'Cadastros', 4, true);
	        $this->ulMenu('opcoesCadastros');
		        $this->liMenu('cadastrarAmbiente','Ambiente');
		        $this->liMenu('cadastrarComunidade','Comunidade');
		        $this->liMenu('cadastrarInstituicao', 'Instituição');
		        $this->liMenu('cadastrarEmbarcacao','Embarcação');
		        $this->liMenu('cadastrarInstrumento','Instrumento de Pesca');
		        $this->liMenu('cadastrarEstrategia', 'Estratégia de Pesca');
		        $this->liMenu('cadastrarPeixe','Peixe');
		        $this->liMenu('cadastrarTipoComprador','Tipo de Comprador');
	        $this->ulClose();
        $this->liMenuLink('?action=importar', 'Importar', 5);
        $this->liMenuLink('?action=consultas', 'Consultas', 6);
        $this->liMenuLink('?action=relatorios', 'Relatórios', 7);
        $this->liMenuLink('../inicio/sair.php', 'Sair', 8);
        
        echo '</ul>';
        
        echo '<ul id="menu-mobile" class="side-nav nav-item">';
        $this->liMenuLink('?action=inicio', 'Início', 1);
        $this->liMenuLink('opcoesConfiguracoesMobile', 'Configurações', 2, true);
	        $this->ulMenu('opcoesConfiguracoesMobile');
	        	$this->liMenu('gerenciarUsuario','Gerenciar Usuários');
	        $this->ulClose();
        $this->liMenuLink('?action=cadastrarPesca', 'Registrar Pesca', 3);
        $this->liMenuLink('opcoesCadastrosMobile', 'Cadastros', 4, true);
	        $this->ulMenu('opcoesCadastrosMobile');
		        $this->liMenu('cadastrarAmbiente','Ambiente');
		        $this->liMenu('cadastrarComunidade','Comunidade');
		        $this->liMenu('cadastrarInstituicao', 'Instituição');
		        $this->liMenu('cadastrarEmbarcacao','Embarcação');
		        $this->liMenu('cadastrarInstrumento','Instrumento de Pesca');
		        $this->liMenu('cadastrarEstrategia', 'Estratégia de Pesca');
		        $this->liMenu('cadastrarPeixe','Peixe');
		        $this->liMenu('cadastrarTipoComprador','Tipo de Comprador');
	        $this->ulClose();
        $this->liMenuLink('?action=importar', 'Importar', 5);
        $this->liMenuLink('?action=consultas', 'Consultas', 6);
        $this->liMenuLink('?action=relatorios', 'Relatórios', 7);
        $this->liMenuLink('../inicio/sair.php', 'Sair', 8);
        
        echo '</ul></div></nav><script type="text/javascript">$(".button-collapse").sideNav();</script>';
        /*
         * <div class="social">
         * <a target="_blank" href="https://twitter.com/tmrDevelops"><i class="fa fa-twitter"></i></a>
         * </div>
         */
    }

    private function getMenuDocente()
    {
    	echo '<nav><div class="nav-wrapper light-blue darken-4"><span>&nbsp&nbsp&nbsp</span><a href="index.php?action=inicio" class="brand-logo left"><i class="large material-icons">directions_boat</i>SIEPE</a><a href="#" data-activates="menu-mobile" class="right button-collapse"><i class="material-icons">menu</i></a><ul id="nav-mobile" class="right hide-on-med-and-down">';
        $this->liMenuLink('?action=inicio', 'Inicio', 1);
        //$this->liMenuLink('?action=meuperfil', 'Perfil', 2);
        $this->liMenuLink('?action=cadastrarPesca', 'Registrar Pesca', 2);
        $this->liMenuLink('?action=importar', 'Importar', 3);
        $this->liMenuLink('?action=consultas', 'Consultas', 4);
        $this->liMenuLink('?action=relatorios', 'Relatórios', 5);
        $this->liMenuLink('../inicio/sair.php', 'Sair', 6);
        echo '</ul>';
        
        echo '<ul id="menu-mobile" class="side-nav nav-item">';
        $this->liMenuLink('?action=inicio', 'Inicio', 1);
        //$this->liMenuLink('?action=meuperfil', 'Perfil', 2);
        $this->liMenuLink('?action=cadastrarPesca', 'Registrar Pesca', 2);
        $this->liMenuLink('?action=importar', 'Importar', 3);
        $this->liMenuLink('?action=consultas', 'Consultas', 4);
        $this->liMenuLink('?action=relatorios', 'Relatórios', 5);
        $this->liMenuLink('../inicio/sair.php', 'Sair', 6);
        echo '</ul></div></nav><script type="text/javascript">$(".button-collapse").sideNav();</script>';
    }

    private function getMenuColaborador()
    {
    	echo '<nav><div class="nav-wrapper light-blue darken-4"><span>&nbsp&nbsp&nbsp</span><a href="index.php?action=inicio" class="brand-logo left"><i class="large material-icons">directions_boat</i>SIEPE</a><a href="#" data-activates="menu-mobile" class="right button-collapse"><i class="material-icons">menu</i></a><ul id="nav-mobile" class="right hide-on-med-and-down">';
    	$this->liMenuLink('?action=inicio', 'Inicio', 1);
    	//$this->liMenuLink('?action=meuperfil', 'Perfil', 2);
    	$this->liMenuLink('?action=cadastrarPesca', 'Registrar Pesca', 2);
    	$this->liMenuLink('?action=consultas', 'Consultas', 3);
    	$this->liMenuLink('../inicio/sair.php', 'Sair', 4);
    	echo '</ul>';
    	
    	echo '<ul id="menu-mobile" class="side-nav nav-item">';
    	$this->liMenuLink('?action=inicio', 'Inicio', 1);
    	//$this->liMenuLink('?action=meuperfil', 'Perfil', 2);
    	$this->liMenuLink('?action=cadastrarPesca', 'Registrar Pesca', 2);
    	$this->liMenuLink('?action=consultas', 'Consultas', 3);
    	$this->liMenuLink('../inicio/sair.php', 'Sair', 4);
    	echo '</ul></div></nav><script type="text/javascript">$(".button-collapse").sideNav();</script>';
    }

    private function getMenuBolsista()
    {
    	echo '<nav><div class="nav-wrapper light-blue darken-4"><span>&nbsp&nbsp&nbsp</span><a href="index.php?action=inicio" class="brand-logo left"><i class="large material-icons">directions_boat</i>SIEPE</a><a href="#" data-activates="menu-mobile" class="right button-collapse"><i class="material-icons">menu</i></a><ul id="nav-mobile" class="right hide-on-med-and-down">';
    	$this->liMenuLink('?action=inicio', 'Inicio', 1);
    	//$this->liMenuLink('?action=meuperfil', 'Perfil', 2);
    	$this->liMenuLink('?action=cadastrarPesca', 'Registrar Pesca', 2);
    	$this->liMenuLink('../inicio/sair.php', 'Sair', 3);
    	echo '</ul>';
    	
    	echo '<ul id="menu-mobile" class="side-nav nav-item">';
    	$this->liMenuLink('?action=inicio', 'Inicio', 1);
    	//$this->liMenuLink('?action=meuperfil', 'Perfil', 2);
    	$this->liMenuLink('?action=cadastrarPesca', 'Registrar Pesca', 2);
    	$this->liMenuLink('../inicio/sair.php', 'Sair', 3);
    	echo '</ul></div></nav><script type="text/javascript">$(".button-collapse").sideNav();</script>';
    }

    private function menu($nome, $link)
    {
        echo '<li><a href="', $link, '">', $nome, '</a>';
    }

    private function ulMenu($id = teste)
    {
        echo '<ul id="'.$id.'" class="dropdown-content">';
    }

    private function ulClose()
    {
        echo '</ul>';
    }

    private function liMenu($action, $label)
    {
        echo '<li><a id="menu-', $action, '" href="?action=', $action, '">', $label, '</a></li>';
    }

    private function liClose()
    {
        echo '</li>';
    }

    private function liMenuLink($link, $label, $id, $dropdown = false)
    {
        $url = explode('index.php', $_SERVER['REQUEST_URI']);
        if (!$dropdown) {
	        if($url[1] == $link ){
	            echo '<li id="menu-', $id, '" class="active"><a href="', $link, '" target="_self">', $label, '</a>';
	        }else {
	            echo '<li id="menu-', $id, '"><a href="', $link, '" target="_self">', $label, '</a>';
	        }
        }
        else {
        	if($url[1] == $link ){
        		echo '<li id="menu-', $id, '" class="active"><a href="#" data-beloworigin="true" data-activates="'.$link.'" class="dropdown-button">', $label, '<i class="material-icons right">arrow_drop_down</i></a></li>';
        	}else {
        		echo '<li id="menu-', $id, '"><a href="#" data-beloworigin="true" data-activates="'.$link.'" class="dropdown-button">', $label, '<i class="material-icons right">arrow_drop_down</i></a></li>';
        	}
        }
    }
}

?> 