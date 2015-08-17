<div class="modal fade" id="modalConvitePetshop" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Convidar o PetShop</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
    				<table class="table table-hover table-striped bottom">
    					<thead>
    						<tr class="active">
    							<th class='text-center hand' width="20%" ng-click="order('id')">Código</th>
    							<th class='text-left hand' ng-click="order('nome')">PetShop</th>
    							<th class='text-center' width="10%"></th>
    						</tr>
    					</thead>
    				</table>
    			</div>
    			<div class="table-responsive table-config" style="height: 200px;">
    				<table class="table table-hover table-striped">
    					<tbody>
    						<tr>
    							<td width='20%'>
    								<div class="form-group bottom">
    									<input type="text" class="form-control input-sm" placeholder="Cód" ng-model="busca.id">
    								</div>
    							</td>
    							<td >
    								<div class="form-group bottom">
    									<input type="text" class="form-control input-sm" placeholder="PetShop" ng-model="busca.nome">
    								</div>
    							</td>
    							<td width='10%'></td>
    						</tr>
    						<tr class='hand' ng-repeat='petshop in listapetshop | filter:busca | orderBy:predicate:reverse'>
    							<th class='text-center' scope='row' width='20%'>{{petshop.id}}</th>
    							<td class='text-left text-capitalize' >{{petshop.nome}}</td>
    							<td class='text-center text-danger' width='10%'>
    							    <input type="radio" name="selectbairro" ng-click="selecionarPetshop(petshop)">
    							</td>
    						</tr>
    					</tbody>
    				</table>
    			</div>
    			<form class="form-horizontal">
    				<br />
    				<div class="form-group">
    					<label for="descricao" class="col-xs-2 control-label">Mensagem</label>
    					<div class="col-xs-10">
				            <textarea class="form-control input-sm" id="convite" placeholder="Bom dia, faça parte de nossa rede..." rows="3" ng-model="petshoprede.mensagem" maxlength="500">
	                    
	                		</textarea>
	                	</div>
			        </div>
    			</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" ng-click="enviarConvitePetshop()">Enviar Convite</button>
			</div>
		</div>
	</div>
</div>