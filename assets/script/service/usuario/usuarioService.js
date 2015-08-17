(function($angular) {
	/**
	 * Usuário Service
	 */ 
	$angular.module('app').service('usuarioService',['$http', function ($http) {
	    
	    var service = {};
	    var error = {};
		
		error.erro = function(data, status, headers, config) {
		    console.log(data);
			alert("Erro ao carregar os dados requisitados.");
		};
		
		return service;
	    
	}]);
})(window.angular);