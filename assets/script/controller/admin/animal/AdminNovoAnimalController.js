(function($angular) {
	/**
	 * Controller AdminNovoAnimal
	 */
	$angular.module('app').controller('AdminNovoAnimalController', ['$scope','$element','$interval', 'paginaService','animalService','racaService','utilService', function($scope,$element,$interval,$paginaService,$animalService,$racaService,$utilService) {
		
		$scope.tabShowAnimal = function(tab){
			$('#tabAnimal a[href="#'+tab+'"]').tab('show');
		};
		
		$scope.colocarImagemCarregando = function (){
			$scope.animal.isNotSave = true;
		    if($angular.isUndefined($scope.animal.imagens)){
		        $scope.animal.imagens = [];
		    }
		    var newImage = $scope.newImage();
			$scope.animal.imagens.splice(0,0,newImage);
			return newImage;
		};
		
		$scope.depoisCarregarImagens = function (){
			$scope.animal.isNotSave = false;
		};
		
		$scope.newImage = function (){
		    return {'url':'','show':true,'status':'I','id':''}; 
		};
		
		$scope.salvarAnimal = function (){
			$animalService.salvarAnimal(
		    function(data, status, headers, config) {
				$scope.trocarPagina("animais");
			});
		};
		
		$scope.adicionarPremiacao = function (){
			if($utilService.isNullOrBlanck($scope.novapremiacao)){
				alert("Você deve escrever a premição.");
				return;
			}
			$scope.animal.premiacoes.push({'descricao':$scope.novapremiacao,'id':'','status':'I'});
			$scope.novapremiacao = undefined;
		};
		
		$scope.deletePremiacao = function (index){
			var premiacao = $scope.animal.premiacoes[index];
			if($utilService.isNullOrBlanck(premiacao.id)){
				$scope.animal.premiacoes.splice(index, 1);
			}else{
				$animalService.premiacaoExcluido({'id':premiacao.id},function(){
					$scope.animal.premiacoes.splice(index, 1);
				});
			}
		};
		
		$scope.excluirImage = function (index){
			if(confirm('Tem certeza que deseja excluir essa imagem?')){
				$scope.animal.imagens[index].status = 'D';
				$scope.animal.imagens[index].excluida = true;
			}
		};
		
		$scope.getRacas = function (){
			$scope.listaraca = $racaService.listaraca;
		};
		
		$scope.getPaginas = function (){
			$scope.listapagina = $paginaService.listapagina;
		};
		
		$scope.getAnimais = function (){
			$scope.listatodosanimal = $animalService.listatodosanimal;
		};
		
	    $scope.iniciar = function(){
	    	$scope.getAnimais();
	    	$scope.getRacas();
	    	$scope.getPaginas();
	    	
	    	$scope.animal = $animalService.animal;  
	        $scope.tabShowAnimal('animal');
	    };
	    
	    $scope.iniciar();
	    
	}]);    

})(window.angular);