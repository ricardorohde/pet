<?php

/**
 * RacaController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class RacaController extends CController {
	
	public $defaultAction='abrirRaca';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	/**
	 * Raca
	 */ 
	public function actionAbrirRaca() {
		$this->layout = 'somentehtml';
		$this->render('raca');
	}
	
	public function actionSalvarRaca() {
		$parametros = Util::getParametrosJSON();
		
		$raca = new Raca;
		$raca->nome = $parametros['nome'];
		$raca->origem = $parametros['origem'];
		$raca->tipoanimalpetshop = $parametros['tipoanimalpetshop'];
		
		$response = array();
		try{
			if($raca->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarRaca() {
		$parametros = Util::getParametrosJSON();
		
		$raca = Raca::model()->findByPk($parametros[id]);
		
		$response = array();
		try{
			if($raca->delete()){
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
	
	public function actionFindAllRaca() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " EXISTS( select 1 from Tipoanimalpetshop tap where tap.id = t.tipoanimalpetshop AND tap.petshop=:petshop ) ";
		$params = array(':petshop'=>Yii::app()->user->petatual);
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$racas = Raca::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($racas as $key => $raca) {
		    $tipoanimalpetshop = Tipoanimalpetshop::model()->findByPk($raca->tipoanimalpetshop);
		    $tipoanimal = Tipoanimal::model()->findByPk($tipoanimalpetshop->tipoanimal);
			$dados = array();
			$dados['id'] = $raca->id;
			$dados['nome'] = $raca->nome;
			$dados['origem'] = $raca->origem;
			$dados['tipoanimalpetshop'] = $raca->tipoanimalpetshop;
			$dados['tipoanimalnome'] = $tipoanimal->nome;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
}