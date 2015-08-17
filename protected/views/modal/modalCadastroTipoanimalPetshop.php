<div class="modal fade" id="modalCadastroTipoanimalpetshop" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Associação de Tipo de Animal Por PetShop</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group text-left">
						<label for="tipoanimal" class="control-label text-left">Tipo de Animal:</label>
						<select class="form-control" ng-model="tipoanimalpetshop.tipoanimal" ng-options="tipoanimal.id as tipoanimal.nome for tipoanimal in listatipoanimal">
							<option value="">-- Selecione --</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="salvar()">Salvar</button>
			</div>
		</div>
	</div>
</div>