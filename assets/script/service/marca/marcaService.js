(function($angular) {
	/**
	 * Marca Service
	 */ 
	$angular.module('app').service('marcaService',['$http','utilService','loginService','messageCenterService', function ($http,$utilService,$loginService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listamarca = [];
	    service.marca = {};
	    
	    service.salvarMarca = function(marca, callback) {
    		if(service.validarMarca(marca)){
	            $http.post($utilService.urlAction()+'petshop/salvarMarca',marca).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Sua marca foi salva com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Sua marca não pode ser salva!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarMarca = function(marca, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarMarca',marca).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Sua marca foi excluída com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Sua marca não pode ser excluída! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarMarca = function(marca, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarMarca',marca).success(callback).error(error.erro);
		};
		
		service.findAllMarca = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllMarca').success(
			function (dados){
			    service.listamarca = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.newMarca = function (){
			service.marca = {};
		    service.marca.id = undefined;
		    service.marca.nome = '';
		    service.marca.status = '';
		    service.marca.descricao = '';
    		return service.marca;
		};
		
		service.editMarca = function (index){
		    service.marca = service.listamarca[index];
		};
		
		service.validarMarca = function (marca){
			if($utilService.isNullOrBlanck(marca.nome)){
		        $messageCenterService.add('warning','Digite o nome do sua marca!',{timeout:3000});
		        return false;
		    }
		    if($utilService.isNullOrBlanck(marca.status)){
		        $messageCenterService.add('warning','Escolha o status da marca!',{timeout:3000});
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