<?php

class Venda extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
			'Animal'=>array(self::BELONGS_TO, 'Animal', 'animal'),
			'Animal2'=>array(self::BELONGS_TO, 'Animal', 'animal2'),
			'Tipovenda'=>array(self::BELONGS_TO, 'Tipovenda', 'tipovenda'),
		);
	}

}

?>