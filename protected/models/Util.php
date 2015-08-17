<?php

class Util{

    public static function isAdmin(){
        return Yii::app()->user->tipoUsuario != 0;
    }
    
    public static function getDate(){
		return date('Y-m-d H:i:s');
	}
	
	public static function getParametrosJSON(){
	    $post = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($post, true);
		return $parametros;
	}
	
	public static function setParametrosJSON($response){
	    header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	
}

?>