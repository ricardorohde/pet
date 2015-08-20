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
		
		$isNovoParceiro;
		if(isset($parametros['id']) && $parametros['id'] != ''){
		    $parceiros = Parceiros::model()->findByPk($parametros['id']);
		    $isNovoParceiro = false;
		}else{
		    $parceiros = new Parceiros;
		    $isNovoParceiro = true;
		}
		$parceiros->nome = $parametros['nome'];
		$parceiros->site = $parametros['site'];
		$parceiros->logo = $parametros['logo']['url'];
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
		
		try{
			if($response['sucesso'] == true){
				if(isset($parametros['endereco'])){
					$endereco = $parametros['endereco'];
					$enderecoparceiros = Enderecoparceiros::model()->find("parceiros=:parceiros",array(':parceiros'=>$parceiros->id));
					if($enderecoparceiros == null){
						$enderecoparceiros = new Enderecoparceiros;
					}
					$enderecoparceiros->bairro = $endereco['bairro'];
					$enderecoparceiros->numero = $endereco['numero'];
					$enderecoparceiros->cep = $endereco['cep'];
					$enderecoparceiros->endereco = $endereco['endereco'];
					$enderecoparceiros->parceiros = $parceiros->id;
					$enderecoparceiros->save();
				}
			}
		}catch(Exception $e){
				
		}
		
		try{
			if(isset($parametros['contato'])){
				$contatos = $parametros['contato'];
				if($isNovoParceiro){
					foreach ($contatos as $key => $contato) {
						$contatoparceiros = new Contatoparceiros;
						$contatoparceiros->tipocontato = $contato['tipocontato'];
						$contatoparceiros->valor = $contato['valor'];
						$contatoparceiros->petshop = Yii::app()->user->petatual;
						$contatoparceiros->parceiros = $parceiros->id;
						$contatoparceiros->save();
					}
				}else{
					foreach ($contatos as $key => $contato) {
						$contatoparceiros = Contatoparceiros::model()->find("parceiros=:parceiros AND tipocontato=:tipocontato",array(':parceiros'=>$parceiros->id,':tipocontato'=>$contato['tipocontato']));
						$contatoparceiros->valor = $contato['valor'];
						$contatoparceiros->save();
					}
				}
			}
		}catch(Exception $e){
				
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarParceiros() {
		$parametros = Util::getParametrosJSON();
		
		$enderecoparceiros = Enderecoparceiros::model()->find("parceiros=:parceiros",array(":parceiros"=>$parametros['id']));
		if($enderecoparceiros != null){
			$enderecoparceiros->delete();
		}
		$contatoparceiross = Contatoparceiros::model()->findAll("parceiros=:parceiros",array(":parceiros"=>$parametros['id']));
		foreach ($contatoparceiross as $key => $contatoparceiros){
			$contatoparceiros->delete();
		}
		$parceiros = Parceiros::model()->findByPk($parametros['id']);
		
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
			$dados['logo'] = array('url'=>$parceiro->logo);
			$dados['descricao'] = $parceiro->descricao;
			$dados['petshop'] = $parceiro->petshop;
			$dados['contato'] = array();
			$contatoparceiross = $parceiro->Contatoparceiros;
			foreach ($contatoparceiross as $key => $contatoparceiros) {
				$dados['contato'][$contatoparceiros->Tipocontato->nome] = $contatoparceiros;
			}
			$enderecoparceiros = Enderecoparceiros::model()->find("parceiros=:parceiros",array(':parceiros'=>$parceiro->id));
			$endereco = array();
			if($enderecoparceiros == null){
				$endereco['endereco'] = '';
				$endereco['numero'] = '';
				$endereco['cep'] = '';
				$endereco['bairro'] = '';
				$endereco['bairronome'] = '';
				$endereco['cidadenome'] = '';
				$endereco['estadonome'] = '';
			}else{
				$endereco['endereco'] = isset($enderecoparceiros->endereco)?$enderecoparceiros->endereco:'';
				$endereco['numero'] = isset($enderecoparceiros->numero)?$enderecoparceiros->numero:'';
				$endereco['cep'] = isset($enderecoparceiros->cep)?$enderecoparceiros->cep:'';
				$endereco['bairro'] = $enderecoparceiros->bairro;
				$endereco['bairronome'] = $enderecoparceiros->Bairro->nome;
				$endereco['cidadenome'] = $enderecoparceiros->Bairro->Cidadepetshop->Cidade->nome;
				$endereco['estadonome'] = $enderecoparceiros->Bairro->Cidadepetshop->Cidade->Estado->nome;
			}
			$dados['endereco'] = $endereco;
			$jsons[] = $dados;
		}
		
		Util::setParametrosJSON($jsons);
	}
	
}