<?php

/**
 * LaboratorioController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class LaboratorioController extends CController {
	
	public $defaultAction='inicio';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	public function actionInicio() {
		$this->layout = 'somentehtml';
		$this->render('inicio');
	}
	
}