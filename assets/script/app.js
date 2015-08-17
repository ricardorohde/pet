(function($angular) {
	/**
	 * APP MODULE
	 */ 
    $angular.module('app', ['ui.utils','ui.mask','ui.utils.masks','angularCharts','ngImgur','MessageCenterModule']);
    
    $angular.module('app').run(function($rootScope) {
    	configAuthorizationProvider();
    	function configAuthorizationProvider() {
    		$rootScope.urlApp = 'http://localhost:8080/pet/';
    		$rootScope.urlAction = $rootScope.urlApp + 'index.php/';
    		$rootScope.urlAssets = $rootScope.urlApp + 'assets';
    	}
    });
    
    $angular.module('app').config(function($httpProvider) {
    	$httpProvider.interceptors.push('httpRequestInterceptor');
    });
    
    $angular.module('app').factory('httpRequestInterceptor', function($q, $injector, $location) {
    	return {
    		response : function(response) {
    			if(typeof response.data === 'object'){
    				var $rootScope = $injector.get('$rootScope');
    				var url = $rootScope.urlAction + 'logado';
                    $.ajax({
                        type: "GET",
                        url: url,
                        dataType: "json",
                        statusCode: {
		            	    403: function() {
		            	        var pathAtual = $location.absUrl();
		            	        if(pathAtual != $rootScope.urlApp && pathAtual != $rootScope.urlAction){
		            	            window.location.assign($rootScope.urlApp);       
		            	        }
		            	    }
		                 }
                    });
    			}
    			return response;
    		}
    	};
    });
    
})(window.angular);