(function($angular) {
	/**
	 * Controller AdminAnimal
	 */
	$angular.module('app').controller('AdminAnimalController', ['$scope', 'animalService', function($scope,$animalService) {
	    
	    $scope.adicionarAnimal = function (){
	        $animalService.newAnimal();
	        $scope.trocarPagina("cadastroanimal");
	    };
	    
	    $scope.editarAnimal = function (index){
	        $animalService.loadAnimal(index);
	        $scope.trocarPagina("cadastroanimal");
		};
	    
		$scope.paginaMaisAnimal = function(){
			$scope.animalPagina += 1;
			if($scope.animalPagina > $scope.animalQtdPagina){
				$scope.animalPagina = $scope.animalQtdPagina;
			}
			$scope.animalCarregar();
		};
		
		$scope.paginaMenosAnimal = function(){
			$scope.animalPagina -= 1;
			if($scope.animalPagina < 0){
				$scope.animalPagina = 0;
			}
			$scope.animalCarregar();
		};
		
		$scope.animalExcluido = function (index){
		    $animalService.loadAnimal(index);
			$animalService.animalExcluido(
			function(data, status, headers, config) {
				$scope.carregarAnimais();
				$scope.carregarQtdAnimais();
			});
		};
		
		$scope.carregarQtdAnimais = function (){
		    $animalService.qtdAnimais(
	        function(data, status, headers, config) {
				$scope.qtdAnimais = $angular.fromJson(data);
			});
		};
		
		$scope.animalPaginacao = function (){
		    var parametros = {};
			parametros.limite = $scope.animalLimite;
			$animalService.animalPaginacao(parametros,
			function(data, status, headers, config) {
				$scope.animalQtd = $angular.fromJson(data);
				$scope.animalQtdPagina = parseInt($scope.animalQtd / $scope.animalLimite);
				$scope.carregarQtdAnimais();
			});
		};
		
		$scope.animalCarregar = function (){
		    var parametros = {};
			parametros.pagina = $scope.animalPagina;
			parametros.limite = $scope.animalLimite;
			$animalService.animalCarregar(parametros,
			function() {
				$scope.listaanimal = $animalService.listaanimal;
				$scope.animalInicio = ($scope.listaanimal.length > 0)?parseInt(($scope.animalPagina * $scope.animalLimite) + 1):0;
				$scope.animalFim = parseInt(($scope.animalPagina * $scope.animalLimite) + $scope.listaanimal.length);
				$scope.animalVazio = $scope.listaanimal.length == 0;
			});
		};
		
		$scope.animalFindAll = function (){
			$animalService.animalFindAll(
			function(data, status, headers, config) {
				$scope.listatodosanimais = $angular.fromJson(data);
			});
		};
		
		$scope.carregarAnimais = function(){
			$scope.animalVazio = true;
			$scope.animalPagina = 0;
			$scope.animalLimite = 10;
			$scope.animalPaginacao();
			$scope.animalCarregar();
			$scope.animalFindAll();
		};
		
		$scope.$on('call-animal', function(event, params) {
	        $scope.iniciar();
	    });
	    
	    $scope.iniciar = function(){
	        $scope.carregarAnimais(); 
	    };
	    
	    $scope.iniciar();
	    
	}]);
})(window.angular);