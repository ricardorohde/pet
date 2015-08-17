<div ng-controller="PetshopController">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#perfil" data-toggle="tab" aria-controls="perfil" role="tab">
                Perfil
            </a>
        </li>
        <li>
            <a href="#endereco" data-toggle="tab" aria-controls="endereco" role="tab">
                Endereço
            </a>
        </li>
        <li>
            <a href="#rede" data-toggle="tab" aria-controls="rede" role="tab">
                Rede
            </a>
        </li>
        <li>
            <a href="#pagamentos" data-toggle="tab" aria-controls="pagamentos" role="tab">
                Pagamentos
            </a>
        </li>
        <li>
            <a href="#configuracao" data-toggle="tab" aria-controls="configuracao" role="tab">
                Configuração
            </a>
        </li>
        <li>
            <a href="#exportar" data-toggle="tab" aria-controls="exportar" role="tab">
                Exportar Dados
            </a>
        </li>
    </ul>
    
    <div class="tab-content" id="tabContentPetshop">
        <?php 
			Yii::import('application.views.petshop.petshop.perfil',true);
			Yii::import('application.views.petshop.petshop.endereco',true);
			Yii::import('application.views.petshop.petshop.rede',true);
			Yii::import('application.views.petshop.petshop.pagamentos',true);
			Yii::import('application.views.petshop.petshop.configuracao',true);
			Yii::import('application.views.petshop.petshop.exportar',true);
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