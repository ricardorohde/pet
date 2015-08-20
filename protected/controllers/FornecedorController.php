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
		
		$isNovoFornecedor;
		if(isset($parametros['id']) && $parametros['id'] != ''){
		    $fornecedor = Fornecedor::model()->findByPk($parametros['id']);
		    $isNovoFornecedor = false;
		}else{
		    $fornecedor = new Fornecedor;
		    $isNovoFornecedor = true;
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
		
		try{
			if($response['sucesso'] == true){
				if(isset($parametros['endereco'])){
					$endereco = $parametros['endereco'];
					$enderecofornecedor = Enderecofornecedor::model()->find("fornecedor=:fornecedor",array(':fornecedor'=>$fornecedor->id));
					if($enderecofornecedor == null){
						$enderecofornecedor = new Enderecofornecedor;
					}
					$enderecofornecedor->bairro = $endereco['bairro'];
					$enderecofornecedor->numero = $endereco['numero'];
					$enderecofornecedor->cep = $endereco['cep'];
					$enderecofornecedor->endereco = $endereco['endereco'];
					$enderecofornecedor->fornecedor = $fornecedor->id;
					$enderecofornecedor->save();
				}
			}
		}catch(Exception $e){
			
		}
		
		try{
			if(isset($parametros['contato'])){
				$contatos = $parametros['contato'];
				if($isNovoFornecedor){
					foreach ($contatos as $key => $contato) {
						$contatofornecedor = new Contatofornecedor;
						$contatofornecedor->tipocontato = $contato['tipocontato'];
						$contatofornecedor->valor = $contato['valor'];
						$contatofornecedor->petshop = Yii::app()->user->petatual;
						$contatofornecedor->fornecedor = $fornecedor->id;
						$contatofornecedor->save();
					}
				}else{
					foreach ($contatos as $key => $contato) {
						$contatofornecedor = Contatofornecedor::model()->find("fornecedor=:fornecedor AND tipocontato=:tipocontato",array(':fornecedor'=>$fornecedor->id,':tipocontato'=>$contato['tipocontato']));
						$contatofornecedor->valor = $contato['valor'];
						$contatofornecedor->save();
					}
				}
			}
		}catch(Exception $e){
			
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
		
		$enderecofornecedor = Enderecofornecedor::model()->find("fornecedor=:fornecedor",array(":fornecedor"=>$parametros['id']));
		if($enderecofornecedor != null){
			$enderecofornecedor->delete();
		}
		$contatofornecedors = Contatofornecedor::model()->findAll("fornecedor=:fornecedor",array(":fornecedor"=>$parametros['id']));
		foreach ($contatofornecedors as $key => $contatofornecedor){
			$contatofornecedor->delete();
		}
		$fornecedor = Fornecedor::model()->findByPk($parametros['id']);
		
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
				$response['mensagem'] = 'Esse registro est&aacute; sendo usado em outro local do sistema!';
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
			$dados['contato'] = array();
			$contatofornecedors = $fornecedor->Contatofornecedor;
			foreach ($contatofornecedors as $key => $contatofornecedor) {
				$dados['contato'][$contatofornecedor->Tipocontato->nome] = $contatofornecedor;
			}
			$enderecofornecedor = Enderecofornecedor::model()->find("fornecedor=:fornecedor",array(':fornecedor'=>$fornecedor->id));
			$endereco = array();
			if($enderecofornecedor == null){
				$endereco['endereco'] = '';
				$endereco['numero'] = '';
				$endereco['cep'] = '';
				$endereco['bairro'] = '';
				$endereco['bairronome'] = '';
				$endereco['cidadenome'] = '';
				$endereco['estadonome'] = '';
			}else{
				$endereco['endereco'] = isset($enderecofornecedor->endereco)?$enderecofornecedor->endereco:'';
				$endereco['numero'] = isset($enderecofornecedor->numero)?$enderecofornecedor->numero:'';
				$endereco['cep'] = isset($enderecofornecedor->cep)?$enderecofornecedor->cep:'';
				$endereco['bairro'] = $enderecofornecedor->bairro;
				$endereco['bairronome'] = $enderecofornecedor->Bairro->nome;
				$endereco['cidadenome'] = $enderecofornecedor->Bairro->Cidadepetshop->Cidade->nome;
				$endereco['estadonome'] = $enderecofornecedor->Bairro->Cidadepetshop->Cidade->Estado->nome;
			}
			$dados['endereco'] = $endereco;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
}