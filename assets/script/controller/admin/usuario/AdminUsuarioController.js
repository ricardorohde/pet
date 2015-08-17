(function($angular) {
	/**
	 * Controller AdminUsuario
	 */
	$angular.module('app').controller('AdminUsuarioController', ['$scope', 'usuarioService','utilService', function($scope,$usuarioService,$utilService) {
	    
		$scope.submitUsuario = function (){};
		
		$scope.submitSenha = function (){};
		
		$scope.salvarUsuario = function(){
			if($utilService.isNullOrBlanck($scope.usuario.nome,"Você deve digitar o nome.")) return;
			if($utilService.isNullOrBlanck($scope.usuario.sobrenome,"Você deve digitar o sobrenome.")) return;
			if($utilService.isNullOrBlanck($scope.usuario.nascimento,"Você deve digitar a data de nascimento.")) return;
			if($utilService.isNullOrBlanck($scope.usuario.sexo,"Você deve selecionar o sexo.")) return;
			if($utilService.isNullOrBlanck($scope.usuario.celular,"Você deve digitar o celular.")) return;
			if($utilService.isNullOrBlanck($scope.usuario.email,"Você deve digitar o e-mail.")) return;
			$('#formCadastrarUsuario').submit();
		};
		
		$scope.salvarSenha = function(){
			if($utilService.isNullOrBlanck($scope.usuario.senha,"Você deve digitar a senha.")) return;
			if($utilService.isNullOrBlanck($scope.usuario.novasenha,"Você deve digitar a nova senha.")) return;
			if($scope.usuario.senha != $scope.usuario.senhaantiga){
				alert("Você deve digitar a sua senha antiga.");
				return;	
			}
			if($scope.usuario.novasenha == $scope.usuario.senhaantiga){
				alert("Você deve digitar uma nova senha diferente da antiga.");
				return;
			}
			$('#formNovaSenha').submit();
		};
		
		$scope.resetUsuario = function(){
			$('#formResetUsuario').submit();
		};
	    
	    $scope.iniciar = function(){
	            
	    };
	    
	    $scope.iniciar();
	    
	}]);
})(window.angular);