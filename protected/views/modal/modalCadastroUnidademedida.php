<div class="modal fade" id="modalCadastroUnidademedida" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Cadastro de Unidade de Medida</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group text-left">
						<label for="nome" class="control-label text-left">Unidade:</label>
						<input type="text" class="form-control input-sm" id="nome" placeholder="Unidade" ng-model="unidademedida.nome" maxlength="20">
					</div>
					<div class="form-group text-left">
						<label for="sigla" class="control-label text-left">Sigla:</label>
						<input type="text" class="form-control input-sm" id="nome" placeholder="Sigla" ng-model="unidademedida.sigla" maxlength="20">
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