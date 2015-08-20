<div class="modal fade" id="modalSelectPetshop" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Selecione o PetShop</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group text-left">
						<label for="petshop" class="control-label text-left">PetShop:</label>
						<select class="form-control input-sm" ng-model="usuario.petatual.id" ng-options="petshop.id as petshop.nome for petshop in listapetshop">
							<!--option value="">-- Selecione --</option-->
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" ng-click="trocarPetshopAtual()">Selecionar</button>
			</div>
		</div>
	</div>
</div>