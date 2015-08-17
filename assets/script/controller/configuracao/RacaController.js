(function($angular) {
    /**
     * Raca Controller
     **/ 
	$angular.module('app').controller('RacaController',['$scope','racaService','tipoanimalService','messageCenterService', function($scope,$racaService,$tipoanimalService,$messageCenterService) {
        
        $scope.listaraca = [];
        $scope.listatipoanimal = [];
        $scope.raca = {};
        
        $scope.salvar = function (){
            $racaService.salvarRaca($scope.raca,function(dados){
                $scope.findAllRaca();
            });
        };
        
        $scope.editar = function (index){
            $scope.raca = index;
        };
        
        $scope.nova = function (){
            $scope.raca = $racaService.newRaca();
        };
        
        $scope.deletar = function (index){
            $racaService.deletarRaca(index,function(dados){
                $scope.findAllRaca();
            });
        };
		
		$scope.findAllRaca = function (){
		    $racaService.findAllRaca(function(){
			   $scope.listaraca = $racaService.listaraca;
			});
		};
		
		$scope.findAllTipoanimalPetshop = function (){
		    $tipoanimalService.findAllTipoanimalpetshop(function(dados){
			   $scope.listatipoanimal = $tipoanimalService.listatipoanimalpetshop;
			});
		};
		
		$scope.iniciar = function(){
			$scope.findAllRaca();
			$scope.findAllTipoanimalPetshop();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);