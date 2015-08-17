<?php

/**
 * RedeController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class RedeController extends CController {
	
	public $defaultAction='abrir';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	public function actionAbrir() {
		$this->layout = 'somentehtml';
		$this->render('rede');
	}
	
	public function actionSalvar() {
		$parametros = Util::getParametrosJSON();
		
		$novoRegistro;
		if(isset($parametros['id']) && $parametros['id'] != ''){
		    $rede = Rede::model()->findByPk($parametros['id']);
		    $rede->datainicio = $parametros['datainicio'];
		    $novoRegistro = false;
		}else{
		    $rede = new Rede;
		    $rede->datainicio = Util::getDate();
		    $novoRegistro = true;
		}
		$rede->nome = $parametros['nome'];
		$rede->cnpj = $parametros['cnpj'];
		$rede->descricao = $parametros['descricao'];
		$rede->usuario = Yii::app()->user->id;
		
		$response = array();
		try{
			if($rede->save()){
				if($novoRegistro){
					$petshoprede = new Petshoprede;
					$petshoprede->petshop = Yii::app()->user->petatual;
					$petshoprede->rede = $rede->id;
					$petshoprede->status = 'CONVIDADO';
					$petshoprede->data = Util::getDate();
					$petshoprede->mensagem = 'Seu PetShop foi convidado a participar da Rede "'.$rede->nome.'"';
					if($petshoprede->save()){
						$response['sucesso'] = true;
					}else{
						$response['sucesso'] = false;
						$response['mensagem'] = "Erro ao convidar o PetShop.";
					}
				}else{
					$response['sucesso'] = true;
				}
			} else {
				$response['sucesso'] = false;
				$response['mensagem'] = "Erro ao configurar a rede de PetShop.";
			}
		}catch(Exception $e){
			$response['sucesso'] = false;
			$response['mensagem'] = "Erro ao configurar a rede de PetShop.";
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletar() {
		$parametros = Util::getParametrosJSON();
		
		$rede = Rede::model()->findByPk($parametros[id]);
		
		$response = array();
		if($rede->delete()){
			$response['sucesso'] = true;
		} else {
			$response['sucesso'] = false;
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionBuscar() {
		$parametros = Util::getParametrosJSON();
		
		$rede = Rede::model()->find("usuario=:usuario",array(':usuario'=>Yii::app()->user->id));
		
		$dados = array();
		if($rede != null){
			$dados['id'] = $rede->id; 
			$dados['nome'] = $rede->nome;
			$dados['descricao'] = $rede->descricao;
			$dados['cnpj'] = $rede->cnpj;
			$dados['datainicio'] = $rede->datainicio;
			$dados['logo'] = $rede->logo;
			$dados['usuario'] = $rede->usuario;
			
			$petshopredes = Petshoprede::model()->findAll("rede=:rede",array(':rede'=>$rede->id));
			$dados['listapetshoprede'] = array();
			foreach ($petshopredes as $key => $petshoprede) {
				$redeDTO = new RedeDTO();
				$redeDTO->id = $petshoprede->id;
				$redeDTO->rede = $petshoprede->rede;
				$redeDTO->petshop = $petshoprede->petshop;
				$redeDTO->status = $petshoprede->status;
				$redeDTO->mensagem = $petshoprede->mensagem;
				$redeDTO->data = $petshoprede->data;
				$petshop = Petshop::model()->findByPk($petshoprede->petshop);
				$redeDTO->petshopnome = $petshop->nome;
				$redeDTO->petshopid = $petshop->id;
				$dados['listapetshoprede'][] = $redeDTO;
			}
		}else{
			$dados['nome'] = '';
			$dados['descricao'] = '';
			$dados['cnpj'] = '';
			$dados['datainicio'] = '';
			$dados['logo'] = '';
			$dados['usuario'] = '';
			$dados['listapetshoprede'] = array();
		}
		
		Util::setParametrosJSON($dados);
	}
	
}