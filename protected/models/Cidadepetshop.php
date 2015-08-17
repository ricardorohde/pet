<?php

class Cidadepetshop extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
			'Cidade'=>array(self::BELONGS_TO, 'Cidade', 'cidade'),
		);
	}

}

?>