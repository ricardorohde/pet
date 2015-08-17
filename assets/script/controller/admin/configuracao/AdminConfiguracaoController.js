(function($angular) {
	/**
	 * Controller AdminConfiguração
	 */
	$angular.module('app').controller('AdminConfiguracaoController', ['$scope', 'utilService', function($scope,$utilService) {
	    
	    $scope.user = 0;
	    $utilService.getCarregarDadosSite(function(){
	    	$scope.carregarDadosDoSite = $utilService.cds;
	    });
	    
	    $scope.salvarGeral = function (){
	    	var carregarDados = $scope.carregarDadosDoSite?'true':'false';
	    	$utilService.salvarGeral({carregarDados:carregarDados}, function (dados){
	    		alert('Salvo');
	    		$utilService.getCarregarDadosSite(function (){
	    			$scope.carregarDadosDoSite = $utilService.cds;
	    		});
	    	});
	    };
	    
	    $scope.iniciar = function(){
	        $scope.user = $utilService.getTipoUsuario();
	    };
	    
	    $scope.iniciar();
	    
	}]);
})(window.angular);