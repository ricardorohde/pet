<div class="tab-pane fade" id="pagamentos">
    <form class="form-horizontal">
        <br />
        <div class="form-group">
            <label for="tipocobranca" class="col-xs-6 col-sm-3 control-label">Forma de Pagamento</label>
            <div class="col-xs-6 col-sm-9">
                <input type="text" class="form-control input-sm" id="tipocobranca" ng-model="petshop.tipocobranca" maxlength="20" disabled="true" />
            </div>
        </div>
        <div class="form-group">
            <label for="vencimento" class="col-xs-6 col-sm-3 control-label">Vencimento</label>
            <div class="col-xs-6 col-sm-9">
                <input type="text" class="form-control input-sm" id="vencimento" ng-model="petshop.datavencimento" maxlength="20" disabled="true" />
            </div>
        </div>
    </form>
    <div class="row">
		<div class='col-xs-6'>
	    	<h4>Mensalidades ({{petshop.listamensalidade.length}})</h4>
	    </div>
	    <div class='col-xs-6'>
	    	<div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-sm" ng-click="iniciar()">
                	<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                	Atualizar
                </button>
	    	</div>
	    </div>
	    <div class='col-xs-12'>
			<div class="table-responsive">
				<table class="table table-hover table-striped bottom">
					<thead>
						<tr class="active">
							<th class='text-center hand' width="10%" ng-click="order('id')">Código</th>
							<th class='text-left hand' ng-click="order('datavencimento')">
								Vencimento
							</th>
							<th class='text-left hand' ng-click="order('valor')">
								Valor
							</th>
							<th class='text-left hand' ng-click="order('status')">
								Status
							</th>
							<th class='text-center' width="10%">Pagar</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="table-responsive table-config">
				<table class="table table-hover table-striped">
					<tbody>
						<tr class='hand' ng-repeat='mensalidade in petshop.listamensalidade | filter:busca | orderBy:predicate:reverse'>
							<th class='text-center' scope='row' width='10%'>{{mensalidade.id}}</th>
							<td class='text-left text-capitalize' >{{mensalidade.datavencimento}}</td>
							<td class='text-left text-capitalize' >{{mensalidade.valor}}</td>
							<td class='text-left text-capitalize' >{{mensalidade.status}}</td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='pagar(mensalidade)'></i></td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>