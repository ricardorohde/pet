(function($angular) {
	/**
	 * Cadastro de Login
	 */ 
	$angular.module('app').controller('LoginController', ['$scope','utilService','loginService', function( $scope, $utilService, $loginService) {
		$scope.login = {};
		$scope.valor = function(valor,mensagem){
			if(valor == undefined || valor == ""){
				alert(mensagem);
				return true;
			}
			return false;
		};
		$scope.validar = function() {
			if($scope.valor($scope.login.email,"Preencha o login.")) return;
			if($scope.valor($scope.login.senha,"Preencha a senha.")) return;
			$loginService.logar($scope.login,function (data){
				var logado = $angular.fromJson(data);
				if(logado.sucesso){
					$scope.logado();
				}else{
					$scope.formClass = "has-error";
					$scope.login.senha = '';
				}
			},
			function (data){
				$scope.formClass = "has-error";
				$scope.login.senha = '';
			});
		};
		
		$scope.logado = function (){
			$loginService.isLogado(function(data){
				var dados = $angular.fromJson(data);
				if(dados.sucesso){
					window.location.assign($utilService.urlAction()+'g');
				}
			});
		};
		
		$scope.iniciar = function(){
			$scope.logado();
			$scope.login.email = '';
			$scope.login.senha = '';
			$(document.body).on('keypress',function(e){
				var keyCode = (event.keyCode ? event.keyCode : event.which);   
	    		if (keyCode == 13) {
					$scope.validar();
	    		}
			});
		};
		$scope.iniciar();
	}]);
	
})(window.angular);