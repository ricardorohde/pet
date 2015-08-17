<div class="row" ng-controller="ConfiguracaoController">
    <div class="col-xs-3">
        <div class="list-group">
            <a href="javascript:;" class="list-group-item" ng-class="link.classe" ng-repeat="link in menuConfiguracao" ng-click="abrir($index)">
                {{link.nome}}
            </a>
        </div>
    </div>
    <div class="col-xs-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{pageAtual.nome}}</h3>
            </div>
            <div class="panel-body" ng-include src="pageAtual.link">
                
            </div>
        </div>
    </div>
</div>