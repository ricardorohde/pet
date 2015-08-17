(function($angular) {
    /**
     * Diretiva Carregar Imagem
     */ 
    $angular.module('app').directive('carregarImagem',['imgur', function($imgur) {
    	return {
    		restrict: 'EAC',
    		scope: true,
    		transclude: true,
    		link: function (scope, element, attrs) {
    		
    			element.css({display:'none'});
    			
    			$imgur.setAPIKey('Client-ID e7279b18509b697');
    			
    			scope.preventDefaultBehaviour = function preventDefaultBehaviour(event) {
    				event.preventDefault();
    				event.stopPropagation();
    			};
    			
    			scope.$eval(attrs.colocarImagemCarregando);
    			scope.$eval(attrs.depoisCarregarImagens);
    			
    			var imagens = [];
    			
    			var evento = function (event) {
    				scope.preventDefaultBehaviour(event);
    				var image = event.target.files[0];
    				imagens.push(scope.colocarImagemCarregando());
    				$imgur.upload(image).then(function(data){
    					var image = imagens.pop();
    					image.url = data.link.replace(/http/g, 'https');
    					image.show = false;
    					if(imagens.length == 0){
    						scope.depoisCarregarImagens();
    					}
    				},function(){
    					imagens.pop();
    					if(imagens.length == 0){
    						scope.depoisCarregarImagens();
    					}
    					console.error("Erro ao carregar uma das imagens!");
    				});
    			};
    			
    			element.on('change', evento);
    
    		}
    	};
    }]);
    
    $angular.module('app').directive('imagemUpload',function() {
    	return {
    		restrict: 'EAC',
    		scope: true,
    		template: $("#componente-image-upload\\.html").html(),
    		transclude: true,
    		link: function (scope, element, attrs) {
    			
    			scope.preventDefaultBehaviour = function preventDefaultBehaviour(event) {
    				event.preventDefault();
    				event.stopPropagation();
    			};
    			
    			var evento = function (event) {
    				scope.preventDefaultBehaviour(event);
    				element.find("input").click();
    			};
    			element.addClass("col-xs-4");
    			element.find("button").on('click', evento);
    
    		}
    	};
    });

})(window.angular);