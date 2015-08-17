(function($angular) {
	$angular.module('app').controller('AdminController',['$scope','$timeout','loginService','messageCenterService', function($scope,$timeout,$loginService,$messageCenterService) {
		
		$scope.idPaginaAtual = 'agenda';
		
		$scope.trocarPagina = function (novaPagina){
			$scope.idPaginaAtual = novaPagina;
			$timeout(function(){
				$scope.idPaginaAtual = '';
			},200);
		};
		
		$loginService.getUser(function (dados){
			var html = '<h4>Bem vindo '+$loginService.user.nome+' '+$loginService.user.sobrenome+'!</h4>';
			html += '<p>Seja bem vindo ao seu PetShop.</p>';
			$messageCenterService.add('success', html, { html: true,timeout:3000 });
		});
		
		$scope.order = function(predicate) {
            $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
            $scope.predicate = predicate;
        };
		
		$scope.iniciar = function(){
			
		};
		$scope.iniciar();
		
	}]);
})(window.angular);