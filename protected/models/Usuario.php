<?php

class Usuario extends CActiveRecord{

    public static function model($className=__CLASS__){
        return parent::model($className);
    }
    
    public function relations(){
		return array(
			'Usuariopetshop'=>array(self::HAS_MANY, 'Usuariopetshop', 'usuario'),
		);
	}
	
}

?>