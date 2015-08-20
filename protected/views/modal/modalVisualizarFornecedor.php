<div class="modal fade" id="modalVisualizarFornecedor" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Fornecedor</h4>
			</div>
			<div class="modal-body">
				<div>
					<ul class="nav nav-tabs">
						<li class="active"><a href="#perfilVisualizar" data-toggle="tab">Perfil</a></li>
						<li><a href="#contatosVisualizar" data-toggle="tab">Contatos</a></li>
						<li><a href="#enderecoVisualizar" data-toggle="tab">Endere&ccedil;o</a></li>
						<li><a href="#logoVisualizar" data-toggle="tab">Logo</a></li>
						<li><a href="#descricaoVisualizar" data-toggle="tab">Descri&ccedil;&atilde;o</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="perfilVisualizar">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<label for="nome" class="control-label col-xs-2 text-left">Nome:</label>
									<div class="col-xs-10">
										<input 
											type="text" 
											class="form-control input-sm" 
											id="nome" 
											placeholder="Nome do Fornecedor" 
											ng-model="fornecedor.nome" 
											maxlength="50" 
											ng-disabled="true">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="cpf" class="control-label col-xs-2 text-left">CPF:</label>
									<div class="col-xs-10">
										<input 
											type="text" 
											class="form-control input-sm" 
											id="cpf" 
											ng-model="fornecedor.cpf" 
											ui-br-cpf-mask
											ng-disabled="true">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="cnpj" class="control-label col-xs-2 text-left">CNPJ:</label>
									<div class="col-xs-10">
										<input 
											type="text" 
											class="form-control input-sm" 
											id="cnpj" 
											ng-model="fornecedor.cnpj" 
											ui-br-cnpj-mask
											ng-disabled="true">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="status" class="control-label col-xs-2 text-left">Status:</label>
									<div class="col-xs-10">
										<select class="form-control input-sm" ng-model="fornecedor.status" ng-options="status.status as status.nome for status in listastatus" ng-disabled="true">
											<option value="">-- Selecione --</option>
										</select>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="contatosVisualizar">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<label for="celular1" class="control-label col-xs-2 text-left">Celular:</label>
									<div class='col-xs-4'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="celular1" 
											ng-model="fornecedor.contato.celular1.valor" 
											placeholder="(XX) 9999-9999" 
											ui-br-phone-number
											ng-disabled="true">
									</div>
									<label for="celular2" class="control-label col-xs-2 text-left">Celular:</label>
									<div class='col-xs-4'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="celular2" 
											ng-model="fornecedor.contato.celular2.valor" 
											placeholder="(XX) 9999-9999" 
											ui-br-phone-number
											ng-disabled="true">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="telefone1" class="control-label col-xs-2 text-left">Telefone:</label>
									<div class='col-xs-4'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="telefone1" 
											ng-model="fornecedor.contato.telefone1.valor" 
											placeholder="(XX) 9999-9999" 
											ui-br-phone-number
											ng-disabled="true">
									</div>
									<label for="telefone2" class="control-label col-xs-2 text-left">Telefone:</label>
									<div class='col-xs-4'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="telefone2" 
											ng-model="fornecedor.contato.telefone2.valor" 
											placeholder="(XX) 9999-9999" 
											ui-br-phone-number
											ng-disabled="true">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="email" class="control-label col-xs-2 text-left">Email:</label>
									<div class='col-xs-10'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="email" 
											ng-model="fornecedor.contato.email.valor" 
											placeholder="contato@fornecedor.com.br"
											ng-disabled="true">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="site" class="control-label col-xs-2 text-left">Site:</label>
									<div class='col-xs-10'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="site" 
											placeholder="www.fornecedor.com.br" 
											ng-model="fornecedor.contato.site.valor" 
											maxlength="200"
											ng-disabled="true">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="facebook" class="control-label col-xs-2 text-left">Facebook:</label>
									<div class='col-xs-10'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="facebook" 
											placeholder="https://www.facebook.com/jonas.kreling" 
											ng-model="fornecedor.contato.facebook.valor" 
											maxlength="200"
											ng-disabled="true">
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="enderecoVisualizar">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<label for="rua" class="control-label col-xs-2 modal-padding">Rua:</label>
									<div class='col-xs-7 modal-padding'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="rua" 
											ng-model="fornecedor.endereco.endereco" 
											placeholder="Rua ...."
											ng-disabled="true">
									</div>
									<label for="numero" class="control-label col-xs-1 modal-padding">N&deg;:</label>
									<div class='col-xs-2 modal-padding'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="numero" 
											ng-model="fornecedor.endereco.numero" 
											ui-number-mask="0" 
											ui-hide-group-sep
											ng-disabled="true">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="bairro" class="control-label col-xs-2 modal-padding">Bairro:</label>
									<div class='col-xs-7 modal-padding'>
										<div class="input-group">
											<input 
												type="text" 
												class="form-control input-sm" 
												id="bairro"
												ng-model="fornecedor.endereco.bairronome" 
												ng-disabled="true"  
												ng-disabled="true">
											<span class="input-group-addon input-sm hand" data-toggle="modal" data-target="#modalSelectBairro" ng-click="findAllBairroPetshop()">
						                        <i class="glyphicon glyphicon-search"></i>
						                    </span>
                						</div>
									</div>
									<label for="cep" class="control-label col-xs-1 modal-padding">CEP:</label>
									<div class='col-xs-2 modal-padding'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="cep" 
											placeholder="99999-999" 
											ng-model="fornecedor.endereco.cep" 
											ui-br-cep-mask
											ng-disabled="true">
									</div>
								</div>
								<div class="form-group text-left">
									<label for="cidade" class="control-label col-xs-2 modal-padding">Cidade:</label>
									<div class='col-xs-10 modal-padding'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="cidade" 
											ng-model="fornecedor.endereco.cidadenome" 
											ng-disabled="true" >
									</div>
								</div>
								<div class="form-group text-left">
									<label for="estado" class="control-label col-xs-2 modal-padding">Estado:</label>
									<div class='col-xs-10 modal-padding'>
										<input 
											type="text" 
											class="form-control input-sm" 
											id="estado" 
											ng-model="fornecedor.endereco.estadonome" 
											ng-disabled="true">
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="logoVisualizar">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<div class="col-xs-6 col-xs-offset-3">
										<a href="javascript:;" class="thumbnail" ng-if="fornecedor.logo.url != ''">
											<img ng-src="{{fornecedor.logo.url}}" />
										</a>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="descricaoVisualizar">
							<form class="form-horizontal">
								<br />
								<div class="form-group text-left">
									<label for="" class="control-label col-xs-2 text-left">Descri&ccedil;&atilde;o:</label>
									<div class="col-xs-10">
										<textarea class="form-control input-sm" placeholder="Descri&ccedil;&atilde;o do Parceiro de Neg&oacute;cios" rows="3" ng-model="fornecedor.descricao" maxlength="500" ng-disabled="true">
				                    
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