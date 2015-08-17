(function($angular) {
	/**
	 * Petshop Service
	 */ 
	$angular.module('app').service('petshopService',['$http','utilService','messageCenterService', function ($http,$utilService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.petshop = {};
	    service.listapetshop = {};
	    
	    service.salvarPetshop = function(petshop, callback) {
	    	if(service.validarPetshop(petshop)){
	            $http.post($utilService.urlAction()+'petshop/salvarPetshop',petshop).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Seu PetShop foi salvo com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Seu PetShop não pode ser salvo!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }
		};
		
		service.deletarPetshop = function(petshop, callback) {
			$http.post($utilService.urlAction()+'deletarPetshop',petshop).success(
			function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Seu PetShop foi excluído com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Seu PetShop não pode ser excluído! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarPetshop = function(dados, callback) {
			$http.post($utilService.urlAction()+'buscarPetshop',dados).success(
			function(dados){
				service.petshop = $angular.fromJson(dados);
				callback(dados);
			}).error(error.erro);
		};
		
		service.findAllPetshop = function(callback) {
			$http.post($utilService.urlAction()+'findAllPetshop').success(
			function(dados){
				service.listapetshop = $angular.fromJson(dados);
				callback(dados);
			}).error(error.erro);
		};
		
		service.aceitarConvite = function(petshoprede, callback) {
			$http.post($utilService.urlAction()+'aceitarConvite',petshoprede).success(
			function(dados){
				callback(dados);
			}).error(error.erro);
		};
		
		service.rejeitarConvite = function(petshoprede, callback) {
			$http.post($utilService.urlAction()+'rejeitarConvite',petshoprede).success(
			function(dados){
				callback(dados);
			}).error(error.erro);
		};
		
		service.getPetshopredeAceito = function(callback) {
			$http.post($utilService.urlAction()+'getPetshopredeAceito').success(
			function(dados){
				callback(dados);
			}).error(error.erro);
		};
		
		service.getPetshopredeConvidado = function(callback) {
			$http.post($utilService.urlAction()+'getPetshopredeConvidado').success(
			function(dados){
				callback(dados);
			}).error(error.erro);
		};
		
		service.findAllPetshopByNotRede = function(rede,callback){
			$http.post($utilService.urlAction()+'findAllPetshopByNotRede',rede).success(
			function(dados){
				callback(dados);
			}).error(error.erro);
		};
		
		service.findAllPetshopByUsuario = function(usuario,callback){
			$http.post($utilService.urlAction()+'findAllPetshopByUsuario',usuario).success(
			function(dados){
				callback(dados);
			}).error(error.erro);
		};
		
		service.enviarConvitePetshop = function(petshoprede,callback){
			$http.post($utilService.urlAction()+'enviarConvitePetshop',petshoprede).success(
			function(retorno){
				var resposta = $angular.fromJson(retorno);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Seu pedido foi enviado com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Seu pedido não pode ser enviado!',{timeout:3000 });
                    if($angular.isDefined(resposta['mensagem'])){
                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
                    }
                }
				callback(retorno);
			}).error(error.erro);
		};
		
		service.validarPetshop = function (petshop){
			if($utilService.isNullOrBlanck(petshop.nome)){
		        $messageCenterService.add('warning','Digite o nome do seu PetShop!',{timeout:3000});
		        return false;
		    }
		    if($utilService.isNullOrBlanck(petshop.endereco.bairro)){
		        $messageCenterService.add('warning','Escolha o bairro do PetShop!',{timeout:3000});
		        return false;
		    }
		    if($utilService.isNullOrBlanck(petshop.endereco.endereco)){
		        $messageCenterService.add('warning','Falta digitar a rua do PetShop!',{timeout:3000});
		        return false;
		    }
		    if($utilService.isNullOrBlanck(petshop.endereco.numero)){
		        $messageCenterService.add('warning','Falta digitar o numero do PetShop!',{timeout:3000});
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