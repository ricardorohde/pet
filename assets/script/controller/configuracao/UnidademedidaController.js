(function($angular) {
    /**
     * UnidadeMedida Controller
     **/ 
	$angular.module('app').controller('UnidademedidaController',['$scope','unidademedidaService','messageCenterService', function($scope,$unidademedidaService,$messageCenterService) {
        
        $scope.listaunidademedida = [];
        $scope.unidademedida = {};
        
        $scope.cancelar = function (){
            
        };
        
        $scope.salvar = function (){
            $unidademedidaService.salvarUnidademedida($scope.unidademedida,function(dados){
                $scope.findAllUnidademedida();
            });
        };
        
        $scope.editar = function (index){
            $scope.unidademedida = index;
        };
        
        $scope.nova = function (index){
            $scope.unidademedida = $unidademedidaService.newUnidademedida();
        };
        
        $scope.deletar = function (index){
            $unidademedidaService.deletarUnidademedida(index,function(dados){
                $scope.findAllUnidademedida();
            });
        };
		
		$scope.findAllUnidademedida = function (){
		    $unidademedidaService.findAllUnidademedida(function(){
			   $scope.listaunidademedida = $unidademedidaService.listaunidademedida;
			});
		};
		
		$scope.iniciar = function(){
			$scope.findAllUnidademedida();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);