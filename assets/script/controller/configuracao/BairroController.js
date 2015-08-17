(function($angular) {
    /**
     * Bairro Controller
     **/ 
	$angular.module('app').controller('BairroController',['$scope','bairroService','cidadeService','messageCenterService', function($scope,$bairroService,$cidadeService,$messageCenterService) {
        
        $scope.listabairropetshop = [];
        $scope.listacidadepetshop = [];
        $scope.bairro = {};
        
        $scope.cancelar = function (){
            
        };
        
        $scope.salvar = function (){
            $bairroService.salvarBairropetshop($scope.bairro,function(dados){
                $scope.findAllBairropetshop();
            });
        };
        
        $scope.editar = function (index){
            $scope.bairro = index;
        };
        
        $scope.nova = function (index){
            $scope.bairro = $bairroService.newBairropetshop();
        };
        
        $scope.deletar = function (index){
            $bairroService.deletarBairropetshop(index,function(dados){
                $scope.findAllBairropetshop();
            });
        };
		
		$scope.findAllBairropetshop = function (){
		    $bairroService.findAllBairropetshop(function(){
			   $scope.listabairropetshop = $bairroService.listabairropetshop;
			});
		};
		
		$scope.findAllCidadepetshop = function (){
		    $cidadeService.findAllCidadepetshop(function(){
			   $scope.listacidadepetshop = $cidadeService.listacidadepetshop;
			});
		};
		
		$scope.iniciar = function(){
			$scope.findAllBairropetshop();
			$scope.findAllCidadepetshop();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);