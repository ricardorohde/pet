<div ng-controller="RacaController">
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
				<label for="nome" class="col-xs-3 col-sm-2 text-right control-label">Raça</label>
				<div class="col-xs-6">
					<input type="text" class="form-control input-sm" id="nome" placeholder="Raça" ng-model="busca.nome" maxlength="50">
				</div>
			</div>
	    </div>
		<div class='col-xs-12'>
			<div class="form-group text-left">
				<label for="tipoanimal" class="col-xs-3 col-sm-2 text-right control-label">Espécie</label>
				<div class="col-xs-6">
					<input type="text" class="form-control input-sm" id="tipoanimal" placeholder="Cidade" ng-model="busca.tipoanimalnome" maxlength="20">
				</div>
			</div>
	    </div>
	</div>
	<div class="row">
		<div class='col-xs-6'>
	    	<h4>Lista de Raças ({{listaraca.length}})</h4>
	    </div>
	    <div class='col-xs-6'>
	    	<div class="form-group text-right">
				<button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCadastroRaca" ng-click="nova()">
                	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                	Nova Raça
                </button>
                <button type="submit" class="btn btn-primary btn-sm" ng-click="inicio()">
                	<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                	Carregar
                </button>
                <?php 
					Yii::import('application.views.modal.modalCadastroRaca',true);
				?>
	    	</div>
	    </div>
	    <div class='col-xs-12'>
			<div class="table-responsive">
				<table class="table table-hover table-striped bottom">
					<thead>
						<tr class="active">
							<th class='text-center hand' width="10%" ng-click="order('id')">Código</th>
							<th class='text-left hand' ng-click="order('nome')">
								Raça&nbsp;&nbsp;&nbsp;
								<span ng-if="busca.nome != undefined && busca.nome != ''" class="text-success">(Filtro : {{busca.nome}})</span>
							</th>
							<th class='text-left hand' width="30%" ng-click="order('tipoanimalnome')">
								Espécie&nbsp;&nbsp;&nbsp;
								<span ng-if="busca.tipoanimalnome != undefined && busca.tipoanimalnome != ''" class="text-success">(Filtro : {{busca.tipoanimalnome}})</span>
							</th>
							<th class='text-center' width="10%">Deletar</th>
							<th class='text-center' width="20px"></th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="table-responsive table-config">
				<table class="table table-hover table-striped">
					<tbody>
						<tr class='hand' ng-repeat='raca in listaraca | filter:busca | orderBy:predicate:reverse'>
							<th class='text-center' scope='row' width='10%'>{{raca.id}}</th>
							<td class='text-left text-capitalize' >{{raca.nome}}</td>
							<td class='text-left text-capitalize' width="30%">{{raca.tipoanimalnome}}</td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deletar(raca)'></i></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>