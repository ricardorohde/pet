<div ng-controller="MarcaController">
	<div class="row">
	    <div class='col-xs-12'>
	    	<h4>Parâmetros de busca</h4>
	    </div>
		<div class='col-xs-12'>
			<div class="form-group text-left">
				<label for="codigo" class="col-xs-6 col-sm-2 text-right control-label">Código</label>
				<div class="col-xs-3">
					<input type="text" class="form-control input-sm" id="codigo" placeholder="Código" ng-model="busca.id" maxlength="4">
				</div>
			</div>
		</div>
		<div class='col-xs-12'>
			<div class="form-group text-left">
				<label for="nome" class="col-xs-3 col-sm-2 text-right control-label">Marca</label>
				<div class="col-xs-6">
					<input type="text" class="form-control input-sm" id="nome" placeholder="Marca" ng-model="busca.nome" maxlength="50">
				</div>
			</div>
	    </div>
	</div>
	<div class="row">
		<div class='col-xs-6'>
	    	<h4>Lista de Marcas ({{listamarca.length}})</h4>
	    </div>
	    <div class='col-xs-6'>
	    	<div class="form-group text-right">
				<button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCadastroMarca" ng-click="nova()">
                	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                	Nova Marca
                </button>
                <button type="submit" class="btn btn-primary btn-sm" ng-click="inicio()">
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
								Marca&nbsp;&nbsp;&nbsp;
								<span ng-if="busca.nome != undefined && busca.nome != ''" class="text-success">(Filtro : {{busca.nome}})</span>
							</th>
							<th class='text-left hand' width="30%" ng-click="order('status')">
								Status
							</th>
							<th class='text-center' width="10%">Editar</th>
							<th class='text-center' width="10%">Excluir</th>
							<th class='text-center' width="20px"></th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="table-responsive table-config">
				<table class="table table-hover table-striped">
					<tbody>
						<tr class='hand' ng-repeat='marca in listamarca | filter:busca | orderBy:predicate:reverse'>
							<th class='text-center' scope='row' width='10%'>{{marca.id}}</th>
							<td class='text-left text-capitalize' >{{marca.nome}}</td>
							<td class='text-left text-capitalize' width="30%">{{marca.status}}</td>
							<td class='text-center text-danger' width='10%'>
								<i class='glyphicon glyphicon-edit' ng-click='editar(marca)' data-toggle="modal" data-target="#modalCadastroMarca" ></i>
							</td>
							<td class='text-center text-danger' width='10%'>
								<i class='glyphicon glyphicon-trash' ng-click='deletar(marca)'></i>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php 
		Yii::import('application.views.modal.modalCadastroMarca',true);
	?>
</div>