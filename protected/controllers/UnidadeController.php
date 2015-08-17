<?php

/**
 * UnidadeController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class UnidadeController extends CController {
	
	public $defaultAction='abrirUnidade';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	/**
	 * UnidadeMedida
	 */ 
	public function actionAbrirUnidademedida() {
		$this->layout = 'somentehtml';
		$this->render('unidademedida');
	}
	
	public function actionSalvarUnidademedida() {
		$parametros = Util::getParametrosJSON();
		
		$unidademedida = new Unidademedida;
		$unidademedida->nome = $parametros['nome'];
		$unidademedida->sigla = $parametros['sigla'];
		
		$response = array();
		try{
			if($unidademedida->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarUnidademedida() {
		$parametros = Util::getParametrosJSON();
		
		$unidademedida = Unidademedida::model()->findByPk($parametros[id]);
		
		$response = array();
		try{
			if($unidademedida->delete()){
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
	
	public function actionFindAllUnidademedida() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$unidademedidas = Unidademedida::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($unidademedidas as $key => $unidademedida) {
			$dados = array();
			$dados['id'] = $unidademedida->id;
			$dados['nome'] = $unidademedida->nome;
			$dados['sigla'] = $unidademedida->sigla;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
}