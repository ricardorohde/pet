<div class="modal fade" id="modalCadastroCidade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Cadastro de Cidade</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group text-left">
						<label for="estado" class="control-label text-left">Estado:</label>
						<select class="form-control input-sm" ng-model="cidadepetshop.estado" ng-options="estado.id as estado.nome for estado in listaestado" ng-change="findAllCidadeByEstado()">
							<option value="">-- Selecione --</option>
						</select>
					</div>
					<div class="form-group text-left">
						<label for="cidade" class="control-label text-left">Cidade:</label>
						<select class="form-control input-sm" ng-model="cidadepetshop.cidade" ng-options="cidade.id as cidade.nome for cidade in listacidade">
							<option value="">-- Selecione --</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" ng-click="salvar()">Salvar</button>
			</div>
		</div>
	</div>
</div>