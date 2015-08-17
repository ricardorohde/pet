(function($angular) {
	/**
	 * Parceiros Service
	 */ 
	$angular.module('app').service('parceirosService',['$http','utilService','loginService','messageCenterService', function ($http,$utilService,$loginService,$messageCenterService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listaparceiros = [];
	    service.parceiros = {};
	    
	    service.salvarParceiros = function(parceiros, callback) {
    		if(service.validarParceiros(parceiros)){
	            $http.post($utilService.urlAction()+'petshop/salvarParceiros',parceiros).success(
    			function (retorno){
    			    var resposta = $angular.fromJson(retorno);
    			    if(resposta.sucesso){
	                    $messageCenterService.add('success', 'Seu parceiro foi salvo com sucesso!', {timeout:3000 });
	                }else{
	                    $messageCenterService.add('warning','Seu parceiro não pode ser salvo!',{timeout:3000 });
	                    if($angular.isDefined(resposta['mensagem'])){
	                    	$messageCenterService.add('danger',resposta['mensagem'],{timeout:3000 })
	                    }
	                }
    			    callback(retorno);
    			}).error(error.erro);   
	        }	
		};
		
		service.deletarParceiros = function(parceiros, callback) {
    		$http.post($utilService.urlAction()+'petshop/deletarParceiros',parceiros).success(
            function (dados){
                var resposta = $angular.fromJson(dados);
			    if(resposta.sucesso){
                    $messageCenterService.add('success', 'Seu parceiro foi excluído com sucesso!', {timeout:3000 });
                }else{
                    $messageCenterService.add('warning','Seu parceiro não pode ser excluído! Ela está sendo usada em outros pontos do sistema.',{timeout:3000 })
                }
                callback(dados);
            }).error(error.erro);
		};
		
		service.buscarParceiro = function(parceiros, callback) {
			$http.post($utilService.urlAction()+'petshop/buscarParceiros',parceiros).success(callback).error(error.erro);
		};
		
		service.findAllParceiros = function(callback) {
			$http.post($utilService.urlAction()+'petshop/findAllParceiros').success(
			function (dados){
			    service.listaparceiros = $angular.fromJson(dados);
			    callback(dados);
			}).error(error.erro);
		};
		
		service.newParceiros = function (){
			service.parceiros = {};
		    service.parceiros.id = undefined;
		    service.parceiros.nome = '';
		    service.parceiros.site = '';
		    service.parceiros.logo = '';
		    service.parceiros.descricao = '';
    		return service.parceiros;
		};
		
		service.editParceiros = function (index){
		    service.parceiros = service.listaparceiros[index];
		};
		
		service.validarParceiros = function (parceiros){
			if($utilService.isNullOrBlanck(parceiros.nome)){
		        $messageCenterService.add('warning','Digite o nome do seu parceiro!',{timeout:3000});
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