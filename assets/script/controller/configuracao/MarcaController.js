(function($angular) {
    /**
     * Marca Controller
     **/ 
	$angular.module('app').controller('MarcaController',['$scope','marcaService','messageCenterService', 
	                                  function($scope,$marcaService,$messageCenterService) {
        
        $scope.listamarca = [];
        $scope.listastatus = [
			  {status:'ATIVO',nome:'Ativo'},
			  {status:'INATIVO',nome:'Inativo'}
		  ];
        $scope.marca = {};
        
        $scope.salvar = function (){
            $marcaService.salvarMarca($scope.marca,function(dados){
                $scope.findAllMarca();
            });
        };
        
        $scope.editar = function (index){
            $scope.marca = index;
        };
        
        $scope.nova = function (){
            $scope.marca = $marcaService.newMarca();
        };
        
        $scope.deletar = function (index){
            $marcaService.deletarMarca(index,function(dados){
                $scope.findAllMarca();
            });
        };
		
		$scope.findAllMarca = function (){
		    $marcaService.findAllMarca(function(){
			   $scope.listamarca = $marcaService.listamarca;
			});
		};
		
		$scope.iniciar = function(){
			$scope.findAllMarca();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);