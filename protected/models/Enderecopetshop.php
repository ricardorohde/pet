<?php

class Enderecopetshop extends CActiveRecord{
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
			'Bairro'=>array(self::BELONGS_TO, 'Bairro', 'bairro'),
		);
	}

}

?>