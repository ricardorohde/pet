(function($angular) {
    /**
     * Configuração Controller
     **/ 
	$angular.module('app').controller('ConfiguracaoController',['$scope','utilService', function($scope,$utilService) {
		
		$scope.menuConfiguracao = [
		    {nome:'Rede de PetShop',link:$utilService.urlAction()+'petshop/rede'},
		    {nome:'Dados do PetShop',link:$utilService.urlAction()+'petshop/petshop'},
		    {nome:'Parceiros',link:$utilService.urlAction()+'petshop/parceiros'},
		    {nome:'Fornecedores',link:$utilService.urlAction()+'petshop/fornecedor'},
		    {nome:'Tipos de Animais',link:$utilService.urlAction()+'petshop/tipoanimalpetshop'},
		    {nome:'Tipos de Animais Admin',link:$utilService.urlAction()+'petshop/tipoanimal'},
		    {nome:'Marcas de Produto',link:$utilService.urlAction()+'petshop/marca'},
		    {nome:'Unidades de Medida',link:$utilService.urlAction()+'petshop/unidademedida'},
		    {nome:'Raças',link:$utilService.urlAction()+'petshop/raca'},
		    {nome:'Bairros',link:$utilService.urlAction()+'petshop/bairro'},
		    {nome:'Cidades',link:$utilService.urlAction()+'petshop/cidade'},
		    {nome:'Usuários',link:$utilService.urlAction()+'petshop/usuarios'},
		    {nome:'Dados Pessoais',link:$utilService.urlAction()+'petshop/usuario'},
		    {nome:'Geral',link:$utilService.urlAction()+'petshop/geral'}
        ];
        
        $scope.abrir = function (index){
            $angular.forEach($scope.menuConfiguracao,function (value, key){
            	value.classe = '';
            });
            $scope.pageAtual = $scope.menuConfiguracao[index];
            $scope.menuConfiguracao[index].classe = 'active';
        };
		
		$scope.iniciar = function(){
			$scope.abrir(0);
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);