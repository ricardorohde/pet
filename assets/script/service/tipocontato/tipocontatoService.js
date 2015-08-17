(function($angular) {
	/**
	 * TipoContato Service
	 */ 
	$angular.module('app').service('tipocontatoService',['$http','utilService','loginService','messageCenterService', function ($http,$utilService,$loginService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listatipocontato = [];
	    service.tipocontato = {};
	    
	    service.salvarTipocontato = function(tipocontato, callback) {
    		if(service.validarTipocontato(tipocontato)){
	            $http.post($utilService.urlAction()+'petshop/salvarTipocontato',tipocontato).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Seu tipo contato foi salvo com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Seu tipo contato não pode ser salvo!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarTipocontato = function(tipocontato, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarTipocontato',tipocontato).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Seu tipo de contato foi excluído com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Seu tipo de contato não pode ser excluído! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarTipocontato = function(tipocontato, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarTipocontato',tipocontato).success(callback).error(error.erro);
		};
		
		service.findAllTipocontato = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllTipocontato').success(
			function (dados){
			    service.listatipocontato = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.newTipocontato = function (){
			service.tipocontato = {};
		    service.tipocontato.id = undefined;
		    service.tipocontato.nome = '';
    		return service.tipocontato;
		};
		
		service.editTipocontato = function (index){
		    service.tipocontato = service.listatipocontato[index];
		};
		
		service.validarTipocontato = function (tipocontato){
			if($utilService.isNullOrBlanck(tipocontato.nome)){
		        $messageCenterService.add('warning','Digite o nome do seu tipo de contato!',{timeout:3000});
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