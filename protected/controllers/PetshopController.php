<?php

/**
 * PetshopController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class PetshopController extends CController {
	
	public $defaultAction='inicio';
	public $tituloPagina = "Petshop";
	
	public function filters(){
        return array(
            array('application.filters.ControleAcessoFilter'),
        );
    }
	
	public function actionInicio() {
		$this->setPageTitle($this->tituloPagina);
		$this->layout = 'main';
		$this->render('inicio');
	}
	
	public function actionAbrir() {
		$this->layout = 'somentehtml';
		$this->render('petshop');
	}
	
	public function actionSalvarPetshop() {
		$parametros = Util::getParametrosJSON();
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$petshop = Petshop::model()->findByPk($parametros['id']);
			$petshop->datainicio = $parametros['datainicio'];
		}else{
			$petshop = new Petshop;
			$petshop->datainicio = Util::getDate();
		}
		$petshop->nome = $parametros['nome'];
		$petshop->descricao = $parametros['descricao'];
		$petshop->cnpj = $parametros['cnpj'];
		$petshop->limiteusuario = $parametros['limiteusuario'];
		$petshop->tipocobranca = $parametros['tipocobranca'];
		$petshop->datafim = $parametros['datafim'];
		$petshop->datavencimento = $parametros['datavencimento'];
		$petshop->sede = $parametros['sede'];
		$petshop->rede = $parametros['rede'];
		
		$response = array();
		try{
			if($petshop->save()){
				$endereco = $parametros['endereco'];
				if(isset($endereco['id']) && $endereco['id'] != ''){
					$enderecopetshop = Enderecopetshop::model()->findByPk($endereco['id']);
				}else{
					$enderecopetshop = new Enderecopetshop;
				}
				$enderecopetshop->endereco = isset($endereco['endereco'])?$endereco['endereco']:"";
				$enderecopetshop->numero = isset($endereco['numero'])?$endereco['numero']:"";
				$enderecopetshop->cep = isset($endereco['cep'])?$endereco['cep']:"";
				$enderecopetshop->referencia = isset($endereco['referencia'])?$endereco['referencia']:"";
				$enderecopetshop->petshop = Yii::app()->user->petatual;
				$enderecopetshop->bairro = $endereco['bairro'];
				
				if($enderecopetshop->save()){
					$response['sucesso'] = true;
				}else{
					$response['sucesso'] = false;
					$response['mensagem'] = "Erro ao salvar o endereço do PetShop.";
				}
			} else {
				$response['sucesso'] = false;
				$response['mensagem'] = "Erro ao salvar o perfil do PetShop.";
			}
		}catch(Exception $e){
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionDeletarPetshop() {
		$parametros = Util::getParametrosJSON();
		
		$petshop = Petshop::model()->findByPk($parametros['id']);
		
		$response = array();
		try{
			if($petshop->delete()){
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
	
	public function actionAceitarConvite() {
		$parametros = Util::getParametrosJSON();
		
		$petshoprede = Petshoprede::model()->findByPk($parametros['id']);
		$petshoprede->status = 'ACEITO';
		
		$response = array();
		try{
			if($petshoprede->save()){
				$rede = Rede::model()->findByPk($petshoprede->rede);
				$usuariopetshop = Usuariopetshop::model()->find("petshop=:petshop AND usuario=:usuario",array(':petshop'=>$petshoprede->petshop,':usuario'=>$rede->usuario));
				if($usuariopetshop == null){
					$usuariopetshop = new Usuariopetshop;
					$usuariopetshop->usuario = $rede->usuario;
					$usuariopetshop->petshop = $petshoprede->petshop;
					if($usuariopetshop->save()){
						$response['sucesso'] = true;
					}else{
						$response['sucesso'] = false;
						$response['mensagem'] = 'Erro ao vincular usuário ao PetShop.';
					}
				}else{
					$response['sucesso'] = true;
				}
			} else {
				$response['sucesso'] = false;
				$response['mensagem'] = 'Erro ao aceitar convite.';
			}
		}catch(Exception $e){
			$response['sucesso'] = false;
			$response['mensagem'] = 'Esse registro está sendo usado em outro local do sistema!';
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionEnviarConvitePetshop() {
		$parametros = Util::getParametrosJSON();
		
		$petshoprede = new Petshoprede;
		$petshoprede->status = 'CONVIDADO';
		$petshoprede->petshop = $parametros['petshop'];
		$petshoprede->rede = $parametros['rede'];
		$petshoprede->mensagem = $parametros['mensagem'];
		$petshoprede->data = Util::getDate();
		
		$response = array();
		try{
			if($petshoprede->save()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			$response['sucesso'] = false;
			$response['mensagem'] = 'Ocorreu um erro ao enviar esse pedido.';
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionRejeitarConvite() {
		$parametros = Util::getParametrosJSON();
		
		$petshoprede = Petshoprede::model()->findByPk($parametros['id']);
		$rede = Rede::model()->findByPk($petshoprede->rede);
		$usuariopetshop = Usuariopetshop::model()->find('usuario=:usuario AND petshop=:petshop',array(':usuario'=>$rede->usuario,':petshop'=>$petshoprede->petshop));
		
		if($usuariopetshop != null){
			try{
				$usuariopetshop->delete();
			}catch(Exception $e){
				
			}
		}
		
		$response = array();
		try{
			if($petshoprede->delete()){
				$response['sucesso'] = true;
			} else {
				$response['sucesso'] = false;
			}
		}catch(Exception $e){
			$response['sucesso'] = false;
			$response['mensagem'] = 'Esse registro está sendo usado em outro local do sistema!';
			throw new CHttpException(404,$e->getMessage().'['.Yii::app()->user->petatual.']');
		}
		
		Util::setParametrosJSON($response);
	}
	
	public function actionBuscarPetshop() {
		$parametros = Util::getParametrosJSON();
		
		$petshop = Petshop::model()->findByPk($parametros['id']);
		
		$dados = array();
		$dados['id'] = $petshop->id; 
		$dados['nome'] = $petshop->nome;
		$dados['descricao'] = $petshop->descricao;
		$dados['cnpj'] = $petshop->cnpj;
		$dados['limiteusuario'] = $petshop->limiteusuario;
		$dados['tipocobranca'] = $petshop->tipocobranca;
		$dados['datainicio'] = $petshop->datainicio;
		$dados['datafim'] = $petshop->datafim;
		$dados['datavencimento'] = $petshop->datavencimento;
		
		$dados['listapetshoprede'] = $this->getPetshoprede('ACEITO');
		
		$dados['listapetshopredeconvidado'] = $this->getPetshoprede('CONVIDADO');
		
		$enderecoDTO = new EnderecopetshopDTO();
		if(count($petshop->Enderecopetshop) > 0){
			$enderecopetshop = $petshop->Enderecopetshop[0];
			$enderecoDTO->id = $enderecopetshop->id;
			$enderecoDTO->endereco = $enderecopetshop->endereco;
			$enderecoDTO->numero = $enderecopetshop->numero;
			$enderecoDTO->cep = $enderecopetshop->cep;
			$enderecoDTO->referencia = $enderecopetshop->referencia;
			$enderecoDTO->bairro = $enderecopetshop->bairro;
			$enderecoDTO->bairronome = $enderecopetshop->Bairro->nome;
			$enderecoDTO->cidadenome = $enderecopetshop->Bairro->Cidadepetshop->Cidade->nome;
			$enderecoDTO->estadonome = $enderecopetshop->Bairro->Cidadepetshop->Cidade->Estado->nome;
		}
		$dados['endereco'] = $enderecoDTO;
		
		$dados['listamensalidade'] = array();
		foreach ($petshop->Mensalidade as $key => $mensalidade) {
			$mensalidadeObj = array();
			$mensalidadeObj['id'] = $mensalidade['id'];
			$mensalidadeObj['datavencimento'] = $mensalidade['datavencimento'];
			$mensalidadeObj['valor'] = $mensalidade['valor'];
			$mensalidadeObj['status'] = $mensalidade['status'];
			$dados['listamensalidade'][] = $mensalidadeObj;
		}
		
		Util::setParametrosJSON($dados);
	}
	
	public function actionGetPetshopredeAceito(){
		$parametros = Util::getParametrosJSON();
		
		$dados = $this->getPetshoprede('ACEITO');
		
		Util::setParametrosJSON($dados);
	}
	
	public function actionGetPetshopredeConvidado(){
		$parametros = Util::getParametrosJSON();
		
		$dados = $this->getPetshoprede('CONVIDADO');
		
		Util::setParametrosJSON($dados);
	}
	
	public function getPetshoprede($status){
		$dados = array();
		$petshopredes = Petshoprede::model()->findAll("petshop=:petshop AND status=:status",array(':petshop'=>Yii::app()->user->petatual,':status'=>$status));
		foreach ($petshopredes as $key => $petshoprede) {
			$rede = Rede::model()->findByPk($petshoprede->rede);
			$usuario = Usuario::model()->findByPk($rede->usuario);
			$redeDTO = new RedeDTO();
			$redeDTO->id = $petshoprede->id;
			$redeDTO->petshop = Yii::app()->user->petatual;
			$redeDTO->rede = $petshoprede->rede;
			$redeDTO->redenome = $rede->nome;
			$redeDTO->usuario = $usuario->id;
			$redeDTO->usuarionome = $usuario->nome.' '.$usuario->sobrenome;
			$redeDTO->status = $petshoprede->status;
			$redeDTO->mensagem = $petshoprede->mensagem;
			$redeDTO->data = $petshoprede->data;
			$redeDTO->sede = $petshoprede->sede;
			$dados[] = $redeDTO;
		}
		return $dados;
	}
	
	public function actionFindAllPetshop() {
		$parametros = Util::getParametrosJSON();
		
		$petshops = Petshop::model()->findAll();
		
		$dados = array();
		foreach ($petshops as $key => $petshop) {
			$petshopObj = array();
			$petshopObj['id'] = $petshop->id;
			$petshopObj['nome'] = $petshop->nome;
			$dados[] = $petshopObj;
		}
		
		Util::setParametrosJSON($dados);
	}
	
	public function actionFindAllPetshopByNotRede() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " NOT EXISTS (select 1 from Petshoprede pr where t.id = pr.petshop) ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 't.nome asc';
		
		$petshops = Petshop::model()->findAll($criteria);
		
		if(count($petshops) === 0){
			$petshops = Petshop::model()->findAll();
		}
		
		$dados = array();
		foreach ($petshops as $key => $petshop) {
			$petshopObj = array();
			$petshopObj['id'] = $petshop->id;
			$petshopObj['nome'] = $petshop->nome;
			$dados[] = $petshopObj;
		}
		
		Util::setParametrosJSON($dados);
	}
	
	public function actionFindAllPetshopByUsuario() {
		$parametros = Util::getParametrosJSON();
		
		$condition = " EXISTS (select 1 from Usuariopetshop up where t.id = up.petshop and up.usuario=:usuario)";
		$params = array(':usuario'=>Yii::app()->user->id);
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 't.nome asc';
		
		$petshops = Petshop::model()->findAll($criteria);
		
		if(count($petshops) === 0){
			$petshops = Petshop::model()->findAll();
		}
		
		$dados = array();
		foreach ($petshops as $key => $petshop) {
			$petshopObj = array();
			$petshopObj['id'] = $petshop->id;
			$petshopObj['nome'] = $petshop->nome;
			$dados[] = $petshopObj;
		}
		
		Util::setParametrosJSON($dados);
	}
	
	public function actionGetPagesMenu(){
		$pages = array();
		$pages[] = array('id'=>'agenda','titulo'=>"Agenda",'link'=>$this->createUrl('agenda'),'show'=>"true",'info'=>'');
		$pages[] = array('id'=>'produto','titulo'=>"Produtos",'link'=>$this->createUrl('produto'),'show'=>"true",'info'=>'');
		$pages[] = array('id'=>'servico','titulo'=>"Serviços",'link'=>$this->createUrl('servico'),'show'=>"true",'info'=>'');
		$pages[] = array('id'=>'cliente','titulo'=>"Clientes",'link'=>$this->createUrl('cliente'),'show'=>"true",'info'=>'');
		$pages[] = array('id'=>'venda','titulo'=>"Vendas",'link'=>$this->createUrl('venda'),'show'=>"true",'info'=>'');
		$pages[] = array('id'=>'laboratorio','titulo'=>"Laboratório",'link'=>$this->createUrl('laboratorio'),'show'=>"true",'info'=>'');
		$pages[] = array('id'=>'configuracao','titulo'=>"Configuração",'link'=>$this->createUrl('configuracao'),'show'=>"true",'info'=>'');
		
		Util::setParametrosJSON($pages);
	}
	
}