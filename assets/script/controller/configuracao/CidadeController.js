(function($angular) {
    /**
     * Cidade Controller
     **/ 
	$angular.module('app').controller('CidadeController',['$scope','cidadeService','estadoService','messageCenterService', function($scope,$cidadeService,$estadoService,$messageCenterService) {
        
        $scope.listacidade = [];
        $scope.listaestado = [];
        $scope.listacidadepetshop = [];
        $scope.cidadepetshop = {};
        
        $scope.cancelar = function (){};
        
        $scope.salvar = function (){
            $cidadeService.salvarCidadepetshop($scope.cidadepetshop,function(dados){
                $scope.findAllCidadepetshop();
            });
        };
        
        $scope.nova = function (index){
            $scope.cidadepetshop = $cidadeService.newCidadepetshop();
        };
        
        $scope.deletar = function (index){
            $cidadeService.deletarCidadepetshop(index,function(dados){
                $scope.findAllCidadepetshop();
            });
        };
		
		$scope.findAllCidadepetshop = function (){
		    $cidadeService.findAllCidadepetshop(function(){
			   $scope.listacidadepetshop = $cidadeService.listacidadepetshop;
			});
		};
		
		$scope.findAllCidadeByEstado = function (){
		    $cidadeService.findAllCidadeByEstado($scope.cidadepetshop,function (dados){
			   $scope.listacidade = $cidadeService.listacidade;
			});
		};
		
		$scope.findAllEstado = function (){
		    $estadoService.findAllEstado(function(){
			   $scope.listaestado = $estadoService.listaestado;
			});
		};
		
		$scope.iniciar = function(){
			$scope.findAllCidadepetshop();
			$scope.findAllEstado();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);