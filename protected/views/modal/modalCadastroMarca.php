<div class="modal fade" id="modalCadastroMarca" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Cadastro de Marca</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form-group text-left">
						<label for="nome" class="control-label col-xs-2 text-left">Nome:</label>
						<div class="col-xs-10">
							<input type="text" class="form-control input-sm" id="nome" placeholder="Nome da marca" ng-model="marca.nome" maxlength="50">
						</div>
					</div>
					<div class="form-group text-left">
						<label for="status" class="control-label col-xs-2 text-left">Status:</label>
						<div class="col-xs-10">
							<select class="form-control input-sm" ng-model="marca.status" ng-options="status.status as status.nome for status in listastatus">
								<option value="">-- Selecione --</option>
							</select>
						</div>
					</div>
					<div class="form-group text-left">
						<label for="descricao" class="control-label col-xs-2 text-left">Descri&ccedil;&atilde;o:</label>
						<div class="col-xs-10">
							<textarea class="form-control input-sm" id="descricao" placeholder="Descri&ccedil;&atilde;o do Parceiro de Neg&oacute;cios" rows="3" ng-model="marca.descricao" maxlength="500">
	                    
	                		</textarea>
	                	</div>
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