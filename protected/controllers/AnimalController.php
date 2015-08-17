<?php

/**
 * AnimalController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class AnimalController extends CController {
	
	public $defaultAction='abrirAnimal';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	/**
	 * TipoAnimal
	 */ 
	public function actionAbrirTipoanimal() {
		$this->layout = 'somentehtml';
		$this->render('tipoanimal');
	}
	
	public function actionAbrirTipoanimalpetshop() {
		$this->layout = 'somentehtml';
		$this->render('tipoanimalpetshop');
	}
	
	public function actionSalvarTipoanimalpetshop() {
		$parametros = Util::getParametrosJSON();
		
		$tipoanimalpetshop = new Tipoanimalpetshop;
		$tipoanimalpetshop->tipoanimal = $parametros['tipoanimal'];
		$tipoanimalpetshop->petshop = Yii::app()->user->petatual;
		
		$response = array();
		try{
			if($tipoanimalpetshop->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			if(strpos($e->getMessage(),'unique_tipoanimalpetshop') !== false){
				$response['sucesso'] = false;
				$response['mensagem'] = 'Esse tipo de animal já está cadastrado!';
			}else{
				throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
			}
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionSalvarTipoanimal() {
		$parametros = Util::getParametrosJSON();
		
		$tipoanimal = new Tipoanimal;
		$tipoanimal->nome = $parametros['nome'];
		
		$response = array();
		try{
			if($tipoanimal->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarTipoanimalpetshop() {
		$parametros = Util::getParametrosJSON();
		
		$tipoanimalpetshop = Tipoanimalpetshop::model()->find(" tipoanimal=:tipoanimal and petshop=:petshop ",array(':tipoanimal'=>$parametros[id],':petshop'=>Yii::app()->user->petatual));
		
		$response = array();
		try{
			if($tipoanimalpetshop->delete()){
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
	
	public function actionDeletarTipoanimal() {
		$parametros = Util::getParametrosJSON();
		
		$tipoanimal = Tipoanimal::model()->findByPk($parametros[id]);
		
		$response = array();
		try{
			if($tipoanimal->delete()){
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
	
	public function actionFindAllTipoanimalpetshop() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->select = "t.*";
		$criteria->join = "INNER JOIN Tipoanimalpetshop tap ON tap.tipoanimal = t.id AND tap.petshop = ".(Yii::app()->user->petatual);
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$tipoanimals = Tipoanimal::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($tipoanimals as $key => $tipoanimal) {
			$dados = array();
			$dados['id'] = $tipoanimal->id;
			$dados['nome'] = $tipoanimal->nome;
			$tipoanimalpetshop = Tipoanimalpetshop::model()->find('tipoanimal=:tipoanimal AND petshop=:petshop',array(':tipoanimal'=>$tipoanimal->id,':petshop'=>Yii::app()->user->petatual));
			$dados['tipoanimalpetshop'] = $tipoanimalpetshop->id;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
	public function actionFindAllTipoanimal() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$tipoanimals = Tipoanimal::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($tipoanimals as $key => $tipoanimal) {
			$dados = array();
			$dados['id'] = $tipoanimal->id;
			$dados['nome'] = $tipoanimal->nome;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
	public function actionBuscarTipoanimalpetshop() {
		$parametros = Util::getParametrosJSON();
		
		$tipoanimal = Tipoanimal::model()->findByPk($parametros['id']);
		
		Util::setParametrosJSON($tipoanimal);
	}
	
}