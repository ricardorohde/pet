(function($angular) {
	$angular.module('app').service('exposicaoService',['$http','utilService', function ($http,$utilService) {
	    
	    var service = {};
	    var erroService = {};
	    
	    service.listaexposicao = [];
	    service.exposicao = {};
	    
	    service.findExposicao = function(dados, callback) {
			$http.post($utilService.urlAction()+'findExposicao', dados).success(
			function(data, status, headers, config) {
				service.exposicao = $angular.fromJson(data);
				callback();
			}).error(erroService.erro);
		};
	    
	    service.exposicaoCarregar = function(dados, callback) {
			$http.post($utilService.urlAction()+'exposicaoCarregar', dados).success(
			function(data, status, headers, config) {
				service.listaexposicao = $angular.fromJson(data);
				callback();
			}).error(erroService.erro);
		};
		
		service.salvarExposicao = function (callback){
			if(!service.validarExposicao()){
				return;
			}
			if(!$utilService.isNullOrBlanck(service.exposicao.id)){
				if(!confirm("Você tem certeza que deseja editar esse registro?")){
					return;			
				}
			}
			$http.post($utilService.urlAction()+'salvarNovaExposicao',service.exposicao).success(callback).error(erroService.erro);
		};
		
		service.exposicaoExcluido = function (callback){
			if(confirm("Você tem certeza que deseja excluir essa exposição?")){
				$http.post($utilService.urlAction()+'exposicaoExcluido',service.exposicao).success(callback).error(erroService.erro);
			}
		};
		
		service.qtdExposicoes = function (callback){
			$http.post($utilService.urlAction()+'qtdExposicoes').success(callback).error(erroService.erro);
		};
		
		service.exposicaoPaginacao = function (dados,callback){
			$http.post($utilService.urlAction()+'exposicaoPaginacao',dados).success(callback).error(erroService.erro);
		};
		
		service.newExposicao = function (){
			service.exposicao = {
				'status' : "I",
				'id' : undefined,
				'nome' : undefined,
				'data' : undefined,
				'local' : undefined,
				'cidade' : undefined,
				'estado' : undefined,
				'pais' : undefined,
				'imagens':[]
			};
		};
		
		service.loadExposicao = function (index){
			service.exposicao = service.listaexposicao[index];
			service.exposicao.status = "U";
		};
		
		service.validarExposicao = function (){
			if($utilService.isNullOrBlanck(service.exposicao.nome,'Digitar o nome da exposição.'))
				return false;
			if($utilService.isNullOrBlanck(service.exposicao.data,'Deve digitar a data da exposição.'))
				return false;
			if(service.exposicao.imagens.length == 0){
				alert('É necessário adicionar imagens em sua exposição.');
				return false;
			}
			var data = service.exposicao.data;
			service.exposicao.data = data[4]+data[5]+data[6]+data[7]+'-'+data[2]+data[3]+'-'+data[0]+data[1]+' 00:00:00';
			return true;
		};
		
		erroService.erro = function(data, status, headers, config) {
		    console.log(data);
			alert("Erro ao carregar os dados requisitados.");
		};
		
		return service;
	    
	}]);
})(window.angular);