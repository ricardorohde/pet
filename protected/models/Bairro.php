<?php

class Bairro extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
			'Cidadepetshop'=>array(self::BELONGS_TO, 'Cidadepetshop', 'cidadepetshop'),
		);
	}

}

?>