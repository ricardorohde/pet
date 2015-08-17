(function($angular) {
	/**
	 * Raca Service
	 */ 
	$angular.module('app').service('racaService',['$http','utilService','loginService','messageCenterService', function ($http,$utilService,$loginService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listaraca = [];
	    service.raca = {};
	    
	    service.salvarRaca = function(raca, callback) {
    		if(service.validarRaca(raca)){
	            $http.post($utilService.urlAction()+'petshop/salvarRaca',raca).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Sua raça foi salva com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Sua raça não pode ser salva!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarRaca = function(raca, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarRaca',raca).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Sua raça foi excluída com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Sua raça não pode ser excluída! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarRaca = function(raca, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarRaca',raca).success(callback).error(error.erro);
		};
		
		service.findAllRaca = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllRaca').success(
			function (dados){
			    service.listaraca = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.newRaca = function (){
			service.raca = {};
		    service.raca.id = undefined;
		    service.raca.nome = '';
		    service.raca.origem = '';
		    service.raca.tipoanimalpetshop = undefined;
    		return service.raca;
		};
		
		service.editRaca = function (index){
		    service.raca = service.listaraca[index];
		};
		
		service.validarRaca = function (raca){
			if($utilService.isNullOrBlanck(raca.nome)){
		        $messageCenterService.add('warning','Digite o nome do sua raça!',{timeout:3000});
		        return false;
		    }
		    if($utilService.isNullOrBlanck(raca.tipoanimalpetshop)){
		        $messageCenterService.add('warning','Escolha o tipo de animal!',{timeout:3000});
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