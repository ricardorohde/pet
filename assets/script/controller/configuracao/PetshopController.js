(function($angular) {
    /**
     * Petshop Controller
     **/ 
	$angular.module('app').controller('PetshopController',['$scope','petshopService','loginService','bairroService','messageCenterService', function($scope,$petshopService,$loginService,$bairroService,$messageCenterService) {
        
        $scope.backup = {};
        $scope.petshop = {};
        $scope.listabairropetshop = [];
        $scope.bairroSelecionado = {};
        
        $scope.salvar = function (){
            $petshopService.salvarPetshop($scope.petshop,function(dados){
                $scope.petshop = $petshopService.petshop;
            });
        };
        
        $scope.buscar = function (){
            $loginService.getUser(function (dados){
                $petshopService.buscarPetshop($loginService.user.petatual,function (dados){
                    $scope.petshop = $petshopService.petshop;
                });    
            });
        };
        
        $scope.findAllBairroPetshop = function (){
            $bairroService.findAllBairropetshop(function (dados){
                $scope.listabairropetshop = $bairroService.listabairropetshop;
            });
        };
        
        $scope.selecionarBairro = function (bairro){
            $scope.bairroSelecionado = bairro;
        };
        
        $scope.copiarBairro = function (bairro){
            $scope.petshop.endereco.bairro = parseInt($scope.bairroSelecionado.id);
            $scope.petshop.endereco.bairronome = $scope.bairroSelecionado.nome;
            $scope.petshop.endereco.cidadenome = $scope.bairroSelecionado.cidadenome;
            $scope.petshop.endereco.estadonome = $scope.bairroSelecionado.estadonome;
        };
        
        $scope.adicionarNovoBairro = function (){
            $('#modalCadastroBairro').modal('show');
        };
        
        $scope.aceitarConvite = function (){
            $petshopService.aceitarConvite($scope.petshop.listapetshopredeconvidado[0],function (dados){
                $scope.petshop.listapetshopredeconvidado.shift();
                $scope.getPetshopredeAceito();
            });
        };
        
        $scope.rejeitarConvite = function (petshoprede){
            $petshopService.rejeitaConvite(petshoprede,function (dados){
                $scope.petshop.listapetshopredeconvidado.shift();
            });
        };
        
        $scope.getPetshopredeAceito = function (){
            $petshopService.getPetshopredeAceito(function (dados){
                $scope.petshop.listapetshoprede = $angular.fromJson(dados);
            });
        };
        
        $scope.deletarPetshoprede = function (petshoprede){
            $petshopService.rejeitarConvite(petshoprede, function(dados){
                $scope.getPetshopredeAceito();
            });
        };
		
		$scope.iniciar = function(){
			$scope.buscar();
			$scope.findAllBairroPetshop();
		};
		$scope.iniciar();
		
	}]);
	
})(window.angular);