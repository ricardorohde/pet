<div ng-controller="RedeController">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#perfil" data-toggle="tab" aria-controls="perfil" role="tab">
                Perfil
            </a>
        </li>
        <li>
            <a href="#participantes" data-toggle="tab" aria-controls="participantes" role="tab">
                Participantes
            </a>
        </li>
    </ul>
    
    <div class="tab-content" id="tabContentPetshop">
        <?php 
			Yii::import('application.views.rede.rede.perfil',true);
			Yii::import('application.views.rede.rede.participantes',true);
		?>
    </div>
    <form class="form-horizontal">
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2 text-right">
                <button type="reset" class="btn btn-default btn-sm">
                    <i class="glyphicon glyphicon-remove"></i>
                    Cancelar
                </button>
                <button type="submit" class="btn btn-primary btn-sm" ng-click="salvar()">
                    <i class="glyphicon glyphicon-ok"></i>
                    Salvar
                </button>
            </div>
        </div>
    </form>
</div>