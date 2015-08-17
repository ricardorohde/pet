(function($angular) {
	/**
	 * Controller AdminTipovenda
	 */
	$angular.module('app').controller('AdminTipovendaController', ['$scope', 'vendaService','utilService', function($scope,$vendaService,$utilService) {
	    
		$scope.novotipovenda = {};
		$scope.deletetipovenda = {};
		$scope.listatipovenda = {};
		
		$scope.editarTipovenda = function(index){
			$scope.novotipovenda.dados = $scope.listatipovenda.dados[index];
			$scope.novotipovenda.show = true;
		};
		
		$scope.novoTipovenda = function(){
			$scope.novotipovenda.dados = {};
			$scope.novotipovenda.dados.nome = undefined;
			$scope.novotipovenda.dados.id = undefined;
			$scope.novotipovenda.show = true;
		};
		
		$scope.salvarTipovenda = function(){
			if($utilService.isNullOrBlanck($scope.novotipovenda.dados.nome,"Você deve digitar o nome do tipo de venda.")) return;
			$vendaService.salvarTipovenda($scope.novotipovenda.dados,
			function(data, status, headers, config) {
				alert('Tipo de venda salvo');
			    $scope.carregarTipovendas();
			});
		};
		
		$scope.deleteTipovenda = function(index){
			$vendaService.deletarTipovenda($scope.listatipovenda.dados[index],
			function(data, status, headers, config) {
				alert('Tipo de venda excluído');
			    $scope.carregarTipovendas();
			});
		};
		
		$scope.carregarTipovendas = function(){
			$vendaService.tipovendas(
			function(data, status, headers, config) {
				$scope.listatipovenda.dados = $angular.fromJson(data);
				$scope.novotipovenda.show = false;
			});
		};
	    
	    $scope.iniciar = function(){
	        $scope.carregarTipovendas();
	    };
	    
	    $scope.iniciar();
	    
	}]);    
})(window.angular);