<!-- SCRIPTS USADOS NA APLICAÇÃO -->
<?php 
	$baseScript = Yii::app()->baseUrl."/assets/script/";
	$time = time();
	
	echo CHtml::scriptFile($baseScript."app.js?".$time);
	
	/* DIRETIVAS */
	echo CHtml::scriptFile($baseScript."diretivas/imageDiretiva.js?".$time);
	echo CHtml::scriptFile($baseScript."diretivas/menuAdminDiretiva.js?".$time);
	
	/* SERVICES */
	echo CHtml::scriptFile($baseScript."service/util/utilService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/login/loginService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/rede/redeService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/petshop/petshopService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/cidade/cidadeService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/estado/estadoService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/bairro/bairroService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/tipoanimal/tipoanimalService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/unidademedida/unidademedidaService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/raca/racaService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/parceiros/parceirosService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/fornecedor/fornecedorService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/tipocontato/tipocontatoService.js?".$time);
	echo CHtml::scriptFile($baseScript."service/marca/marcaService.js?".$time);
	
	
	/* CONTROLLERS */
	echo CHtml::scriptFile($baseScript."controller/menu/MenuController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/login/LoginController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/admin/AdminController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/ConfiguracaoController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/RedeController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/PetshopController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/CidadeController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/BairroController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/TipoanimalController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/TipoanimalpetshopController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/UnidademedidaController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/RacaController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/ParceirosController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/FornecedorController.js?".$time);
	echo CHtml::scriptFile($baseScript."controller/configuracao/MarcaController.js?".$time);
	
?>
	
	<script>
		(function($angular) {
			$angular.bootstrap(document, ['app']);
		})(window.angular);
	</script>