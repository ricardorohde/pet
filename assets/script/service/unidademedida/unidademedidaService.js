(function($angular) {
	/**
	 * UnidadeMedida Service
	 */ 
	$angular.module('app').service('unidademedidaService',['$http','utilService','loginService','messageCenterService', function ($http,$utilService,$loginService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listaunidademedida = [];
	    service.unidademedida = {};
	    
	    service.salvarUnidademedida = function(unidademedida, callback) {
    		if(service.validarUnidademedida(unidademedida)){
	            $http.post($utilService.urlAction()+'petshop/salvarUnidademedida',unidademedida).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Sua unidade foi salva com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Sua unidade não pode ser salva!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarUnidademedida = function(unidademedida, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarUnidademedida',unidademedida).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Sua unidade foi excluída com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Sua unidade não pode ser excluída! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarUnidademedida = function(unidademedida, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarUnidademedida',unidademedida).success(callback).error(error.erro);
		};
		
		service.findAllUnidademedida = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllUnidademedida').success(
			function (dados){
			    service.listaunidademedida = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.newUnidademedida = function (callback){
			service.unidademedida = {};
		    service.unidademedida.id = undefined;
		    service.unidademedida.nome = '';
		    service.unidademedida.sigla = '';
    		return service.unidademedida;
		};
		
		service.editUnidademedida = function (index){
		    service.unidademedida = service.listaunidademedida[index];
		};
		
		service.validarUnidademedida = function (unidademedida){
			if($utilService.isNullOrBlanck(unidademedida.nome)){
		        $messageCenterService.add('warning','Digite o nome da sua unidade!',{timeout:3000});
		        return false;
		    }
		    if($utilService.isNullOrBlanck(unidademedida.sigla)){
		        $messageCenterService.add('warning','Digite a sigla da sua unidade de medida!',{timeout:3000});
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