(function($angular) {
	/**
	 * Animal Service
	 */ 
	$angular.module('app').service('animalService',['$http','utilService','racaService','paginaService', function ($http,$utilService,$racaService,$paginaService) {
	    
	    var service = {};
	    var error = {};
	    
	    service.listaanimal = [];
	    service.listatodosanimal = [];
	    service.animal = {};
	    
	    service.findAnimal = function(dados, callback) {
	    	$utilService.getCarregarDadosSite(function (){
	    		if(!$utilService.cds)
	    		return;
	    		$http.post($utilService.urlAction()+'findAnimal',dados).success(callback).error(error.erro);
	    	});
		};
		
		service.animalFindAll = function(callback) {
			$utilService.getCarregarDadosSite(function (){
				if(!$utilService.cds)
				return;
				$http.post($utilService.urlAction()+'animalFindAll').success(
				function (data){
					service.listatodosanimal = $angular.fromJson(data);
					callback(data);
				}).error(error.erro);	
			});
		};
		service.animalFindAll(function (){});
		
		service.animalCarregar = function(dados, callback) {
			$utilService.getCarregarDadosSite(function (){
				if(!$utilService.cds)
				return;
				$http.post($utilService.urlAction()+'animalCarregar',dados).success(
				function(data, status, headers, config) {
					service.listaanimal = $angular.fromJson(data);
					callback();
				}).error(error.erro);
			});
		};
		
		service.salvarAnimal = function (callback){
			if(!service.validarAnimal()){
				return;
			}
			if(!$utilService.isNullOrBlanck(service.animal.id)){
				if(!confirm("Você tem certeza que deseja editar esse registro?")){
					return;			
				}
			}
			$http.post($utilService.urlAction()+'salvarNovoAnimal',service.animal).success(
			function (data){
				service.animalFindAll(function (){});
				callback(data);
			}).error(error.erro);
		};
		
		service.animalExcluido = function (callback){
			if(confirm("Você tem certeza que deseja excluir esse animal?")){
				$http.post($utilService.urlAction()+'animalExcluido',service.animal).success(
				function (data){
					service.animalFindAll(function (){});
					callback(data);
				}).error(error.erro);
			}
		};
		
		service.premiacaoExcluido = function (dados,callback){
			if(confirm("Você tem certeza que deseja excluir essa premiação?")){
				$http.post($utilService.urlAction()+'premiacaoExcluido',dados).success(callback).error(error.erro);
			}
		};
		
		service.qtdAnimais = function (callback){
			$http.post($utilService.urlAction()+'qtdAnimais').success(callback).error(error.erro);
		};
		
		service.animalPaginacao = function (dados,callback){
			$http.post($utilService.urlAction()+'animalPaginacao',dados).success(callback).error(error.erro);
		};
		
		service.newAnimal = function (){
			service.animal = {
				'id' : undefined,
				'nome' : undefined,
				'registro' : undefined,
				'nascimento' : undefined,
				'sexo' : 'M',
				'pelagem' : undefined,
				'dna' : undefined,
				'video' : undefined,
				'descricao' : undefined,
				'pai' : undefined,
				'mae' : undefined,
				'raca' : undefined,
				'imagens':[],
				'premiacoes':[]
			};
		};
		
		service.loadAnimal = function (index){
			service.animal = service.listaanimal[index];
		};
		
		service.validarAnimal = function (){
			if($utilService.isNullOrBlanck(service.animal.sexo,'Deve selecionar o sexo do animal.'))
				return false;
			if($utilService.isNullOrBlanck(service.animal.raca,'Deve selecionar a raça do animal.'))
				return false;
			if($utilService.isNullOrBlanck(service.animal.nome,'Deve selecionar o nome do animal.'))
				return false;
			if(!$utilService.isNullOrBlanck(service.animal.pagina) && service.animal.imagens.length == 0){
				alert('Deve ser adicionado ao menos uma foto do animal.');
				return false;
			}
			
			var data = service.animal.nascimento;
			if(!angular.isUndefined(data) && data != ''){
				service.animal.nascimento = data[4]+data[5]+data[6]+data[7]+'-'+data[2]+data[3]+'-'+data[0]+data[1]+' 00:00:00';
			}else{
				service.animal.nascimento = '';
			}
			return true;
		};
		
		service.enviarEmail = function (email,callback){
			if(!service.validarEmail(email)){
				return;
			}
			$http.post($utilService.urlAction()+'enviarEmail',email).success(callback).error(error.erro);
		};
		
		service.validarEmail = function (email){
			if($utilService.isNullOrBlanck(email.nome,'Deve escrever seu nome.'))
				return false;
			if($utilService.isNullOrBlanck(email.telefone,'Deve digitar seu telefone.'))
				return false;
			if($utilService.isNullOrBlanck(email.mensagem,'Deve escrever sua mensagem.'))
				return false;
			
			return true;
		};
		
		error.erro = function(data, status, headers, config) {
		    console.log(data);
			alert("Erro ao carregar os dados requisitados.");
		};
		
		return service;
	    
	}]);
})(window.angular);