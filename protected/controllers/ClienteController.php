<?php

/**
 * ClienteController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class ClienteController extends CController {
	
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