(function($angular) {
    /**
     * TipoAnimal Controller
     */ 
    $angular.module('app').controller('TipoAnimalController',['$scope','paginaService','animalService','utilService', function($scope,$paginaService,$animalService,$utilService) {
        
        $scope.linkar = function (link){
          window.location.href = link;
        };
        
        $scope.openAnimal = function (id){
        	$scope.linkar($utilService.urlAction()+'animal/'+id);
        };
        
        $scope.tipoanimalNome = "";
        $scope.listaanimais = undefined;
        $scope.carregarAnimais = function (){
            $animalService.animalCarregar({'tipoanimal':tipoanimal},
            function() {
    	    	$scope.listaanimais = $animalService.listaanimal;
    	    	$scope.tratarListaAnimais();
    		});
        };
        
        $scope.tratarListaAnimais = function (){
        	$scope.listaanimaisdivididos = [];	
    		while ($scope.listaanimais.length) {
        		$scope.listaanimaisdivididos.push($scope.listaanimais.splice(0, 3));
    		}
        };
        
        $scope.listapaginas = [];
        $scope.carregarPaginas = function (){
        	$paginaService.paginas($scope.carregarPaginasCallback);
        };
        
        $scope.carregarPaginasCallback = function(data, status, headers, config) {
    	    $scope.listapaginas = $angular.fromJson(data);
    	    for(var i = 0; i < $scope.listapaginas.length; i++){
    	        if($scope.listapaginas[i].id == tipoanimal){
    	            $scope.tipoanimalNome = $scope.listapaginas[i].nome;
    	            break;
    	        }
    	    }
    	};
        
        $scope.iniciar = function(){
            $scope.carregarAnimais();
            $scope.carregarPaginas();
        };
        $scope.iniciar();
    }]);
})(window.angular);