(function($angular) {
	/**
	 * Controller AdminPagina
	 */
	$angular.module('app').controller('AdminPaginaController', ['$scope', 'paginaService','utilService', function($scope,$paginaService,$utilService) {
	    
		$scope.novapagina = {};
		$scope.deletepagina = {};
		$scope.listapagina = {};
		
		$scope.editarPagina = function(index){
			$scope.novapagina.dados = $scope.listapagina.dados[index];
			$scope.novapagina.show = true;
			$scope.listapagina.show = false;
		};
		
		$scope.novaPagina = function(){
			$scope.novapagina.dados = {};
			$scope.novapagina.dados.nome = undefined;
			$scope.novapagina.dados.posicao = undefined;
			$scope.novapagina.dados.id = undefined;
			$scope.novapagina.show = true;
			$scope.listapagina.show = false;
		};
		
		$scope.salvarPagina = function(){
			if($utilService.isNullOrBlanck($scope.novapagina.dados.nome,"Você deve digitar o nome da Página.")) return;
			if($utilService.isNullOrBlanck($scope.novapagina.dados.posicao,"Você deve digitar a posição da Página.")) return;
			$paginaService.salvarPagina($scope.novapagina.dados,
			function(data, status, headers, config) {
				alert('Página salva');
			    $scope.carregarPaginas();
			});
		};
		
		$scope.deletePagina = function(index){
			if(confirm("Você tem certeza que deseja excluir esse registro?")){
			    $paginaService.deletarPagina($scope.listapagina.dados[index],
			    function(data, status, headers, config) {
					alert('Página excluída.');
				    $scope.carregarPaginas();
				});
			}
		};
		
		$scope.carregarPaginas = function(){
		    $paginaService.paginas(
	        function(data, status, headers, config) {
					$scope.listapagina.dados = $angular.fromJson(data);
					$scope.novapagina.show = false;
					$scope.listapagina.show = true;
			});
		};
	    
	    $scope.iniciar = function(){
	        $scope.carregarPaginas();
	    };
	    
	    $scope.iniciar();
	    
	}]);    
})(window.angular);