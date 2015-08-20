<div class="modal fade" id="modalCadastroRaca" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Cadastro de Raça</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group text-left">
						<label for="nome" class="control-label text-left">Nome:</label>
						<input type="text" class="form-control input-sm" id="nome" placeholder="Nome da raça" ng-model="raca.nome" maxlength="50">
					</div>
					<div class="form-group text-left">
						<label for="origem" class="control-label text-left">Origem:</label>
						<input type="text" class="form-control input-sm" id="origem" placeholder="Origem" ng-model="raca.origem" maxlength="50">
					</div>
					<div class="form-group text-left">
						<label for="tipoanimal" class="control-label text-left">Espécie:</label>
						<select class="form-control input-sm" ng-model="raca.tipoanimalpetshop" ng-options="tipoanimal.tipoanimalpetshop as tipoanimal.nome for tipoanimal in listatipoanimal">
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