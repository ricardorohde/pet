<?php

class Cidade extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function relations(){
		return array(
			'Estado'=>array(self::BELONGS_TO, 'Estado', 'estado'),
		);
	}

}

?>