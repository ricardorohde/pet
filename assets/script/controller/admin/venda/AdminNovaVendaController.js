(function($angular) {
	/**
	 * Controller AdminNovaVenda
	 */
	$angular.module('app').controller('AdminNovaVendaController', ['$scope', 'vendaService','animalService', function($scope,$vendaService,$animalService) {
	    
		$scope.tabShowVenda = function(tab){
			$('#tabVenda a[href="#'+tab+'"]').tab('show');
		};
		
		$scope.colocarImagemCarregando = function (){
			$scope.venda.isNotSave = true;
		    if($angular.isUndefined($scope.venda.imagens)){
		        $scope.venda.imagens = [];
		    }
		    var newImage = $scope.newImage();
			$scope.venda.imagens.splice(0,0,newImage);
			return newImage;
		};
		
		$scope.depoisCarregarImagens = function (){
			$scope.venda.isNotSave = false;
		};
		
		$scope.newImage = function (){
		    return {'url':'','show':true,'status':'I','id':''}; 
		};
		
		$scope.escolherTipoVenda = function(tab){
			if($scope.novavenda.tipovenda == 5){
				$scope.novavenda.showAnimal2 = true;
			}else{
				$scope.novavenda.showAnimal2 = false;
			}
		};
		
		$scope.salvarVenda = function (){
			$vendaService.salvarVenda(
			function(data, status, headers, config) {
				$scope.trocarPagina("vendas");
			});
		};
	    
	    $scope.getTipovenda = function (){
	    	$vendaService.tipovendas(function (data){
	    		$scope.listatipovenda = $vendaService.listatipovenda;
	    	})
	    };
	    
	    $scope.getAnimal = function (){
	    	$animalService.animalFindAll(function (data){
	    		$scope.listatodosanimal = $animalService.listatodosanimal;
	    	})
	    };
	    
	    $scope.iniciar = function(){
	    	$scope.getTipovenda();
	    	$scope.getAnimal();
	    	
	        $scope.venda = $vendaService.venda;
	        $scope.tabShowVenda('venda');
	    };
	    
	    $scope.iniciar();
	    
	}]);    
})(window.angular);