(function($angular) {
	/**
	 * Controller AdminNovaExposicao
	 */
	$angular.module('app').controller('AdminNovaExposicaoController', ['$scope', 'exposicaoService', function($scope,$exposicaoService) {
	    
		$scope.tabShowExposicao = function(tab){
			$('#tabExposicao a[href="#'+tab+'"]').tab('show');
		};
		
		$scope.colocarImagemCarregando = function (){
			$scope.exposicao.isNotSave = true;
		    if($angular.isUndefined($scope.exposicao.imagens)){
		        $scope.exposicao.imagens = [];
		    }
		    var newImage = $scope.newImage();
			$scope.exposicao.imagens.splice(0,0,newImage);
			return newImage;
		};
		
		$scope.depoisCarregarImagens = function (){
			$scope.exposicao.isNotSave = false;
		};
		
		$scope.newImage = function (){
		    return {'url':'','show':true,'status':'I','id':''}; 
		};
		
		$scope.excluirImage = function (index){
			if(confirm('Tem certeza que deseja excluir essa imagem?')){
				$scope.exposicao.imagens[index].status = 'D';
				$scope.exposicao.imagens[index].excluida = true;
			}
		};
		
		$scope.salvarExposicao = function (){
			$exposicaoService.salvarExposicao(
			function(data, status, headers, config) {
				$scope.trocarPagina("exposicoes");
			});
		};
	    
	    $scope.iniciar = function(){
	        $scope.exposicao = $exposicaoService.exposicao;
	        $scope.tabShowExposicao('exposicao');
	    };
	    
	    $scope.iniciar();
	    
	}]);    
})(window.angular);