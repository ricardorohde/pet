(function($angular) {
      /**
       * Venda Controller
       */ 
	$angular.module('app').controller('VendaController',['$scope','$interval','$q', function($scope,$interval,$q) {
            
            $scope.linkar = function (link){
                  window.location.href = link;
            };
            
      }]);
})(window.angular);