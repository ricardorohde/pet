<!-- CORPO DA PÁGINA -->
<div class="container" ng-controller='AdminController'>
	
	<div style="margin-top:80px" ></div>
	<div mc-messages ></div>
	<div menu="idPaginaAtual"></div>
	
</div>

<?php 
	Yii::import('application.views.diretiva.imageDiretiva',true);
	Yii::import('application.views.diretiva.menuAdminDiretiva',true);
?>