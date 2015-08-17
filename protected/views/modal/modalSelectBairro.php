<div class="modal fade" id="modalSelectBairro" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Selecione o Bairro</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
    				<table class="table table-hover table-striped bottom">
    					<thead>
    						<tr class="active">
    							<th class='text-center hand' width="10%" ng-click="order('id')">Código</th>
    							<th class='text-left hand' ng-click="order('nome')">Bairro</th>
    							<th class='text-left hand' width="30%" ng-click="order('cidadenome')">Cidade</th>
    							<th class='text-center' width="10%"></th>
    						</tr>
    					</thead>
    				</table>
    			</div>
    			<div class="table-responsive table-config">
    				<table class="table table-hover table-striped">
    					<tbody>
    						<tr>
    							<td width='10%'>
    								<div class="form-group bottom">
    									<input type="text" class="form-control input-sm" placeholder="Cód" ng-model="busca.id">
    								</div>
    							</td>
    							<td >
    								<div class="form-group bottom">
    									<input type="text" class="form-control input-sm" placeholder="Bairro" ng-model="busca.nome">
    								</div>
    							</td>
    							<td width="30%">
    								<div class="form-group bottom">
    									<input type="text" class="form-control input-sm" placeholder="Cidade" ng-model="busca.cidadenome">
    								</div>
    							</td>
    							<td width='10%'></td>
    						</tr>
    						<tr class='hand' ng-repeat='bairro in listabairropetshop | filter:busca | orderBy:predicate:reverse'>
    							<th class='text-center' scope='row' width='10%'>{{bairro.id}}</th>
    							<td class='text-left text-capitalize' >{{bairro.nome}}</td>
    							<td class='text-left text-capitalize' width="30%">{{bairro.cidadenome}}</td>
    							<td class='text-center text-danger' width='10%'>
    							    <input type="radio" name="selectbairro" ng-click="selecionarBairro(bairro)">
    							</td>
    						</tr>
    					</tbody>
    				</table>
    			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" ng-click="adicionarNovoBairro()">Novo Bairro</button>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" ng-click="copiarBairro()">Selecionar</button>
			</div>
		</div>
	</div>
</div>