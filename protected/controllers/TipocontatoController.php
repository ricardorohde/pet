<?php

/**
 * TipocontatoController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class TipocontatoController extends CController {
	
	public $defaultAction='abrirTipocontato';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	/**
	 * TipoContato
	 */ 
	public function actionAbrirTipocontato() {
		$this->layout = 'somentehtml';
		$this->render('tipocontato');
	}
	
	public function actionSalvarTipocontato() {
		$parametros = Util::getParametrosJSON();
		
		$tipocontato = new Tipocontato;
		$tipocontato->nome = $parametros['nome'];
		
		$response = array();
		try{
			if($tipocontato->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarTipocontato() {
		$parametros = Util::getParametrosJSON();
		
		$tipocontato = Tipocontato::model()->findByPk($parametros[id]);
		
		$response = array();
		try{
			if($tipocontato->delete()){
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
	
	public function actionFindAllTipocontato() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$tipocontatos = Tipocontato::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($tipocontatos as $key => $tipocontato) {
			$dados = array();
			$dados['id'] = $tipocontato->id;
			$dados['nome'] = $tipocontato->nome;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
}