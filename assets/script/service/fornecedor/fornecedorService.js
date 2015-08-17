(function($angular) {
	/**
	 * Fornecedor Service
	 */ 
	$angular.module('app').service('fornecedorService',['$http','utilService','loginService','messageCenterService', function ($http,$utilService,$loginService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listafornecedor = [];
	    service.fornecedor = {};
	    service.contatofornecedor = {};
	    
	    service.salvarFornecedor = function(fornecedor, callback) {
    		if(service.validarFornecedor(fornecedor)){
	            $http.post($utilService.urlAction()+'petshop/salvarFornecedor',fornecedor).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Seu fornecedor foi salvo com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Seu fornecedor não pode ser salvo!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.salvarContatofornecedor = function(contatofornecedor, callback) {
    		if(service.validarContatofornecedor(contatofornecedor)){
	            $http.post($utilService.urlAction()+'petshop/salvarContatofornecedor',contatofornecedor).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Seu contato foi salvo com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Seu contato não pode ser salvo!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarFornecedor = function(fornecedor, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarFornecedor',fornecedor).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Seu fornecedor foi excluído com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Seu fornecedor não pode ser excluído! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarFornecedor = function(fornecedor, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarFornecedor',fornecedor).success(callback).error(error.erro);
		};
		
		service.findAllFornecedor = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllFornecedor').success(
			function (dados){
			    service.listafornecedor = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.newFornecedor = function (){
			service.fornecedor = {};
		    service.fornecedor.id = undefined;
		    service.fornecedor.nome = '';
		    service.fornecedor.cnpj = '';
		    service.fornecedor.cpf = '';
		    service.fornecedor.site = '';
		    service.fornecedor.logo = {'url':'','status':'I','id':''};
		    service.fornecedor.status = '';
		    service.fornecedor.descricao = '';
    		return service.fornecedor;
		};
		
		service.newContatofornecedor = function (){
			service.contatofornecedor = {};
		    service.contatofornecedor.id = undefined;
		    service.contatofornecedor.valor = '';
		    service.contatofornecedor.fornecedor = undefined;
		    service.contatofornecedor.tipocontato = undefined;
		    service.contatofornecedor.petshop = undefined;
    		return service.contatofornecedor;
		};
		
		service.editFornecedor = function (index){
		    service.fornecedor = service.listafornecedor[index];
		};
		
		service.validarFornecedor = function (fornecedor){
			if($utilService.isNullOrBlanck(fornecedor.nome)){
		        $messageCenterService.add('warning','Digite o nome do seu fornecedor!',{timeout:3000});
		        return false;
		    }
		    if($utilService.isNullOrBlanck(fornecedor.status)){
		        $messageCenterService.add('warning','Digite o status do seu fornecedor!',{timeout:3000});
		        return false;
		    }
		    return true;
		};
		
		service.validarContatofornecedor = function (contatofornecedor){
			if($utilService.isNullOrBlanck(contatofornecedor.valor)){
		        $messageCenterService.add('warning','Digite o valor do seu contato!',{timeout:3000});
		        return false;
		    }
		    if($utilService.isNullOrBlanck(contatofornecedor.tipocontato)){
		        $messageCenterService.add('warning','Escolha o tipo de contato do seu fornecedor!',{timeout:3000});
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