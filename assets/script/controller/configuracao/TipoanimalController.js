(function($angular) {
    /**
     * TipoAnimal Controller
     **/ 
	$angular.module('app').controller('TipoanimalController',['$scope','tipoanimalService','messageCenterService', function($scope,$tipoanimalService,$messageCenterService) {
        
        $scope.listatipoanimal = [];
        $scope.tipoanimal = {};
        
        $scope.cancelar = function (){};
        
        $scope.salvar = function (){
            $tipoanimalService.salvarTipoanimal($scope.tipoanimal,function(dados){
                $scope.findAllTipoanimal();
            });
        };
        
        $scope.nova = function (index){
            $scope.tipoanimal = $tipoanimalService.newTipoanimal();
        };
        
        $scope.deletar = function (index){
            $tipoanimalService.deletarTipoanimal(index,function(dados){
                $scope.findAllTipoanimal();
            });
        };
		
		$scope.findAllTipoanimal = function (){
		    $tipoanimalService.findAllTipoanimal(function(){
			   $scope.listatipoanimal = $tipoanimalService.listatipoanimal;
			});
		};
		
		$scope.iniciar = function(){
			$scope.findAllTipoanimal();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);