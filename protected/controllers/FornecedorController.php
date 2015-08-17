<?php

/**
 * FornecedorController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class FornecedorController extends CController {
	
	public $defaultAction='abrirFornecedor';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	/**
	 * Fornecedor
	 */ 
	public function actionAbrirFornecedor() {
		$this->layout = 'somentehtml';
		$this->render('fornecedor');
	}
	
	public function actionSalvarFornecedor() {
		$parametros = Util::getParametrosJSON();
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
		    $fornecedor = Fornecedor::model()->findByPk($parametros['id']);
		}else{
		    $fornecedor = new Fornecedor;
		}
		$fornecedor->nome = $parametros['nome'];
		$fornecedor->cnpj = $parametros['cnpj'];
		$fornecedor->cpf = $parametros['cpf'];
		$fornecedor->site = $parametros['site'];
		$fornecedor->logo = $parametros['logo']['url'];
		$fornecedor->descricao = $parametros['descricao'];
		$fornecedor->status = $parametros['status'];
		$fornecedor->petshop = Yii::app()->user->petatual;
		
		$response = array();
		try{
			if($fornecedor->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionSalvarContatofornecedor() {
		$parametros = Util::getParametrosJSON();
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
		    $contatofornecedor = Contatofornecedor::model()->findByPk($parametros['id']);
		}else{
		    $contatofornecedor = new Contatofornecedor;
		}
		$contatofornecedor->valor = $parametros['valor'];
		$contatofornecedor->tipocontato = $parametros['tipocontato'];
		$contatofornecedor->fornecedor = $parametros['fornecedor'];
		$contatofornecedor->petshop = Yii::app()->user->petatual;
		
		$response = array();
		try{
			if($contatofornecedor->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarFornecedor() {
		$parametros = Util::getParametrosJSON();
		
		$fornecedor = Fornecedor::model()->findByPk($parametros[id]);
		
		$response = array();
		try{
			if($fornecedor->delete()){
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
	
	public function actionFindAllFornecedor() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " petshop=:petshop ";
		$params = array(':petshop'=>Yii::app()->user->petatual);
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$fornecedors = Fornecedor::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($fornecedors as $key => $fornecedor) {
			$dados = array();
			$dados['id'] = $fornecedor->id;
			$dados['nome'] = $fornecedor->nome;
			$dados['cnpj'] = $fornecedor->cnpj;
			$dados['cpf'] = $fornecedor->cpf;
			$dados['site'] = $fornecedor->site;
			$dados['logo'] = array('url'=>$fornecedor->logo);
			$dados['descricao'] = $fornecedor->descricao;
			$dados['status'] = $fornecedor->status;
			$dados['petshop'] = $fornecedor->petshop;
			$dados['listacontatofornecedor'] = array();
			foreach ($fornecedor->Contatos as $key => $contato) {
				$contato = array();
				$contato['id'] = $contato->id;
				$contato['valor'] = $contato->valor;
				$contato['tipocontato'] = $contato->tipocontato;
				$contato['tipocontatonome'] = $contato->Tipocontato->nome;
				$contato['fornecedor'] = $contato->fornecedor;
				$dados['listacontatofornecedor'][] = $contato;
			}
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
}