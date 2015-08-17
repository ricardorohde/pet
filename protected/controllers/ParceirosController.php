<?php

/**
 * ParceirosController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class ParceirosController extends CController {
	
	public $defaultAction='abrirParceiros';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	/**
	 * Parceiros
	 */ 
	public function actionAbrirParceiros() {
		$this->layout = 'somentehtml';
		$this->render('parceiros');
	}
	
	public function actionSalvarParceiros() {
		$parametros = Util::getParametrosJSON();
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
		    $parceiros = Parceiros::model()->findByPk($parametros['id']);
		}else{
		    $parceiros = new Parceiros;
		}
		$parceiros->nome = $parametros['nome'];
		$parceiros->site = $parametros['site'];
		$parceiros->logo = $parametros['logo'];
		$parceiros->descricao = $parametros['descricao'];
		$parceiros->petshop = Yii::app()->user->petatual;
		
		$response = array();
		try{
			if($parceiros->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarParceiros() {
		$parametros = Util::getParametrosJSON();
		
		$parceiros = Parceiros::model()->findByPk($parametros[id]);
		
		$response = array();
		try{
			if($parceiros->delete()){
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
	
	public function actionFindAllParceiros() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " petshop=:petshop ";
		$params = array(':petshop'=>Yii::app()->user->petatual);
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$parceiros = Parceiros::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($parceiros as $key => $parceiro) {
			$dados = array();
			$dados['id'] = $parceiro->id;
			$dados['nome'] = $parceiro->nome;
			$dados['site'] = $parceiro->site;
			$dados['logo'] = $parceiro->logo;
			$dados['descricao'] = $parceiro->descricao;
			$dados['petshop'] = $parceiro->petshop;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
}