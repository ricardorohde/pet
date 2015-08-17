<div class="modal fade" id="modalCadastroParceiros" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Cadastro de Parceiro</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group text-left">
						<label for="nome" class="control-label text-left">Nome:</label>
						<input type="text" class="form-control input-sm" id="nome" placeholder="Nome do parceiro" ng-model="parceiros.nome" maxlength="50">
					</div>
					<div class="form-group text-left">
						<label for="site" class="control-label text-left">Site:</label>
						<input type="text" class="form-control input-sm" id="site" placeholder="Site" ng-model="parceiros.site" maxlength="200">
					</div>
					<div class="form-group text-left">
						<label for="logo" class="control-label text-left">Logo:</label>
						<input type="text" class="form-control input-sm" id="logo" placeholder="Logo" ng-model="parceiros.logo" maxlength="200">
					</div>
					<div class="form-group text-left">
						<label for="descricao" class="control-label text-left">Descrição:</label>
						<textarea class="form-control input-sm" id="descricao" placeholder="Descrição do Parceiro de Negócios" rows="3" ng-model="parceiros.descricao" maxlength="500">
	                    
	                	</textarea>
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