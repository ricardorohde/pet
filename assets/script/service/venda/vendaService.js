(function($angular) {
	/**
	 * Venda Service
	 */ 
	$angular.module('app').service('vendaService',['$http','utilService', function ($http,$utilService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listavenda = [];
	    service.listatipovenda = [];
	    service.venda = {};
	    service.tipovenda = {};
	    
	    service.vendaCarregar = function(dados, callback) {
			$http.post($utilService.urlAction()+'vendaCarregar',dados).success(
			function(data, status, headers, config) {
				service.listavenda = $angular.fromJson(data);
				callback();
			}).error(error.erro);
		};
		
		service.carregarVendas = function(dados, callback) {
			$http.post($utilService.urlAction()+'carregarVendas',dados).success(
			function(data, status, headers, config) {
				service.listavenda = $angular.fromJson(data);
				callback();
			}).error(error.erro);
		};
		
		service.salvarVenda = function (callback){
			if(!service.validarVenda()){
				return;
			}
			if(!$utilService.isNullOrBlanck(service.venda.id)){
				if(!confirm("Você tem certeza que deseja editar esse registro?")){
					return;			
				}
			}
			$http.post($utilService.urlAction()+'salvarNovaVenda',service.venda).success(callback).error(error.erro);
		};
		
		service.vendaExcluido = function (callback){
			if(confirm("Você tem certeza que deseja excluir essa venda?")){
				$http.post($utilService.urlAction()+'vendaExcluido',service.venda).success(callback).error(error.erro);
			}
		};
		
		service.qtdVendas = function (callback){
			$http.post($utilService.urlAction()+'qtdVendas').success(callback).error(error.erro);
		};
		
		service.vendaPaginacao = function (dados,callback){
			$http.post($utilService.urlAction()+'vendaPaginacao',dados).success(callback).error(error.erro);
		};
		
		service.tipovendas = function(callback) {
			$http.post($utilService.urlAction()+'tipovendas').success(
			function(data){
				service.listatipovenda = $angular.fromJson(data);
				callback(data);
			}).error(error.erro);
		};
		
		service.salvarTipovenda = function(dados, callback) {
			if(!$utilService.isNullOrBlanck(dados.id)){
				if(!confirm("Você tem certeza que deseja editar esse registro?")){
					return;
				}
			}
			$http.post($utilService.urlAction()+'salvarTipovenda', dados).success(
			function(data){
				service.tipovendas(function (){});
				callback(data);
			}).error(error.erro);
		};
		
		service.deletarTipovenda = function(dados, callback) {
			if(confirm("Você tem certeza que deseja excluir esse registro?")){
				$http.post($utilService.urlAction()+'deletarTipovenda', dados).success(
				function (data){
					service.tipovendas(function (){});
					callback(data);
				}).error(error.erro);
			}
		};
		
		service.newVenda = function (){
			service.venda = {
				'id' : undefined,
				'tipovenda' : undefined,
				'animal' : undefined,
				'animal2' : undefined,
				'valor' : undefined,
				'imagens' : []
			};
		};
		
		service.loadVenda = function (index){
			service.venda = service.listavenda[index];
		};
		
		service.validarVenda = function (){
			if($utilService.isNullOrBlanck(service.venda.tipovenda,'Deve selecionar o tipo da venda.'))
				return false;
			if($utilService.isNullOrBlanck(service.venda.animal,'Deve selecionar o animal.'))
				return false;
			if($utilService.isNullOrBlanck(service.venda.valor,'Deve digitar o valor da venda.'))
				return false;
			if(service.venda.tipovenda == 5){
				if($utilService.isNullOrBlanck(service.venda.animal2,'Deve selecionar o segundo animal.'))
					return false;
			}else{
				service.venda.animal2 = '';
			}
			return true;
		};
		
		error.erro = function(data, status, headers, config) {
		    console.log(data);
			alert("Erro ao carregar os dados requisitados.");
		};
		
		return service;
	    
	}]);
})(window.angular);