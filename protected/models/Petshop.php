<?php

class Petshop extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
			'Mensalidade'=>array(self::HAS_MANY, 'Mensalidade', 'petshop'),
			'Enderecopetshop'=>array(self::HAS_MANY, 'Enderecopetshop', 'petshop'),
		);
	}

}

?>