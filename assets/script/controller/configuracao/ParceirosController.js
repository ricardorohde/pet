(function($angular) {
    /**
     * Parceiros Controller
     **/ 
	$angular.module('app').controller('ParceirosController',['$scope','parceirosService','messageCenterService','bairroService','cidadeService','utilService','tipocontatoService',
	                                                         function($scope,$parceirosService,$messageCenterService,$bairroService,$cidadeService,$utilService,$tipocontatoService) {
        
        $scope.listaparceiros = [];
        $scope.parceiros = {};
        $scope.bairro = {};
        
        $scope.colocarImagemCarregando = function (){
            $scope.parceiros.isNotSave = true;
		    $scope.parceiros.logo = {'url':$utilService.urlAssets()+'/images/simbolo/loader.gif','status':'I','id':''};
			return $scope.parceiros.logo;
		};
		
		$scope.depoisCarregarImagens = function (){
		    $scope.parceiros.isNotSave = false;
		};
        
        $scope.salvar = function (){
            $parceirosService.salvarParceiros($scope.parceiros,function(dados){
                $scope.findAllParceiros();
            });
        };
        
        $scope.editar = function (index){
            $scope.parceiros = index;
        };
        
        $scope.nova = function (index){
            $scope.parceiros = $parceirosService.newParceiros();
        };
        
        $scope.deletar = function (index){
            $parceirosService.deletarParceiros(index,function(dados){
                $scope.findAllParceiros();
            });
        };
		
		$scope.findAllParceiros = function (){
		    $parceirosService.findAllParceiros(function(dados){
			   $scope.listaparceiros = $parceirosService.listaparceiros;
			});
		};
		
		$scope.findAllTipocontato = function (){
		    $tipocontatoService.findAllTipocontato(function(dados){
			   $scope.listatipocontato = $tipocontatoService.listatipocontato;
			});
		};
		
		/*
		 * Endereço
		 */
		$scope.findAllBairropetshop = function (){
		    $bairroService.findAllBairropetshop(function(){
			   $scope.listabairropetshop = $bairroService.listabairropetshop;
			});
		};
		
		$scope.findAllCidadepetshop = function (){
		    $cidadeService.findAllCidadepetshop(function(){
			   $scope.listacidadepetshop = $cidadeService.listacidadepetshop;
			});
		};
		
		$scope.salvarBairro = function (){
            $bairroService.salvarBairropetshop($scope.bairro,function(dados){
                $scope.findAllBairropetshop();
                $scope.isNovoBairro = false;
            });
        };
        
        $scope.novaBairro = function (index){
            $scope.bairro = $bairroService.newBairropetshop();
        };
        
        $scope.selecionarBairro = function (bairro){
            $scope.bairroSelecionado = bairro;
        };
        
        $scope.copiarBairro = function (bairro){
            $scope.parceiros.endereco.bairro = parseInt($scope.bairroSelecionado.id);
            $scope.parceiros.endereco.bairronome = $scope.bairroSelecionado.nome;
            $scope.parceiros.endereco.cidadenome = $scope.bairroSelecionado.cidadenome;
            $scope.parceiros.endereco.estadonome = $scope.bairroSelecionado.estadonome;
        };
		
		$scope.iniciar = function(){
			$scope.findAllParceiros();
			$scope.findAllTipocontato();
			
			// Endereço
			$scope.findAllBairropetshop();
			$scope.findAllCidadepetshop();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);