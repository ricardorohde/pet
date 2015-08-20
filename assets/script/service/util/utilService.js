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
		    return '/pet/index.php/';
		};
		
		service.urlAssets = function (){
		    return '/pet/assets';
		};
		
		service.getImageDefault = function (){
			return service.urlAssets()+"/images/simbolo/thumbnail-default.jpg";
		};
		
		service.tpContato = {
			SMS : 1,
			EMAIL : 2,
			TELEFONE : 3,
			CELULAR : 4,
			FACEBOOK : 5,
			TWITER : 6,
			WHATSAPP : 7,
			SITE : 8,
			CELULAR1 : 9,
			CELULAR2 : 10,
			TELEFONE1 : 11,
			TELEFONE2 : 12,
			CELULAR3 : 13,
			TELEFONE3 : 14
		};
		
		return service;
	    
	}]);
})(window.angular);