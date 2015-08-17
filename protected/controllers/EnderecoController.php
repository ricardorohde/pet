<?php

/**
 * EnderecoController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class EnderecoController extends CController {
	
	public $defaultAction='abrirCidade';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	/**
	 * BAIRRO
	 */ 
	public function actionAbrirBairro() {
		$this->layout = 'somentehtml';
		$this->render('bairro');
	}
	
	public function actionSalvarBairropetshop() {
		$parametros = Util::getParametrosJSON();
		
		if(isset($parametros[id]) && $parametros[id] != ''){
		    $bairro = Bairro::model()->findByPk($parametros[id]);
		}else{
		    $bairro = new Bairro;
		}
		$bairro->nome = $parametros['nome'];
		$bairro->cidadepetshop = $parametros['cidadepetshop'];
		
		$response = array();
		try{
			if($bairro->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			if(strpos($e->getMessage(),'Integrity constraint') !== false){
				$response['sucesso'] = false;
				$response['mensagem'] = 'Esse bairro já está cadastrado!';
			}else{
				throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
			}
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarBairropetshop() {
		$parametros = Util::getParametrosJSON();
		
		$bairro = Bairro::model()->findByPk($parametros[id]);
		
		$response = array();
		try{
			if($bairro->delete()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionFindAllBairropetshop() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->select = "t.*";
		$criteria->join = "INNER JOIN Cidadepetshop cp ON cp.id = t.cidadepetshop AND cp.petshop = ".(Yii::app()->user->petatual);
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$bairros = Bairro::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($bairros as $key => $bairro) {
			$dados = array();
			$dados['id'] = $bairro->id;
			$dados['nome'] = $bairro->nome;
			$dados['cidadepetshop'] = $bairro->cidadepetshop;
			$dados['cidadenome'] = $bairro->Cidadepetshop->Cidade->nome;
			$dados['estadonome'] = $bairro->Cidadepetshop->Cidade->Estado->nome;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
	public function actionBuscarBairropetshop() {
		$parametros = Util::getParametrosJSON();
		
		$bairro = Bairro::model()->findByPk($parametros['id']);
		
		Util::setParametrosJSON($bairro);
	}
	
	/**
	 * CIDADE
	 */ 
	public function actionAbrirCidade() {
		$this->layout = 'somentehtml';
		$this->render('cidade');
	}
	
	public function actionSalvarCidadepetshop() {
		$parametros = Util::getParametrosJSON();
		
		$cidadepetshop = new Cidadepetshop;
		$cidadepetshop->cidade = $parametros['cidade'];
		$cidadepetshop->petshop = Yii::app()->user->petatual;
		
		$response = array();
		try{
			if($cidadepetshop->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			if(strpos($e->getMessage(),'unique_cidadepetshop') !== false){
				$response['sucesso'] = false;
				$response['mensagem'] = 'Essa cidade já está cadastrada!';
			}else{
				throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
			}
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarCidadepetshop() {
		$parametros = Util::getParametrosJSON();
		
		$cidadepetshop = Cidadepetshop::model()->find(" cidade=:cidade and petshop=:petshop ",array(':cidade'=>$parametros[id],':petshop'=>Yii::app()->user->petatual));
		
		$response = array();
		try{
			if($cidadepetshop->delete()){
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
	
	public function actionFindAllCidadepetshop() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->select = "t.*";
		$criteria->join = "INNER JOIN Cidadepetshop cp ON cp.cidade = t.id AND cp.petshop = ".(Yii::app()->user->petatual);
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$cidades = Cidade::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($cidades as $key => $cidade) {
			$dados = array();
			$dados['id'] = $cidade->id;
			$dados['nome'] = $cidade->nome;
			$dados['estado'] = $cidade->estado;
			$dados['estadonome'] = $cidade->Estado->nome;
			$dados['estadosigla'] = $cidade->Estado->sigla;
			$cidadepetshop = Cidadepetshop::model()->find('cidade=:cidade AND petshop=:petshop',array(':cidade'=>$cidade->id,':petshop'=>Yii::app()->user->petatual));
			$dados['cidadepetshop'] = $cidadepetshop->id;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
	public function actionFindAllCidadeByEstado() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " 1=1 ";
		$params = array();
		
		if(isset($parametros['estado']) && $parametros['estado'] != ''){
			$condition .= " AND estado=:estado ";
			$params[':estado'] = $parametros['estado'];
		}
		
		$criteria = new CDbCriteria();
		$criteria->select = "t.*";
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$cidades = Cidade::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($cidades as $key => $cidade) {
			$dados = array();
			$dados['id'] = $cidade->id;
			$dados['nome'] = $cidade->nome;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
	public function actionBuscarCidadepetshop() {
		$parametros = Util::getParametrosJSON();
		
		$cidade = Cidade::model()->findByPk($parametros['id']);
		
		Util::setParametrosJSON($cidade);
	}
	
	/**
	 * ESTADO
	 */ 
	public function actionFindAllEstado() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$estados = Estado::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($estados as $key => $estado) {
			$dados = array();
			$dados['id'] = $estado->id;
			$dados['nome'] = $estado->nome;
			$dados['sigla'] = $estado->sigla;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
	public function actionBuscarEstado() {
		$parametros = Util::getParametrosJSON();
		
		$estado = Estado::model()->findByPk($parametros['id']);
		
		Util::setParametrosJSON($estado);
	}
}