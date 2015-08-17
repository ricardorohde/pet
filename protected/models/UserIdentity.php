<?php

/**
 * Classe para autenticar um usuário no sistema.
 * @author jonas franco kreling
 * 
 */
   
class UserIdentity extends CUserIdentity {
	
	private $_id;
	
	public function authenticate(){
		$record=Usuario::model()->findByAttributes(array('email'=>$this->username,'senha'=>$this->password));
		if( $record === null )
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if( $record->senha !== $this->password )
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id = $record->id;
			$this->setState('nome', $record->nome);
			$this->setState('sobrenome', $record->sobrenome);
			$this->setState('celular', $record->celular);
			$this->setState('email', $record->email);
			$this->setState('foto', $record->foto);
			$this->setState('tipoUsuario', $record->tipoUsuario);
			$petshops = $record->Usuariopetshop;
			$idPetshop = array();
			foreach ($petshops as $key => $petshop) {
				$idPetshop[] = $petshop->petshop;
			}
			$this->setState('petshop', $idPetshop);
			$this->setState('petatual', $idPetshop[0]);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
 
	public function getId() {
		return $this->_id;
	}
	
}

?>