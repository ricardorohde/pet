<div ng-controller="ParceirosController">
	<div class="row">
	    <div class='col-xs-12'>
	    	<h4>Parâmetros de busca</h4>
	    </div>
		<div class='col-xs-12'>
			<div class="form-group text-left">
				<label for="" class="col-xs-6 col-sm-2 text-right control-label">Código</label>
				<div class="col-xs-3">
					<input type="text" class="form-control input-sm" placeholder="Código" ng-model="busca.id" maxlength="5">
				</div>
			</div>
		</div>
		<div class='col-xs-12'>
			<div class="form-group text-left">
				<label for="nome" class="col-xs-3 col-sm-2 text-right control-label">Parceiro</label>
				<div class="col-xs-6">
					<input type="text" class="form-control input-sm" id="nome" placeholder="Parceiro" ng-model="busca.nome" maxlength="50">
				</div>
			</div>
	    </div>
	</div>
	<div class="row">
		<div class='col-xs-6'>
	    	<h4>Lista de Parceiros ({{listaparceiros.length}})</h4>
	    </div>
	    <div class='col-xs-6'>
	    	<div class="form-group text-right">
				<button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCadastroParceiros" ng-click="nova()">
                	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                	Novo Parceiro
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
							<th class='text-center hand' width="10%" ng-click="order('id')">Código</th>
							<th class='text-left hand' ng-click="order('nome')">
								Parceiro&nbsp;&nbsp;&nbsp;
								<span ng-if="busca.nome != undefined && busca.nome != ''" class="text-success">(Filtro : {{busca.nome}})</span>
							</th>
							<th class='text-left hand' width="30%" ng-click="order('site')">
								Site
							</th>
							<th class='text-center' width="10%">Editar</th>
							<th class='text-center' width="10%">Deletar</th>
							<th class='text-center' width="20px"></th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="table-responsive table-config">
				<table class="table table-hover table-striped">
					<tbody>
						<tr class='hand' ng-repeat='parceiros in listaparceiros | filter:busca | orderBy:predicate:reverse'>
							<th class='text-center' scope='row' width='10%'>{{parceiros.id}}</th>
							<td class='text-left text-capitalize' >{{parceiros.nome}}</td>
							<td class='text-left text-capitalize' width="30%">{{parceiros.site}}</td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-edit' ng-click='editar(parceiros)' data-toggle="modal" data-target="#modalCadastroParceiros" ></i></td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deletar(parceiros)'></i></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php 
    	Yii::import('application.views.modal.modalCadastroParceiros',true);
    ?>
</div>