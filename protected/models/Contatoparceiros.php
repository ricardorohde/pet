<?php

class Contatoparceiros extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
			'Tipocontato'=>array(self::BELONGS_TO, 'Tipocontato', 'tipocontato'),
		);
	}

}

?>