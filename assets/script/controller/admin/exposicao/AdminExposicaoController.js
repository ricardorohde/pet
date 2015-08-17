(function($angular) {
	/**
	 * Controller AdminExposicao
	 */
	$angular.module('app').controller('AdminExposicaoController', ['$scope', 'exposicaoService', function($scope,$exposicaoService) {
	    
	    $scope.adicionarExposicao = function (){
	        $exposicaoService.newExposicao();
	        $scope.trocarPagina("cadastroexposicao");
	    };
	    
	    $scope.editarExposicao = function (index){
	        $exposicaoService.loadExposicao(index);
	        $scope.trocarPagina("cadastroexposicao");
		};
	    
		$scope.paginaMaisExposicao = function(){
			$scope.exposicaoPagina += 1;
			if($scope.exposicaoPagina > $scope.exposicaoQtdPagina){
				$scope.exposicaoPagina = $scope.exposicaoQtdPagina;
			}
			$scope.exposicaoCarregar();
		};
		
		$scope.paginaMenosExposicao = function(){
			$scope.exposicaoPagina -= 1;
			if($scope.exposicaoPagina < 0){
				$scope.exposicaoPagina = 0;
			}
			$scope.exposicaoCarregar();
		};
		
		$scope.exposicaoExcluido = function (index){
		    $exposicaoService.loadExposicao(index);
			$exposicaoService.exposicaoExcluido(
			function(data, status, headers, config) {
				$scope.carregarExposicoes();
				$scope.carregarQtdExposicoes();
			});
		};
		
		$scope.carregarQtdExposicoes = function (){
		    $exposicaoService.qtdExposicoes(
	        function(data, status, headers, config) {
				$scope.qtdExposicoes = $angular.fromJson(data);
				if(parseInt($scope.qtdExposicoes) != 0){
					$scope.qtdExposicoesShow = true;
				}else{
					$scope.qtdExposicoesShow = false;
				}
			});
		};
		
		$scope.limparExposicoes = function(){
			$scope.listaexposicao = [];
			$scope.exposicaoQtd = 0;
			$scope.exposicaoInicio = 0;
			$scope.exposicaoFim = 0;
			$scope.exposicaoPagina = 0;
			$scope.exposicaoQtdPagina = 0;
			$scope.exposicaoVazio = true;
		};
		
		$scope.exposicaoPaginacao = function (){
			var parametros = {};
			parametros.limite = $scope.exposicaoLimite;
			$exposicaoService.exposicaoPaginacao(parametros,
			function(data, status, headers, config) {
				$scope.exposicaoQtd = $angular.fromJson(data);
				$scope.exposicaoQtdPagina = parseInt($scope.exposicaoQtd / $scope.exposicaoLimite);
				$scope.carregarQtdExposicoes();
			});
		};
		
		$scope.exposicaoCarregar = function (){
			var parametros = {};
			parametros.pagina = $scope.exposicaoPagina;
			parametros.limite = $scope.exposicaoLimite;
			$exposicaoService.exposicaoCarregar(parametros,
			function() {
				$scope.listaexposicao = $exposicaoService.listaexposicao;
				$scope.exposicaoInicio = ($scope.listaexposicao.length > 0)? parseInt(($scope.exposicaoPagina * $scope.exposicaoLimite) + 1):0;
				$scope.exposicaoFim = parseInt(($scope.exposicaoPagina * $scope.exposicaoLimite) + $scope.listaexposicao.length);
				$scope.exposicaoVazio = $scope.listaexposicao.length == 0;
			});
		};
		
		$scope.carregarExposicoes = function(){
			$scope.exposicaoVazio = true;
			$scope.exposicaoPagina = 0;
			$scope.exposicaoLimite = 10;
			$scope.exposicaoPaginacao();
			$scope.exposicaoCarregar();
		};
		
		$scope.$on('call-exposicao', function(event, params) {
	        $scope.iniciar();
	    });
	    
	    $scope.iniciar = function(){
	        $scope.carregarExposicoes(); 
	    };
	    
	    $scope.iniciar();
	    
	}]);    
})(window.angular);