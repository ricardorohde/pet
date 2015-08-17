(function($angular) {
	/**
	 * Cadastro de Index
	 */ 
	$angular.module('app').controller('IndexController', function($scope) {
		$scope.clickLink = function (link){
			window.location.href = link;  	
		};
	});
	
})(window.angular);