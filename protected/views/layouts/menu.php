<?php
	/*$controller = Yii::app()->getController();
	$default_controller = Yii::app()->defaultController;
	$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction || $controller->action->id === 'deslogarUsuario')) ? true : false;
	$isHome = true;*/

?>
<nav class="navbar navbar-default navbar-fixed-top" ng-controller="MenuController" id='menu' ng-class='classMenu'>
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand text-center" href="<?php echo Yii::app()->baseUrl.'/index.php/g'; ?>">
				<p>
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAADHUlEQVRYR8VXUXISQRB9nYX8iifQnEA4QcgJxBNkPIHwsVhaUFlrKS13PyAnyOQEkBMET2A8gXiCrL+60NbMLBsWdmCSkHJ+gKJn+k3369c9hP+8qMy/CL68xB+vJj93b0Qv+g7CuQy78imwlgPoRwKgCzACEAIACby0IYMPs32DsACI2wCGBWeMSznwxZMDEMvbr3tivpGDbuPJAIhgWEP69xREKuS1Mkcy9Esj9hhQpAk3984AcglvR4b+6DEO1/eS6MUzEF44HprAqxzJoJM42u80I/ExquMAUxA922mtDBif5MBXadrL0jnVIDxSdf7K4dREhv5zBzsnkwKpDBHTOgj1jTJcPY5xIgf+1MnDDiN3HSgC2FsaygH0YqWAZ1bwexSl7VJsD18CxgiV9PKx8uwWAeZzEL0rx8MSXrXz0NK0cWAC4LV2OOeG6YqxBOHUEpQE4M5DOqYtBVOAjgH+JsNuU5eqVsyKUkED7G79AGMCQgvAtQz9zn2qw5KCaKRD7qVH6zkWvew/7YXfrt46+292H7neSkJb8xH9SEWoJkO/LnrRWH3Hgjs4rM4wT29xD52wkbAJ4mAZ/vWQGvmmtpoPRD++yRT0SoZ+S/9m3MqBf+KSinIARpq/AxiBUVe3U0RcPVBHwau2kKZjEJrLHiH68a1u5xl5d4HYEgFc55t58UYO3qvKyJfox20w2nkn9dIjNUdmwJ2bliMAu/abCQpCpatIUOiUPDACX1ugg/Hd5iLbNzgRDGtKiPLwmwrJS3gbCEcldJsBRD/mFdA7ASgy7xCi5XHbI7C0KkxXWwYX0YubAA9B9MsmxYbJuX/DAV1+h9WZTfczfTg221jS4mCKg0X+lmBVUYAAkfrUawOA6K3nX49hBoCp8YltJBO72ngJGUoARGMQFdk75wYO5wnmlZ9gPpeDrnq4bCwdAXVL1/kSuCqOZP3oYnM8N2zW3RCcgKhU6/PhFtTCghN4GJmGZlnMv7FAcx1Acc5jqNdQO3u0BNabZ9KMShqsNi9DNgiAW3lUlGPQBJVKW3Fp7y+dbTWvWvp6d/0HZFGNVs7gNa0AAAAASUVORK5CYII=" style='width:22px;' />
					&nbsp;PetShop
				</p>
			</a>
		</div>
			
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li data-toggle="modal" data-target="#modalSelectPetshop" ng-click="findAllPetshopByUsuario()">
					<a href="javascript:;">PetShop : {{usuario.petatual.nome}}</a>
				</li>
				<li class="dropdown" ng-show="logado">
					<a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false">
						<img ng-src="{{usuario.foto}}" style="width:28px" />
						&nbsp;{{usuario.nome}}&nbsp;
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#" ng-click='linkar("admin/1")'>Configurações</a></li>
						<li><a href="#" ng-click='linkar("admin/6")'>Minha Conta</a></li>
						<li><a href="#" ng-click='linkar("admin/2")'>Vendas</a></li>
						<li class="divider"></li>
						<li><a href="#" ng-click='sair()'>Sair</a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-right" role="search" style="margin-right:50px;">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Busca qualquer coisa..." style="width:500px;">
				</div>
				<button type="button" class="btn btn-primary" ng-click="buscar()">
					<span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
				</button>
			</form>	
		</div>
	</div>
	<?php
		Yii::import('application.views.modal.modalSelectPetshop',true);
	?>
</nav>