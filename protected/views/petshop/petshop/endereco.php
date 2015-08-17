<div class="tab-pane fade" id="endereco">
    <form class="form-horizontal">
        <br />
        <div class="form-group">
            <label for="endereco" class="col-xs-6 col-sm-2 control-label">Endereço</label>
            <div class="col-xs-6 col-sm-7">
                <input type="text" class="form-control input-sm" id="endereco" placeholder="Endereço" ng-model="petshop.endereco.endereco" maxlength="50">
            </div>
            <label for="endereco" class="col-xs-6 col-sm-1 control-label">N°</label>
            <div class="col-xs-6 col-xs-2">
                <input type="text" class="form-control input-sm" id="numero" ng-model="petshop.endereco.numero" maxlength="10">
            </div>
        </div>
        <div class="form-group">
            <label for="bairro" class="col-xs-6 col-sm-2 control-label">Bairro</label>
            <div class="col-xs-6 col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" id="bairro" placeholder="Bairro" ng-model="petshop.endereco.bairronome" disabled="true">
                    <span class="input-group-addon input-sm hand" data-toggle="modal" data-target="#modalSelectBairro" ng-click="findAllBairroPetshop()">
                        <i class="glyphicon glyphicon-search"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="cidade" class="col-xs-6 col-lg-2 control-label">Cidade</label>
            <div class="col-xs-6 col-sm-10">
                <input type="text" class="form-control input-sm" id="cidade" placeholder="Cidade" ng-model="petshop.endereco.cidadenome" disabled="true">
            </div>
        </div>
        <div class="form-group">
            <label for="estado" class="col-xs-6 col-lg-2 control-label">Estado</label>
            <div class="col-xs-6 col-sm-10">
                <input type="text" class="form-control input-sm" id="estado" placeholder="Estado" ng-model="petshop.endereco.estadonome" disabled="true">
            </div>
        </div>
        <div class="form-group">
            <label for="cep" class="col-xs-6 col-sm-2 control-label">CEP</label>
            <div class="col-xs-6 col-sm-4">
                <input type="text" class="form-control input-sm" id="cep" ng-model="petshop.endereco.cep" ui-br-cep-mask>
            </div>
        </div>
        <div class="form-group">
            <label for="cep" class="col-lg-2 control-label">Referência</label>
            <div class="col-lg-10">
                <textarea class="form-control input-sm" id="referencia" placeholder="Referência para encontrar seu PetShop." rows="5" ng-model="petshop.endereco.referencia" maxlength="500">
                    
                </textarea>
            </div>
        </div>
    </form>
</div>
<?php
    Yii::import('application.views.modal.modalSelectBairro',true);
?>
<div ng-controller="BairroController">
    <?php
        Yii::import('application.views.modal.modalCadastroBairro',true);
    ?>
</div>