<div class="modal fade" id="modalCadastroTipoanimal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Cadastro de Tipo de Animal</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group text-left">
						<label for="tipoanimal" class="control-label text-left">Tipo de Animal:</label>
						<input type="text" class="form-control input-sm" id="tipoanimal" placeholder="Tipo de animal" ng-model="tipoanimal.nome" maxlength="100">
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