(function($angular) {
    /**
     * Diretiva Menu Admin
     */ 
    $angular.module('app').directive('menu',['$http','$interval','$timeout','utilService', function($http,$interval,$timeout,$utilService) {
    	return {
    		restrict: 'EAC',
    		scope: true,
    		template: $("#componente-menu-sistema\\.html").html(),
    		transclude: true,
    		link: function (scope, element, attrs) {
    		    
    		    scope.pagesMenu = [];
    		    scope.menuPage = {};
    			
    			scope.preventDefaultBehaviour = function preventDefaultBehaviour(event) {
    				event.preventDefault();
    				event.stopPropagation();
    			};
    			
    			scope.abrirMenu = function (index){
                    $angular.forEach(scope.pagesMenu, function(valor, key){
                        valor.classe = '';
                    });
                    scope.menuPage = scope.pagesMenu[index];
                    scope.pagesMenu[index].classe = 'active';
    			};
    			
    			scope.loadPagesMenu = function (){
        			$http.post($utilService.urlAction()+'getPagesMenu').success(
        			function(data, status, headers, config) {
        			    scope.pagesMenu = $angular.fromJson(data);
        			    if(scope.pagesMenu.length > 0){ 
        			        scope.abrirMenu(0);
        			    }
        			});
        		};
        		
        		scope.loadPagesMenu();
        		
        		scope.$watch(attrs.menu, function(idPage) {
        		    if(!$utilService.isNullOrBlanck(idPage)){
        		        $angular.forEach(scope.pagesMenu, function(valor, key){
                            if(valor.id === idPage){
                                scope.menuPage = valor;
                            }
                        });   
        		    }
                });
    
    		}
    	};
    }]);

})(window.angular);