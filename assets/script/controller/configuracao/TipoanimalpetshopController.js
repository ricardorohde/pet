(function($angular) {
    /**
     * TipoAnimal Controller
     **/ 
	$angular.module('app').controller('TipoanimalpetshopController',['$scope','tipoanimalService','messageCenterService', function($scope,$tipoanimalService,$messageCenterService) {
        
        $scope.listatipoanimal = [];
        $scope.listatipoanimalpetshop = [];
        $scope.tipoanimalpetshop = {};
        
        $scope.cancelar = function (){};
        
        $scope.salvar = function (){
            $tipoanimalService.salvarTipoanimalpetshop($scope.tipoanimalpetshop,function(dados){
                $scope.findAllTipoanimalpetshop();
            });
        };
        
        $scope.nova = function (index){
            $scope.tipoanimalpetshop = $tipoanimalService.newTipoanimalpetshop();
        };
        
        $scope.deletar = function (index){
            $tipoanimalService.deletarTipoanimalpetshop(index,function(dados){
                $scope.findAllTipoanimalpetshop();
            });
        };
		
		$scope.findAllTipoanimalpetshop = function (){
		    $tipoanimalService.findAllTipoanimalpetshop(function(){
			   $scope.listatipoanimalpetshop = $tipoanimalService.listatipoanimalpetshop;
			});
		};
		
		$scope.findAllTipoanimal = function (){
		    $tipoanimalService.findAllTipoanimal(function (dados){
			   $scope.listatipoanimal = $tipoanimalService.listatipoanimal;
			});
		};
		
		$scope.iniciar = function(){
			$scope.findAllTipoanimalpetshop();
			$scope.findAllTipoanimal();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);