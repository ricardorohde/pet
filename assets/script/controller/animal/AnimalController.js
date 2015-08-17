(function($angular) {
    /**
     * Controller Animal
     */ 
    $angular.module('app').controller('AnimalController', ['$scope', 'animalService', function($scope,$animalService) {
        
        $scope.linkar = function (link){
          window.location.href = link;
        };
        
        $scope.animal = undefined;
        $scope.carregarAnimal = function (){
            $animalService.findAnimal({id:id},$scope.carregarAnimalCallback);
        };
        
        $scope.carregarAnimalCallback = function(data, status, headers, config) {
    		$scope.animal = $angular.fromJson(data);
    		console.log($scope.animal);
    		$scope.tratarAnimal();
        };
        
        $scope.tratarAnimal = function (){
            if($angular.isUndefined($scope.animal.video) || $scope.animal.video == ''){
                $scope.animal.video = 'cDJ2YmIj3oo';
            }
            
            $scope.slides = [];
            for(var i = 0 ; i < $scope.animal.imagens.length; i++){
                $scope.slides.push($scope.animal.imagens[i].url);
            }    
        };
        
        $scope.enviarEmail = function (){
            $animalService.enviarEmail($scope.email,function(){
                console.log('email enviado:');
                console.log($scope.email);
            });
        };
        
        $scope.iniciar = function(){
            $scope.carregarAnimal();
        };
        $scope.iniciar();
    }]);
})(window.angular);