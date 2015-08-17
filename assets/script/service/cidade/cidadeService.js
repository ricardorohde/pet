(function($angular) {
	/**
	 * Cidade Service
	 */ 
	$angular.module('app').service('cidadeService',['$http','utilService','loginService','messageCenterService', function ($http,$utilService,$loginService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listacidade = [];
	    service.cidade = {};
	    service.listacidadepetshop = [];
	    service.cidadepetshop = {};
	    
	    service.salvarCidadepetshop = function(cidadepetshop, callback) {
    		if(service.validarCidadepetshop(cidadepetshop)){
	            $http.post($utilService.urlAction()+'petshop/salvarCidadepetshop',cidadepetshop).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Sua cidade foi salva com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Sua cidade não pode ser salva!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 });
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarCidadepetshop = function(cidadepetshop, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarCidadepetshop',cidadepetshop).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Sua cidade foi excluída com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Sua cidade não pode ser excluída! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarCidadepetshop = function(cidadepetshop, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarCidadepetshop',cidadepetshop).success(callback).error(error.erro);
		};
		
		service.findAllCidadepetshop = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllCidadepetshop').success(
			function (dados){
			    service.listacidadepetshop = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.findAllCidadeByEstado = function(cidade, callback) {
			$http.post($utilService.urlAction()+'petshop/findAllCidadeByEstado',cidade).success(
			function (dados){
			    service.listacidade = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.newCidadepetshop = function (callback){
			service.cidadepetshop = {};
		    service.cidadepetshop.id = undefined;
		    service.cidadepetshop.cidade = undefined;
    		service.cidadepetshop.petshop = $loginService.user.petatual;
    		return service.cidadepetshop;
		};
		
		service.validarCidadepetshop = function (cidadepetshop){
		    if($utilService.isNullOrBlanck(cidadepetshop.cidade)){
		        $messageCenterService.add('warning','Escolha a sua cidade!',{timeout:3000});
		        return false;
		    }
		    return true;
		};
		
		error.erro = function(data, status, headers, config) {
		    $messageCenterService.add('danger','Sua operação não pode ser concluída.',{timeout:3000});
		};
		
		return service;
	    
	}]);
})(window.angular);