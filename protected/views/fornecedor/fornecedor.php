<div ng-controller="FornecedorController">
	<div class="row">
	    <div class='col-xs-12'>
	    	<h4>Par&acirc;metros de busca</h4>
	    </div>
		<div class='col-xs-12'>
			<div class="form-group text-left">
				<label for="" class="col-xs-6 col-sm-2 text-right control-label">C&oacute;digo</label>
				<div class="col-xs-3">
					<input type="text" class="form-control input-sm" placeholder="C&oacute;digo" ng-model="busca.id" maxlength="5">
				</div>
			</div>
		</div>
		<div class='col-xs-12'>
			<div class="form-group text-left">
				<label for="nome" class="col-xs-3 col-sm-2 text-right control-label">Fornecedor</label>
				<div class="col-xs-6">
					<input type="text" class="form-control input-sm" id="nome" placeholder="Fornecedor" ng-model="busca.nome" maxlength="50">
				</div>
			</div>
	    </div>
	</div>
	<div class="row">
		<div class='col-xs-6'>
	    	<h4>Lista de Fornecedores ({{listafornecedor.length}})</h4>
	    </div>
	    <div class='col-xs-6'>
	    	<div class="form-group text-right">
				<button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCadastroFornecedor" ng-click="nova()">
                	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                	Novo Fornecedor
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
							<th class='text-center hand' width="10%" ng-click="order('id')">C&oacute;digo</th>
							<th class='text-left hand' ng-click="order('nome')">
								Fornecedor&nbsp;&nbsp;&nbsp;
								<span ng-if="busca.nome != undefined && busca.nome != ''" class="text-success">(Filtro : {{busca.nome}})</span>
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
						<tr class='hand' ng-repeat='fornecedor in listafornecedor | filter:busca | orderBy:predicate:reverse'>
							<th class='text-center' scope='row' width='10%' ng-click='editar(fornecedor)' data-toggle="modal" data-target="#modalVisualizarFornecedor">
								{{fornecedor.id}}
							</th>
							<td class='text-left text-capitalize' ng-click='editar(fornecedor)' data-toggle="modal" data-target="#modalVisualizarFornecedor">
								{{fornecedor.nome}}
							</td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-edit' ng-click='editar(fornecedor)' data-toggle="modal" data-target="#modalCadastroFornecedor" ></i></td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deletar(fornecedor)'></i></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
		Yii::import('application.views.modal.modalVisualizarFornecedor',true);
    	Yii::import('application.views.modal.modalCadastroFornecedor',true);
    	Yii::import('application.views.modal.modalSelectBairro',true);
    ?>
</div>