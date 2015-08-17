<?php

/*
 * LoginController.
 */ 
class LoginController extends CController {
	
	public $defaultAction='abrirLogin';
	public $tituloPagina = 'PetShop';
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter - abrirLogin, isLogado, logar, page, logado'),
        );
    }
	
	public function actionAbrirLogin() {
		if(!Yii::app()->user->isGuest){
			$this->redirect('index.php/g');
		}else{
			$this->setPageTitle($this->tituloPagina);
			$this->layout = "nulo";
			$this->render("login");
		}
	}
	
	public function actionIsLogado() {
		$response = array();
		$response['sucesso'] = !Yii::app()->user->isGuest;
		Util::setParametrosJSON($response);
	}
	
	public function actionLogado() {
		if(Yii::app()->user->isGuest){
			throw new CHttpException(403, 'Voce não está logado no sistema.');
		}
		echo 'true';
		exit();
	}
	
	public function actionLogar() {
		$parametros = Util::getParametrosJSON();
		
		$identity = new UserIdentity($parametros['email'],$parametros['senha']);
		
		$response = array();
		if($identity->authenticate()){
			Yii::app()->user->login($identity);
			$response['sucesso'] = true;
		} else {
			$response['sucesso'] = false;
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeslogar() {
		Yii::app()->user->logout();
		Util::setParametrosJSON(array('sucesso'=>true));
	}
	
	public function actionPage() {
		$this->setPageTitle($this->tituloPagina);
		if (isset($_GET['page']) && $_GET['page'] != "") {
			$this->render($_GET['page']);
		} else {
			$this->redirect(array('petshop/inicio'));
		}
	}
	
	public function actionGetUser() {
		Util::setParametrosJSON(array(
			'nome'=>Yii::app()->user->nome,
			'sobrenome'=>Yii::app()->user->sobrenome,
			'celular'=>Yii::app()->user->celular,
			'email'=>Yii::app()->user->email,
			'tipoUsuario'=>Yii::app()->user->tipoUsuario,
			'foto'=>Yii::app()->user->foto,
			'petshop'=>Yii::app()->user->petshop,
			'petatual'=>Petshop::model()->findByPk(Yii::app()->user->petatual),
		));
	}
	
	public function actionTrocarPetshopAtual() {
		$parametros = Util::getParametrosJSON();
		
		Yii::app()->user->setState('petatual',$parametros['petatual']['id']);
		
		Util::setParametrosJSON($dados);
	}
	
}