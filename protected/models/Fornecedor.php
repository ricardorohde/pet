<?php

class Fornecedor extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
			'Contatos'=>array(self::HAS_MANY, 'Contatofornecedor', 'fornecedor'),
		);
	}

}

?>