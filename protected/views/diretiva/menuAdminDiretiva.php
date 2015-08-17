<script type="text/ng-template" id="componente-menu-sistema.html">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<ul class="nav nav-pills">
						<li ng-class="page.classe" ng-repeat="page in pagesMenu">
							<a href="javascript:;" ng-click="abrirMenu($index)">
								{{page.titulo}} 
								<span class="badge">{{page.info}}</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body" ng-include src='menuPage.link'>
					
				</div>
			</div>
		</div>
	</div>
</script>