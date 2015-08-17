(function($angular) {
	/**
	 * Controller AdminVenda
	 */
	$angular.module('app').controller('AdminVendaController', ['$scope', 'vendaService', function($scope,$vendaService) {
	    
	    $scope.adicionarVenda = function (){
	        $vendaService.newVenda();
	        $scope.trocarPagina("cadastrovenda");
	    };
	    
	    $scope.editarVenda = function (index){
	        $vendaService.loadVenda(index);
	        $scope.trocarPagina("cadastrovenda");
		};
	    
		$scope.paginaMaisVenda = function(){
			$scope.vendaPagina += 1;
			if($scope.vendaPagina > $scope.vendaQtdPagina){
				$scope.vendaPagina = $scope.vendaQtdPagina;
			}
			$scope.vendaCarregar();
		};
		
		$scope.paginaMenosVenda = function(){
			$scope.vendaPagina -= 1;
			if($scope.vendaPagina < 0){
				$scope.vendaPagina = 0;
			}
			$scope.vendaCarregar();
		};
		
		$scope.vendaExcluido = function (index){
		    $vendaService.loadVenda(index);
			$vendaService.vendaExcluido(
			function(data, status, headers, config) {
				$scope.carregarVendas();
				$scope.carregarQtdVendas();
			});
		};
		
		$scope.carregarQtdVendas = function (){
		    $vendaService.qtdVendas(
	        function(data, status, headers, config) {
				$scope.qtdVendas = angular.fromJson(data);
			});
		};
		
		$scope.limparVendas = function(){
			$scope.listavenda = [];
			$scope.vendaQtd = 0;
			$scope.vendaInicio = 0;
			$scope.vendaFim = 0;
			$scope.vendaPagina = 0;
			$scope.vendaQtdPagina = 0;
			$scope.vendaVazio = true;
		};
		
		$scope.vendaPaginacao = function (){
		    var parametros = {};
			parametros.limite = $scope.vendaLimite;
			$vendaService.vendaPaginacao(parametros,
			function(data, status, headers, config) {
				$scope.vendaQtd = angular.fromJson(data);
				$scope.vendaQtdPagina = parseInt($scope.vendaQtd / $scope.vendaLimite);
				$scope.carregarQtdVendas();
			});
		};
		
		$scope.vendaCarregar = function (){
		    var parametros = {};
			parametros.pagina = $scope.vendaPagina;
			parametros.limite = $scope.vendaLimite;
			$vendaService.vendaCarregar(parametros,
			function() {
				$scope.listavenda = $vendaService.listavenda;
				$scope.vendaInicio = ($scope.listavenda.length > 0)? parseInt(($scope.vendaPagina * $scope.vendaLimite) + 1):0;
				$scope.vendaFim = parseInt(($scope.vendaPagina * $scope.vendaLimite) + $scope.listavenda.length);
				$scope.vendaVazio = $scope.listavenda.length == 0;
			});
		};
		
		$scope.carregarVendas = function(){
			$scope.vendaVazio = true;
			$scope.vendaPagina = 0;
			$scope.vendaLimite = 10;
			$scope.vendaPaginacao();
			$scope.vendaCarregar();
		};
		
		
		
		$scope.$on('call-venda', function(event, params) {
	        $scope.iniciar();
	    });
	    
	    $scope.iniciar = function(){
	        $scope.carregarVendas(); 
	    };
	    
	    $scope.iniciar();
	    
	}]);    
})(window.angular);