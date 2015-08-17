(function($angular) {
	/**
	 * Página Service
	 */ 
	$angular.module('app').service('paginaService',['$http','utilService', function ($http,$utilService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listapagina = [];
	    service.pagina = {};
	    
	    service.paginas = function(callback) {
			$http.post($utilService.urlAction()+'paginas').success(
			function (data){
				service.listapagina = $angular.fromJson(data);
				callback(data);
			}).error(error.erro);
		};
		service.paginas(function (){});
		
		service.salvarPagina = function(dados, callback) {
			$http.post($utilService.urlAction()+'salvarPagina',dados).success(
			function (data){
				service.paginas(function (){});
				callback(data);
			}).error(error.erro);
		};
		
		service.deletarPagina = function(dados, callback) {
			$http.post($utilService.urlAction()+'deletarPagina',dados).success(
			function (data){
				service.paginas(function (){});
				callback();
			}).error(error.erro);
		};
		
		error.erro = function(data, status, headers, config) {
		    console.log(data);
			alert("Erro ao carregar os dados requisitados.");
		};
		
		return service;
	    
	}]);
})(window.angular);