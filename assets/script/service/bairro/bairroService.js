(function($angular) {
	/**
	 * Bairro Service
	 */ 
	$angular.module('app').service('bairroService',['$http','utilService','loginService','messageCenterService', function ($http,$utilService,$loginService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listabairropetshop = [];
	    service.bairro = {};
	    
	    service.salvarBairropetshop = function(bairro, callback) {
    		if(service.validarBairropetshop(bairro)){
	            $http.post($utilService.urlAction()+'petshop/salvarBairropetshop',bairro).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Seu bairro foi salvo com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Seu bairro não pode ser salvo!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarBairropetshop = function(bairro, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarBairropetshop',bairro).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Seu bairro foi excluído com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Seu bairro não pode ser excluído! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarBairropetshop = function(bairro, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarBairropetshop',bairro).success(callback).error(error.erro);
		};
		
		service.findAllBairropetshop = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllBairropetshop').success(
			function (dados){
			    service.listabairropetshop = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.newBairropetshop = function (callback){
			service.bairro = {};
		    service.bairro.id = undefined;
		    service.bairro.nome = '';
		    service.bairro.cidadepetshop = undefined;
    		return service.bairro;
		};
		
		service.editBairropetshop = function (index){
		    service.bairro = service.listabairropetshop[index];
		};
		
		service.validarBairropetshop = function (bairro){
			if($utilService.isNullOrBlanck(bairro.nome)){
		        $messageCenterService.add('warning','Digite o nome do seu bairro!',{timeout:3000});
		        return false;
		    }
		    if($utilService.isNullOrBlanck(bairro.cidadepetshop)){
		        $messageCenterService.add('warning','Escolha a sua cidade!',{timeout:3000});
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