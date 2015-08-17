<?php

class Animal extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function relations(){
		return array(
			'Raca'=>array(self::BELONGS_TO, 'Raca', 'raca'),
			'Pai'=>array(self::BELONGS_TO, 'Animal', 'pai'),
			'Mae'=>array(self::BELONGS_TO, 'Animal', 'mae'),
			'Pagina'=>array(self::BELONGS_TO, 'Pagina', 'pagina'),
			'Imagemanimal'=>array(self::HAS_MANY, 'Imagemanimal', 'animal'),
			'Animalpremiacao'=>array(self::HAS_MANY, 'Animalpremiacao', 'animal'),
		);
	}

}

?>