<?php

class Parceiros extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
				'Contatoparceiros'=>array(self::HAS_MANY, 'Contatoparceiros', 'parceiros'),
		);
	}

}

?>