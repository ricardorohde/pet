(function($angular) {
	/**
	 * Util Service
	 */ 
	$angular.module('app').service('utilService',['$http','$rootScope', function ($http,$rootScope) {
	    
	    var service = {};
	    
	    service.cds = undefined;
	    
	    service.isNullOrBlanck = function(valor,mensagem){
			if($angular.isUndefined(valor) || valor == ""){
				if(!$angular.isUndefined(mensagem) && mensagem != ""){
					alert(mensagem);
				}
				return true;
			}
			return false;
		};
		
		service.salvarGeral = function(dados,callback){
			$http.post(service.urlAction()+'salvarGeral',dados).success(
			function(data, status, headers, config) {
				service.cds = dados.carregarDados==='true';
				callback(data);
			});
		};
		
		service.getTipoUsuario = function (){
			return user;
		};
		
		service.getCarregarDadosSite = function (callback){
			$http.post(service.urlAction()+'getGeral').success(
			function(data, status, headers, config) {
				var dados = $angular.fromJson(data);
				service.cds = dados.cds==='true';
				callback();
				return service.cds;
			});
		};
		
	    service.linkar = function (link){
			window.location.href = link;
		};
		
		service.urlAction = function (){
		    return '/index.php/';
		};
		
		service.urlAssets = function (){
		    return '/assets';
		};
		
		service.getImageDefault = function (){
			return service.urlAssets()+"/images/simbolo/thumbnail-default.jpg";
		};
		
		/*service.getCarregarDadosSite(function (){});*/
		
		return service;
	    
	}]);
})(window.angular);