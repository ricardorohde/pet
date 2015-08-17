(function($angular) {
    /**
     * Parceiros Controller
     **/ 
	$angular.module('app').controller('ParceirosController',['$scope','parceirosService','messageCenterService', function($scope,$parceirosService,$messageCenterService) {
        
        $scope.listaparceiros = [];
        $scope.parceiros = {};
        
        $scope.salvar = function (){
            $parceirosService.salvarParceiros($scope.parceiros,function(dados){
                $scope.findAllParceiros();
            });
        };
        
        $scope.editar = function (index){
            $scope.parceiros = index;
        };
        
        $scope.nova = function (index){
            $scope.parceiros = $parceirosService.newParceiros();
        };
        
        $scope.deletar = function (index){
            $parceirosService.deletarParceiros(index,function(dados){
                $scope.findAllParceiros();
            });
        };
		
		$scope.findAllParceiros = function (){
		    $parceirosService.findAllParceiros(function(dados){
			   $scope.listaparceiros = $parceirosService.listaparceiros;
			});
		};
		
		$scope.iniciar = function(){
			$scope.findAllParceiros();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);