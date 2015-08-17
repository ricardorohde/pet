<div class="modal fade" id="modalCadastroBairro" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Cadastro de Cidade</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group text-left">
						<label for="nome" class="control-label text-left">Nome:</label>
						<input type="text" class="form-control" id="nome" placeholder="Nome do bairro" ng-model="bairro.nome" maxlength="35">
					</div>
					<div class="form-group text-left">
						<label for="cidade" class="control-label text-left">Cidade:</label>
						<select class="form-control" ng-model="bairro.cidadepetshop" ng-options="cidade.cidadepetshop as cidade.nome for cidade in listacidadepetshop">
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