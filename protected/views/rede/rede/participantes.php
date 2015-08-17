<div class="tab-pane fade" id="participantes">
    <form class="form-horizontal">
        <br />
    </form>
    <div class="row">
        <div class='col-xs-6'>
            <h4>Lista de PetShops ({{rede.listapetshoprede.length}})</h4>
        </div>
        <div class='col-xs-6'>
            <div class="form-group text-right">
				<button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalConvitePetshop" ng-click="convidarPetshop()">
                	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                	Convidar PetShop
                </button>
                <button type="submit" class="btn btn-primary btn-sm" ng-click="iniciar()">
                	<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                	Carregar
                </button>
            </div>
        </div>
        <div class='col-xs-12'>
			<div class="table-responsive">
				<table class="table table-hover table-striped bottom">
					<thead>
						<tr class="active">
							<th class='text-center hand' width="10%" ng-click="order('petshopid')">
							    Código
                            </th>
							<th class='text-left hand' ng-click="order('petshopnome')">
								PetShop
							</th>
							<th class='text-center hand' width="20%" ng-click="order('status')">
								Status
							</th>
							<th class='text-left' width="10%">
								Excluir
							</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<tbody>
						<tr class='hand' ng-repeat='petshoprede in rede.listapetshoprede | filter:busca | orderBy:predicate:reverse'>
							<th class='text-center' scope='row' width='10%'>{{petshoprede.petshopid}}</th>
							<td class='text-left text-capitalize' >{{petshoprede.petshopnome}}</td>
							<td class='text-center text-capitalize text-success' width='20%'>
								<span class="glyphicon glyphicon-ok" aria-hidden="true" ng-if="petshoprede.status == 'ACEITO'"></span>
								<span class="glyphicon glyphicon-check" aria-hidden="true" ng-if="petshoprede.status == 'CONVIDADO'"></span>
								{{petshoprede.status}}
							</td>
							<td class='text-center text-danger' width='10%'>
								<i class='glyphicon glyphicon-trash' ng-if="petshoprede.status == 'ACEITO'" ng-click='deletarPetshoprede(petshoprede)'></i>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
    Yii::import('application.views.modal.modalConvitePetshop',true);
?>