(function($angular) {
	/**
	 * TipoAnimal Service
	 */ 
	$angular.module('app').service('tipoanimalService',['$http','utilService','loginService','messageCenterService', function ($http,$utilService,$loginService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listatipoanimal = [];
	    service.tipoanimal = {};
	    service.listatipoanimalpetshop = [];
	    service.tipoanimalpetshop = {};
	    
	    service.salvarTipoanimalpetshop = function(tipoanimalpetshop, callback) {
    		if(service.validarTipoanimalpetshop(tipoanimalpetshop)){
	            $http.post($utilService.urlAction()+'petshop/salvarTipoanimalpetshop',tipoanimalpetshop).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Seu tipo de animal foi salvo com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Seu tipo de animal não pode ser salvo!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 });
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.salvarTipoanimal = function(tipoanimal, callback) {
    		if(service.validarTipoanimal(tipoanimal)){
	            $http.post($utilService.urlAction()+'petshop/salvarTipoanimal',tipoanimal).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Seu tipo de animal foi salvo com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Seu tipo de animal não pode ser salvo!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 });
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarTipoanimalpetshop = function(tipoanimalpetshop, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarTipoanimalpetshop',tipoanimalpetshop).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Seu tipo de animal foi excluído com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Seu tipo de animal não pode ser excluído! Ele está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.deletarTipoanimal = function(tipoanimal, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarTipoanimal',tipoanimal).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Seu tipo de animal foi excluído com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Seu tipo de animal não pode ser excluído! Ele está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarTipoanimalpetshop = function(tipoanimalpetshop, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarTipoanimalpetshop',tipoanimalpetshop).success(callback).error(error.erro);
		};
		
		service.buscarTipoanimal = function(tipoanimal, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarTipoanimal',tipoanimal).success(callback).error(error.erro);
		};
		
		service.findAllTipoanimalpetshop = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllTipoanimalpetshop').success(
			function (dados){
			    service.listatipoanimalpetshop = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.findAllTipoanimal = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllTipoanimal').success(
			function (dados){
			    service.listatipoanimal = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.newTipoanimalpetshop = function (){
			service.tipoanimalpetshop = {};
		    service.tipoanimalpetshop.id = undefined;
		    service.tipoanimalpetshop.tipoanimal = undefined;
    		return service.tipoanimalpetshop;
		};
		
		service.newTipoanimal = function (){
			service.tipoanimal = {};
		    service.tipoanimal.id = undefined;
		    service.tipoanimal.nome = '';
    		return service.tipoanimal;
		};
		
		service.validarTipoanimalpetshop = function (tipoanimalpetshop){
		    if($utilService.isNullOrBlanck(tipoanimalpetshop.tipoanimal)){
		        $messageCenterService.add('warning','Escolha o tipo de animal!',{timeout:3000});
		        return false;
		    }
		    return true;
		};
		
		service.validarTipoanimal = function (tipoanimal){
		    if($utilService.isNullOrBlanck(tipoanimal.nome)){
		        $messageCenterService.add('warning','Escreva o nome do tipo de animal!',{timeout:3000});
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