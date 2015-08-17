(function($angular) {
    /**
     * Rede Controller
     **/ 
	$angular.module('app').controller('RedeController',['$scope','redeService','petshopService','messageCenterService','utilService', function($scope,$redeService,$petshopService,$messageCenterService,$utilService) {
        
        $scope.rede = {};
        $scope.petshoprede = {};
        $scope.listapetshop = [];
        
        $scope.salvar = function (){
            $redeService.salvarRede($scope.rede,function(dados){
                $scope.buscar();
            });
        };
        
        $scope.buscar = function (){
            $redeService.buscarRede($scope.rede,function(dados){
                $scope.rede = $redeService.rede;
            });
        };
        
        $scope.findAllPetshopByNotRede = function (){
            $petshopService.findAllPetshopByNotRede($scope.rede,function (dados){
                $scope.listapetshop = $angular.fromJson(dados);
            });
        };
		
		$scope.convidarPetshop = function (){
		    if(!$utilService.isNullOrBlanck($scope.rede.id)){
                $scope.findAllPetshopByNotRede();
		    }
		};
		
		$scope.selecionarPetshop = function (petshop){
		    $scope.petshoprede.petshop = petshop.id;
		    $scope.petshoprede.rede = $scope.rede.id;
		};
		
		$scope.enviarConvitePetshop = function (){
		    if(!$utilService.isNullOrBlanck($scope.rede.id)){
                $petshopService.enviarConvitePetshop($scope.petshoprede,function (dados){
                    $scope.petshoprede = {};
                    $scope.buscar();
                }); 
		    }
		};
		
		$scope.deletarPetshoprede = function (petshoprede){
		    $petshopService.rejeitarConvite(petshoprede, function(dados){
                $scope.buscar();
            });
		};
		
		$scope.iniciar = function(){
			$scope.buscar();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);