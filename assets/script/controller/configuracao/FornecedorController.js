(function($angular) {
    /**
     * Fornecedor Controller
     **/ 
	$angular.module('app').controller('FornecedorController',['$scope','fornecedorService','tipocontatoService','messageCenterService','utilService', function($scope,$fornecedorService,$tipocontatoService,$messageCenterService,$utilService) {
        
        $scope.listafornecedor = [];
        $scope.listastatus = [
            {status:'ATIVO',nome:'Ativo'},
            {status:'INATIVO',nome:'Inativo'}
        ];
        $scope.listatipocontato = [];
        $scope.fornecedor = {};
        $scope.contatofornecedor = {};
        
        $scope.colocarImagemCarregando = function (){
            $scope.fornecedor.isNotSave = true;
		    $scope.fornecedor.logo = {'url':$utilService.urlAssets()+'/images/simbolo/loader.gif','status':'I','id':''};
			return $scope.fornecedor.logo;
		};
		
		$scope.depoisCarregarImagens = function (){
		    $scope.fornecedor.isNotSave = false;
		};
        
        $scope.salvar = function (){
            $fornecedorService.salvarFornecedor($scope.fornecedor,function(dados){
                $scope.fornecedor = $fornecedorService.newFornecedor();
                $scope.findAllFornecedor();
            });
        };
        
        $scope.editar = function (index){
            $scope.fornecedor = index;
        };
        
        $scope.nova = function (index){
            $scope.fornecedor = $fornecedorService.newFornecedor();
        };
        
        $scope.deletar = function (index){
            $fornecedorService.deletarFornecedor(index,function(dados){
                $scope.findAllFornecedor();
            });
        };
		
		$scope.findAllFornecedor = function (){
		    $fornecedorService.findAllFornecedor(function(dados){
			   $scope.listafornecedor = $fornecedorService.listafornecedor;
			});
		};
		
		$scope.findAllTipocontato = function (){
		    $tipocontatoService.findAllTipocontato(function(dados){
			   $scope.listatipocontato = $tipocontatoService.listatipocontato;
			});
		};
		
		$scope.salvarContatofornecedor = function (){
		    $scope.contatofornecedor.fornecedor.
            $fornecedorService.salvarContatofornecedor($scope.contatofornecedor, function (dados){
		        $angular.forEach($scope.listatipocontato,function(value, key) {
                    if(value.id === $scope.contatofornecedor.tipocontato){
                        $scope.contatofornecedor.tipocontatonome = value.nome;
                    }
                });
                $scope.fornecedor.listacontatofornecedor.push($scope.contatofornecedor);
                $scope.contatofornecedor = $fornecedorService.newContatofornecedor();
            }); 
		};
		
		$scope.iniciar = function(){
			$scope.findAllFornecedor();
			$scope.findAllTipocontato();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);