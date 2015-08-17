(function($angular) {
	/**
	 * Estado Service
	 */ 
	$angular.module('app').service('estadoService',['$http','utilService','messageCenterService', function ($http,$utilService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listaestado = [];
		
		service.buscarEstado = function(dados, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarEstado',dados).success(callback).error(error.erro);
		};
		
		service.findAllEstado = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllEstado').success(
			function (dados){
			    service.listaestado = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		error.erro = function(data, status, headers, config) {
		    $messageCenterService.add('danger','Sua operação não pode ser concluída. Verifique sua conexão com a internet.',{timeout:3000})
		};
		
		return service;
	    
	}]);
})(window.angular);