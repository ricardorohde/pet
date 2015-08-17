(function($angular) {
	/**
	 * Login Service
	 */ 
	$angular.module('app').service('loginService',['$http','utilService', function ($http,$utilService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.login = {};
	    service.user = {};
	    
	    service.isLogado = function(callback) {
			$http.post($utilService.urlAction()+'isLogado').success(callback).error(error.erro);
		};
		
		service.getUser = function(callback) {
			$http.post($utilService.urlAction()+'getUser').success(function(dados){
				service.user = $angular.fromJson(dados);
				callback(dados);
			}).error(error.erro);
		};
		
		service.logar = function(dados, callback,erro) {
			$http.post($utilService.urlAction()+'logar',dados).success(callback).error(erro);
		};
		
		service.deslogar = function(callback) {
			$http.post($utilService.urlAction()+'deslogar').success(callback).error(error.erro);
		};
		
		service.trocarPetshopAtual = function (usuario,callback){
			$http.post($utilService.urlAction()+'trocarPetshopAtual',usuario).success(
			function(retorno){
				callback(retorno);
			}).error(error.erro);
		};
		
		error.erro = function(data, status, headers, config) {
		    console.log(data);
			alert("Erro ao carregar os dados requisitados.");
		};
		
		return service;
	    
	}]);
})(window.angular);