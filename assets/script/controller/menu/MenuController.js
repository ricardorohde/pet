(function($angular) {
	/**
	 * Menu Controller 
	 */ 
	$angular.module('app').controller('MenuController',['$scope','$location','$rootScope','loginService','petshopService', function($scope,$location,$rootScope,$loginService,$petshopService) {
		$scope.logado = true;
		$scope.usuario = {};
		$scope.listapetshop = [];
		
		$scope.getUser = function (){
			$loginService.getUser(function (dados){
				$scope.usuario = $loginService.user;
			});
		};
		
		$scope.sair = function (){
			$loginService.deslogar(function (dados){
				
			});
		};
		
		$scope.scroll = function (){
			var num = 50;
			var path = $location.absUrl();
			var index = $location.protocol()+'://'+$location.host();
			var isIndex = false;//(index+'/' == path || index+'/index.php' == path || index+'/index.php/' == path || index == path || index+'/index.php/deslogarUsuario' == path);
			var isMenu = (path.indexOf('admin') >= 0);
			var addClass = function (){
				$('nav').addClass('scrolled');
	            $('.navbar-header').addClass('scrolled');
	            $('.navbar-brand').addClass('scrolled');
	            $('.nav.navbar-nav').addClass('scrolled');
			};
			var removeClass = function (){
				$('nav').removeClass('scrolled');
	            $('.navbar-header').removeClass('scrolled');
	            $('.navbar-brand').removeClass('scrolled');
	            $('.nav.navbar-nav').removeClass('scrolled');
			};
			if(isIndex && !isMenu){
				if ($(window).scrollTop() > num) addClass();
	        	$(window).bind('scroll', function () {
		            if ($(window).scrollTop() > num) {
		                addClass();
		            } else {
		                removeClass();
		            }
		        });
			}else{
				addClass();
			}
		};
		
		$scope.findAllPetshopByUsuario = function (){
			$petshopService.findAllPetshopByUsuario($scope.usuario, function (dados){
				$scope.listapetshop = $angular.fromJson(dados);
			});
		};
		
		$scope.trocarPetshopAtual = function (){
			$loginService.trocarPetshopAtual($scope.usuario,function (dados){
				$scope.inicio();
			}); 	
		};
		
		$scope.inicio = function (){
			$scope.getUser();
			$scope.findAllPetshopByUsuario();
			$scope.scroll();
		};
		
		$scope.inicio();
	}]);
	
})(window.angular);