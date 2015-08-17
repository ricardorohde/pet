<div class="tab-pane fade active in" id="perfil">
    <form class="form-horizontal">
        <br />
        <div class="form-group">
            <label for="id" class="col-xs-6 col-sm-2 control-label">Código</label>
            <div class="col-xs-6 col-sm-4">
                <input type="text" class="form-control input-sm" id="id" disabled="true" ng-model="petshop.id">
            </div>
        </div>
        <div class="form-group">
            <label for="nome" class="col-lg-2 control-label">Nome</label>
            <div class="col-lg-10">
                <input type="text" class="form-control input-sm" id="nome" placeholder="Nome do PetShop" ng-model="petshop.nome" maxlength="50">
            </div>
        </div>
        <div class="form-group">
            <label for="cnpj" class="col-lg-2 control-label">CNPJ</label>
            <div class="col-lg-10">
                <input type="text" class="form-control input-sm" id="cnpj" ng-model="petshop.cnpj" maxlength="18" ui-br-cnpj-mask require="true" />
            </div>
        </div>
        <div class="form-group">
            <label for="descricao" class="col-lg-2 control-label">Sobre</label>
            <div class="col-lg-10">
                <textarea class="form-control input-sm" id="descricao" placeholder="Descreva sobre sua loja" rows="7" ng-model="petshop.descricao" maxlength="500">
                    
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="datainicio" class="col-lg-2 control-label">Data de início</label>
            <div class="col-xs-6 col-sm-4">
                <input type="text" class="form-control input-sm" id="datainicio" disabled="true" ng-model="petshop.datainicio" />
            </div>
        </div>
    </form>
</div>