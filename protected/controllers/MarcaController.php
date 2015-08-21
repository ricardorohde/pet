<?php

/**
 * MarcaController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class MarcaController extends CController {
	
	public $defaultAction='abrirMarca';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	/**
	 * Marca
	 */ 
	public function actionAbrirMarca() {
		$this->layout = 'somentehtml';
		$this->render('marca');
	}
	
	public function actionSalvarMarca() {
		$parametros = Util::getParametrosJSON();
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$marca = Marca::model()->findByPk($parametros['id']);
		}else{
			$marca = new Marca;
		}
		
		$marca->nome = $parametros['nome'];
		$marca->status = $parametros['status'];
		$marca->descricao = $parametros['descricao'];
		$marca->petshop = Yii::app()->user->petatual;
		
		$response = array();
		try{
			if($marca->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarMarca() {
		$parametros = Util::getParametrosJSON();
		
		$marca = Marca::model()->findByPk($parametros['id']);
		
		$response = array();
		try{
			if($marca->delete()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			if(strpos($e->getMessage(),'Integrity constraint') !== false){
				$response['sucesso'] = false;
				$response['mensagem'] = 'Esse registro está sendo usado em outro local do sistema!';
			}else{
				throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
			}
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionFindAllMarca() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " petshop=:petshop ";
		$params = array(':petshop'=>Yii::app()->user->petatual);
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$marcas = Marca::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($marcas as $key => $marca) {
			$jsons[] = $marca;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
}