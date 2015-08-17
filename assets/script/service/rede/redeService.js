(function($angular) {
	/**
	 * Rede Service
	 */ 
	$angular.module('app').service('redeService',['$http','utilService','messageCenterService', function ($http,$utilService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.rede = {};
	    
	    service.salvarRede = function(rede, callback) {
	    	if(service.validarRede(rede)){
	            $http.post($utilService.urlAction()+'petshop/salvarRede',rede).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Sua rede foi configurada com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Sua rede não pode ser configurada!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarRede = function(rede, callback) {
			$http.post($utilService.urlAction()+'petshop/deletarRede',rede).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Sua rede foi excluída com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Sua rede não pode ser excluída! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarRede = function(rede, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarRede',rede).success(
			function(dados){
				service.rede = $angular.fromJson(dados);
				callback(dados);
			}).error(error.erro);
		};
		
		service.validarRede = function (rede){
			if($utilService.isNullOrBlanck(rede.nome)){
		        $messageCenterService.add('warning','Digite o nome da sua Rede!',{timeout:3000});
		        return false;
		    }
		    return true;
		};
		
		error.erro = function(data, status, headers, config) {
		    $messageCenterService.add('danger','Sua operação não pode ser concluída. Verifique sua conexão com a internet.',{timeout:3000})
		};
		
		return service;
	    
	}]);
})(window.angular);