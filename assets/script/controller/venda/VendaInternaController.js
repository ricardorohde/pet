(function($angular) {
    $angular.module('app').controller('VendaInternaController',['$scope','vendaService','utilService', function($scope,$vendaService,$utilService) {
        $scope.linkar = function (link){
          window.location.href = link;
        };
        
        $scope.openAnimal = function (id){
        	$scope.linkar($utilService.urlAction() + 'animal/'+id);
        };
        
        $scope.tipovendasNome = "";
        $scope.dados = {};
        $scope.listavendas = [];
        
        $scope.carregarVendas = function (){
            $vendaService.carregarVendas({'tipovenda':tipovenda},
            function(data, status, headers, config) {
    		    $scope.listavendas = $vendaService.listavenda;
    		    $scope.tratarListaVendas();
    		});
        };
        
        $scope.tratarListaVendas = function (){
        	$scope.listavendasdivididas = [];	
    		while ($scope.listavendas.length) {
        		$scope.listavendasdivididas.push($scope.listavendas.splice(0, 3));
    		}
        };
        
        $scope.listatipovendas = [];
        $scope.carregarTipovendas = function (){
        	$vendaService.tipovendas(
    		function(data, status, headers, config) {
    		    $scope.listatipovendas = $angular.fromJson(data);
    		    $scope.tratarTipovendas();
    		});
        };
        
        $scope.tratarTipovendas = function (){
        	for(var i = 0; i < $scope.listatipovendas.length; i++){
    	        if($scope.listatipovendas[i].id == tipovenda){
    	            $scope.tipovendasNome = $scope.listatipovendas[i].nome;
    	            break;
    	        }
    	    }
        };
        
        $scope.iniciar = function(){
            $scope.carregarVendas();
            $scope.carregarTipovendas();
        };
        $scope.iniciar();
        
    }]);
})(window.angular);