(function($angular) {
	/**
	 * Controller AdminRaca
	 */
	$angular.module('app').controller('AdminRacaController', ['$scope', 'racaService','utilService', function($scope,$racaService,$utilService) {
	    
		$scope.novaraca = {};
		$scope.deleteraca = {};
		$scope.listaraca = {};
		
		$scope.editarRaca = function(index){
			$scope.novaraca.dados = $scope.listaraca.dados[index];
			$scope.novaraca.show = true;
			$scope.listaraca.show = false;
		};
		
		$scope.novaRaca = function(){
			$scope.novaraca.dados = {};
			$scope.novaraca.dados.nome = "";
			$scope.novaraca.dados.origem = "";
			$scope.novaraca.dados.id = "";
			$scope.novaraca.show = true;
			$scope.listaraca.show = false;
		};
		
		$scope.salvarRaca = function(){
			if($utilService.isNullOrBlanck($scope.novaraca.dados.nome,"Você deve digitar o nome da raça.")) return;
			$racaService.salvarRaca($scope.novaraca.dados,
			function(data) {
				alert('Raça salva');
			    $scope.carregarRacas();
			});
		};
		
		$scope.deleteRaca = function(index){
			if(confirm("Você tem certeza que deseja excluir esse registro?")){
				$racaService.deletarRaca($scope.listaraca.dados[index],
				function(data, status, headers, config) {
					alert('Raça excluída');
				    $scope.carregarRacas();
				});
			}
		};
		
		$scope.carregarRacas = function(){
			$racaService.racas(
			function(data, status, headers, config) {
					$scope.listaraca.dados = $angular.fromJson(data);
					$scope.novaraca.show = false;
					$scope.listaraca.show = true;
			});
		};
	    
	    $scope.iniciar = function(){
	        $scope.carregarRacas();
	    };
	    
	    $scope.iniciar();
	    
	}]);
})(window.angular);