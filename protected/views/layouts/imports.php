<?php 
		/* CSS */
		$controller = Yii::app()->getController();
		$default_controller = Yii::app()->defaultController;
		$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction || $controller->action->id === 'deslogarUsuario')) ? true : false;
	
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/bootstrap/css/bootstrap.css");
	
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/css.php");
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/menu/menu1.css");
		if($isHome){
			
		}else{
			
		}
	
		/* JAVASCRIPT */
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/jquery/jquery.min.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/css/bootstrap/js/bootstrap.min.js");
	
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/angular/angular.min.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/angular/angular-locale_pt-br.js");
	
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/ui-utils/ui-utils-ieshiv.min.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/ui-utils/ui-utils.min.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/ui-utils/masks.min.js"); 
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/d3/d3.min.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/angular-chart/dist/angular-charts.js");
		
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/ng-imgur/ng-imgur.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/js/message-center/message-center.js");
		
?>