<div class="modal fade" id="modalCadastroFornecedor" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Cadastro de Fornecedor</h4>
			</div>
			<div class="modal-body">
				<div>
					<ul class="nav nav-tabs">
						<li class="active"><a href="#perfil" data-toggle="tab">Perfil</a></li>
						<li><a href="#contatos" data-toggle="tab">Contatos</a></li>
						<li><a href="#endereco" data-toggle="tab">Endereço</a></li>
						<li><a href="#logo" data-toggle="tab">Logo</a></li>
						<li><a href="#descricao" data-toggle="tab">Descrição</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="perfil">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<label for="nome" class="control-label col-xs-2 text-left">Nome:</label>
									<div class="col-xs-10">
										<input type="text" class="form-control input-sm" id="nome" placeholder="Nome do Fornecedor" ng-model="fornecedor.nome" maxlength="50">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="cpf" class="control-label col-xs-2 text-left">CPF:</label>
									<div class="col-xs-10">
										<input type="text" class="form-control input-sm" id="cpf" ng-model="fornecedor.cpf" ui-br-cpf-mask>
									</div>
								</div>
								<div class="form-group text-left">
									<label for="cnpj" class="control-label col-xs-2 text-left">CNPJ:</label>
									<div class="col-xs-10">
										<input type="text" class="form-control input-sm" id="cnpj" ng-model="fornecedor.cnpj" ui-br-cnpj-mask>
									</div>
								</div>
								<div class="form-group text-left">
									<label for="status" class="control-label col-xs-2 text-left">Status:</label>
									<div class="col-xs-10">
										<select class="form-control input-sm" ng-model="fornecedor.status" ng-options="status.status as status.nome for status in listastatus">
											<option value="">-- Selecione --</option>
										</select>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="contatos">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<label for="celular1" class="control-label col-xs-2 text-left">Celular:</label>
									<div class='col-xs-4'>
										<input type="text" class="form-control input-sm" id="celular1" ng-model="fornecedor.contato.celular1" placeholder="(XX) 9999-9999" ui-br-phone-number>
									</div>
									<label for="celular2" class="control-label col-xs-2 text-left">Celular:</label>
									<div class='col-xs-4'>
										<input type="text" class="form-control input-sm" id="celular2" ng-model="fornecedor.contato.celular2" placeholder="(XX) 9999-9999" ui-br-phone-number>
									</div>
								</div>
								<div class="form-group text-left">
									<label for="telefone" class="control-label col-xs-2 text-left">Telefone:</label>
									<div class='col-xs-4'>
										<input type="text" class="form-control input-sm" id="telefone" ng-model="fornecedor.contato.telefone" placeholder="(XX) 9999-9999" ui-br-phone-number>
									</div>
								</div>
								<div class="form-group text-left">
									<label for="email" class="control-label col-xs-2 text-left">Email:</label>
									<div class='col-xs-10'>
										<input type="text" class="form-control input-sm" id="email" ng-model="fornecedor.contato.email" placeholder="contato@fornecedor.com.br">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="site" class="control-label col-xs-2 text-left">Site:</label>
									<div class='col-xs-10'>
										<input type="text" class="form-control input-sm" id="site" placeholder="www.fornecedor.com.br" ng-model="fornecedor.contato.site" maxlength="200">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="facebook" class="control-label col-xs-2 text-left">Facebook:</label>
									<div class='col-xs-10'>
										<input type="text" class="form-control input-sm" id="facebook" placeholder="https://www.facebook.com/jonas.kreling" ng-model="fornecedor.contato.facebook" maxlength="200">
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="endereco">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<label for="rua" class="control-label col-xs-2 modal-padding">Rua:</label>
									<div class='col-xs-7 modal-padding'>
										<input type="text" class="form-control input-sm" id="rua" ng-model="fornecedor.endereco.rua" placeholder="Rua ....">
									</div>
									<label for="numero" class="control-label col-xs-1 modal-padding">N°:</label>
									<div class='col-xs-2 modal-padding'>
										<input type="text" class="form-control input-sm" id="numero" ng-model="fornecedor.endereco.numero" ui-number-mask="0" ui-hide-group-sep>
									</div>
								</div>
								<div class="form-group text-left">
									<label for="bairro" class="control-label col-xs-2 modal-padding">Bairro:</label>
									<div class='col-xs-7 modal-padding'>
										<div class="input-group">
											<input type="text" class="form-control input-sm" id="bairro" ng-model="fornecedor.endereco.bairro" >
											<span class="input-group-addon input-sm hand" data-toggle="modal" data-target="#modalSelectBairro" ng-click="findAllBairroPetshop()">
						                        <i class="glyphicon glyphicon-search"></i>
						                    </span>
                						</div>
									</div>
									<label for="cep" class="control-label col-xs-1 modal-padding">CEP:</label>
									<div class='col-xs-2 modal-padding'>
										<input type="text" class="form-control input-sm" id="cep" placeholder="99999-999" ng-model="fornecedor.endereco.cep" ui-br-cep-mask>
									</div>
								</div>
								<div class="form-group text-left">
									<label for="cidade" class="control-label col-xs-2 modal-padding">Cidade:</label>
									<div class='col-xs-4 modal-padding'>
										<input type="text" class="form-control input-sm" id="cidade" ng-model="fornecedor.endereco.cidade" >
									</div>
								</div>
								<div class="form-group text-left">
									<label for="estado" class="control-label col-xs-2 modal-padding">Estado:</label>
									<div class='col-xs-4 modal-padding'>
										<input type="text" class="form-control input-sm" id="estado" ng-model="fornecedor.endereco.estado" >
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="logo">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<imagem-upload></imagem-upload>
								</div>
								<div class="form-group text-left">
									<div class="col-xs-6 col-xs-offset-3">
										<a href="javascript:;" class="thumbnail" ng-if="fornecedor.logo.url != ''">
											<img ng-src="{{fornecedor.logo.url}}" />
										</a>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="descricao">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<label for="descricao" class="control-label col-xs-2 text-left">Descrição:</label>
									<div class="col-xs-10">
										<textarea class="form-control input-sm" id="descricao" placeholder="Descrição do Parceiro de Negócios" rows="3" ng-model="fornecedor.descricao" maxlength="500">
				                    
				                		</textarea>
				                	</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" ng-click="salvar()" ng-disabled="fornecedor.isNotSave">Salvar</button>
			</div>
		</div>
	</div>
</div>